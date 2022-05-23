<?php

namespace App\Console\Commands;

use App\Models\Job;
use Illuminate\Console\Command;
use Google_Client;
use Google_Service_Indexing;
use Google_Http_Batch;
use GuzzleHttp\Psr7\Request as CreateRequest;


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
        $jobs=Job::where('status_id',2)->limit(100)->get();
        if($jobs->count()>0){
            $url=$jobs->pluck('slug');




        require_once 'public/google-api-php-client/vendor/autoload.php';


        try {
            $client = new \Google_Client();

                $client->setAuthConfig('storage/app/google_auth_config.json');
                $client->addScope('https://www.googleapis.com/auth/indexing');
                $client->setUseBatch(true);

                $service = new \Google_Service_Indexing($client);
                $batch = $service->createBatch();

                // add request
                $postBody = new \Google_Service_Indexing_UrlNotification();
                $postBody->setType('URL_UPDATED');
                $postBody->setUrl('https://careermove.co.ke/listings/' . $url);


                //$batch->add($service->urlNotifications->publish($postBody));
                // ---- add request

                //$results = $batch->execute(); // it does authorize in execute()
                $apiKey='2026dea745db4043a7749d299cc07e23';
                $body='https://careermove.co.ke/listings/' . $url;
                $http = \Http::post(
                    "https://www.bing.com/webmaster/api.svc/json/SubmitUrlbatch?apikey=" . $apiKey,
                    [
                        "siteUrl" => 'https://careermove.co.ke',
                        "urlList" =>$body,

                    ]
                );
                dd($http->body());

                foreach ($jobs as $job){
                    $job->update([
                        'index_status'=>1,

                    ]);
                }



          }
          catch (\Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
          }
        }

    }
}
