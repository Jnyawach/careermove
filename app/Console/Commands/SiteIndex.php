<?php

namespace App\Console\Commands;

use App\Models\Job;
use Illuminate\Console\Command;
use Google_Client;
use Google_Service_Indexing;
use Google_Service_Indexing_UrlNotification;
use Illuminate\Support\Collection;


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
        $jobs=Job::where('status_id',2)->where('status_id',2)->limit(100)->get();
        if($jobs->count()>0){
            $urls=$jobs->pluck('slug');

        require_once 'public/google-api-php-client/vendor/autoload.php';


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


        /*foreach($urls as $url)
        {
            $url='https://careermove.co.ke/listings/'.$url;

          $postBody->setUrl( $url );
          $postBody->setType('URL_UPDATED');
          $batch->add( $service->urlNotifications->publish( $postBody ) );
        }

             $results = $batch->execute();*/
            $collection = new Collection($urls);

            $names = $collection->map(function($item, $key) {
                return 'https://careermove.co.ke/'. $item;
             });





            $http = \Http::post(
                "https://www.bing.com/webmaster/api.svc/json/SubmitUrlbatch?apikey=81de891fa9714b34a5da47c303650e1a",
                [
                    "siteUrl" => 'https://careermove.co.ke',
                    "urlList" => $names
                ]
            );

            dd($http);







    }
}
}
