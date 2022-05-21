<?php

namespace App\Providers;

use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //




        Storage::extend('dropbox',  function ($app, $config) {

             $key=$config['client_id'];
             $secret=$config['client_secret'];
            $client = new \GuzzleHttp\Client();
            $res = $client->request("POST", "https://{$key}:{$secret}@api.dropbox.com/oauth2/token", [
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' =>$config['refresh_token'],
                ]
            ]);

         $data=json_decode($res->getBody(), TRUE);


            $adapter = new DropboxAdapter(new DropboxClient(
                $data['access_token']
            ));

            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });

    }
}
