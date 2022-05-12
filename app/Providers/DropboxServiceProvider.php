<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Storage;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $client = new Client(env('DROPBOX_ACCESS_TOKEN'));

        $adapter = new DropboxAdapter($client);

        return new Filesystem($adapter, ['case_sensitive' => false]);
    }



    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
