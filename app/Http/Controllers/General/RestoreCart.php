<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Mpesa\Registrar;
use App\Mpesa\TokenGenerator;
use Illuminate\Http\Request;

class RestoreCart extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        //
       try{
        $env='sandbox';
        $config=config("mpesa.c2b.{$env}");
        $token=(new TokenGenerator())->generateToken($env);
        $confirmation_url=route('api.mpesa.c2b.confirm', $config['confirmation_key']);
        $validation_url=route('api.mpesa.c2b.validate', $config['validation_key']);
        $short_code=$config['short_code'];

        dd("haha");

        $response=(new Registrar())->setShortCode($short_code)
               ->setValidationUrl($validation_url)
               ->setConfirmationUrl($confirmation_url)
               ->setToken($token)
               ->register($env);

       } catch(\ErrorException $e){
        return $e->getMessage();


       }

       return $response;

    }
}
