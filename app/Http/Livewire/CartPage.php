<?php

namespace App\Http\Livewire;

use App\Models\Discount;
use App\Models\Order;
use Carbon\Carbon;
use Config;
use Livewire\Component;

class CartPage extends Component
{
    public $promo;
    public $success=false;
    public $phone=false;
    public $mssd;



    public function render()
    {
        return view('livewire.cart-page');
    }

    public function clearCart($id){
        \Cart::remove($id);
        $order=Order::findOrFail($id);
        $order->delete();
    }

    public function addDiscount(){
        $this->validate([
            'promo'=>'required|string|max:7'
        ],[
            'promo.max'=>'The code is invalid',
            'promo.required'=>'The discount code is required',
            'promo.string'=>'The Code is invalid'
        ]);

        if($discount=Discount::where('code',$this->promo)->latest()->first()){


        if($discount->status==1 && Carbon::parse($discount->expiry)>=Carbon::today()){
            $discountCondition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'Discount Sale',
                'type' => 'tax',
                'target' => 'subtotal',
                'value' => '-'.$discount->amount.'%',
            ));
            \Cart::clearCartConditions();
            \Cart::condition($discountCondition);

            $discount->update([
                'status'=>0
            ]);

            $this->success="The discount has been applied";
        }else{
            $this->success="The promo code has been used";
        }
    }else{
        $this->success="The discount code is expired";
    }
    }


    public function editPhone(){
        $this->phone=true;

    }

    protected function getAccessToken(){

        $credentials = base64_encode(Config::get('mpesa.CONSUMER_KEY').':'.Config::get('mpesa.CONSUMER_SECRET'));

        $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Basic '.$credentials]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = json_decode(curl_exec($ch));
        curl_close($ch);
        return  $response->access_token;
    }



    protected function makeHTTP($body){

        $ch = curl_init('https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer '.$this->getAccessToken(),
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response     = curl_exec($ch);
        curl_close($ch);
        return $response;

    }

    public function simulateTransaction()
    {
        $body = array(
            'ShortCode' => Config::get('mpesa.SHORTCODE'),
            'Msisdn' => Config::get('mpesa.MPESA_MSSDN'),
            'Amount' => 1,
            'BillRefNumber' => 11224455,
            'CommandID' => 'CustomerPayBillOnline'
        );

        $url =  '/c2b/v1/simulate';
        $response = $this->makeHttp($url, $body);

        return $response;
    }
    /*Register */
    public function registerURLS()
    {
        $body = array(
            'ShortCode' => Config::get('mpesa.SHORTCODE'),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => Config::get('mpesa.MPESA_URL') . '/api/confirmation/'.Config::get('mpesa.MPESA_CONFIRM_KEY'),
            'ValidationURL' => Config::get('mpesa.MPESA_URL') . '/api/validation/'.Config::get('mpesa.MPESA_VALIDATE_KEY'),
        );



        $url = '/c2b/v1/registerurl';

        $response = $this->makeHttp($body);

        return $response;
    }

    public function payPhone(){
        $this->getAccessToken();

    }
    public function clickPay(){
       //$cart= \Cart::getContent()->first()->model;

       $response=$this->simulateTransaction();

       dd($response);


    }
}
