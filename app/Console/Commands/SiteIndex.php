<?php

namespace App\Console\Commands;

use App\Models\Job;
use Illuminate\Console\Command;
use Google;
use Google_Service_Indexing;
use Google_Service_Indexing_UrlNotification;

class SiteIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Submitting pages for indexing';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $jobs=Job::where('index_status',0)->where('status_id',2)->get();
        require_once 'public/google-api-php-client/vendor/autoload.php';
        try {
            $googleClient = new Google\Client();

            // Add here location to the JSON key file that you created and downloaded earlier.
            $googleClient->setAuthConfig( 'storage/app/google_auth_config.json' );
            $googleClient->setScopes( Google_Service_Indexing::INDEXING );
            $service = new Google_Service_Indexing( $googleClient );
            $batch = $service->createBatch();

           foreach($jobs->chunk(100) as $job){
               $url="https://careermove.co.ke/listings/$job->slug";
               $batch->add( $service->urlNotifications->getMetadata( $url ) );
               $job->update(['index_status'=>1]);
           }
           $results = $batch->execute();


          }
          catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
          }

    }
}
