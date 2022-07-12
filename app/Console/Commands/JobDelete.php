<?php

namespace App\Console\Commands;

use App\Models\Job;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class JobDelete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'site:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Indexed Pages';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $jobs=Job::where('status_id',5)->limit(100)->get();
        if($jobs->count()>0){
            $urls=$jobs->pluck('slug');

            require_once 'vendor/autoload.php';


            $googleClient = new Google_Client();

            // Add here location to the JSON key file that you created and downloaded earlier.
            $googleClient->setAuthConfig( 'storage/app/google_auth_config.json' );
            $googleClient->setScopes( Google_Service_Indexing::INDEXING );
            $googleClient->setUseBatch( true );

            $service = new Google_Service_Indexing( $googleClient );
            $batch = $service->createBatch();

            $postBody = new Google_Service_Indexing_UrlNotification();

            // Use URL_UPDATED for new or updated pages.
            // Use URL_DELETED for deleted pages.


            foreach($urls as $url)
            {
                $url='https://careermove.co.ke/listings/'.$url;

                $postBody->setUrl( $url );
                $postBody->setType('URL_DELETED');
                $batch->add( $service->urlNotifications->publish( $postBody ) );
            }

            $results = $batch->execute();

           $jobs->delete();


        }
    }
}
