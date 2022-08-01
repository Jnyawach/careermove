<?php

namespace App\Http\Livewire;

use App\Models\Discount;
use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;
use Config;

class CartPage extends Component
{
    public $promo;
    public $success=false;
    public $phone=false;
    public $payment=false;
    public $amount;
    public $cellphone;
    public $order;
    public $mssd;

    protected $rules=[
        'mssd'=>'required|max:10|min:10'
    ];

    protected $messages=[
        'mssd.max'=>'Invalid! Check length or format: Use this format 0722002100',
        'mssd.min'=>'Invalid! Check length or format: Use this format 0722002100',
        'required'=>'Please provide :attribute',
    ];



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

    public function payPhone(){


    }
    public function clickPay(){
       $cart= \Cart::getContent()->first()->model;
       if ($this->mssd){
        $this->validate();
        $phone=substr($this->mssd,1);
        $code="254";

       $this->cellphone=$code.$phone;
       }else{
        $phone=substr($cart->cellphone,1);
        $code="254";

        $this->cellphone=$code.$phone;

       }


       $this->order=$cart->order_number;
       $this->amount=\Cart::getTotal();



       $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $body = array(
            'BusinessShortCode' =>Config::get('cervempesa.SHORTCODE'),
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' =>$this->amount,
            'PartyA' =>$this->cellphone,
            'PartyB' => Config::get('cervempesa.SHORTCODE'),
            'PhoneNumber' =>$this->cellphone,
            'CallBackURL' =>'https://careermove.co.ke/api/v1/cerve/callback/'.Config::get('cervempesa.CONFIRMATION_KEY'),
            'AccountReference' =>$this->order,
            'TransactionDesc' => 'Professional CV'
          );

          $response=$this->makeHTTP($url,$body);
          $status=json_decode($response);

         if(isset($status->ResponseCode)){
            if($status->ResponseCode==0){
                return redirect('confirmation');
            }else{
                $this->payment="Payment unsuccessful Please try again";
            }


          }else{
            $this->payment="Payment unsuccessful Please try again";

          }




    }


    //Mpesa Functions
   public function generateAccessToken()
    {
        $consumer_key=Config::get('cervempesa.CONSUMER_KEY');
        $consumer_secret=Config::get('cervempesa.CONSUMER_SECRET');
        $credentials = base64_encode($consumer_key.":".$consumer_secret);

        $url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        return $access_token->access_token;
    }

    public function makeHTTP($url, $body)
    {

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
        $curl_response = curl_exec($curl);
        return $curl_response;


    }


    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey = Config::get('cervempesa.PASS_KEY');
        $BusinessShortCode = Config::get('cervempesa.SHORTCODE');
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }


    public function customerMpesaSTKPush()
    {

        $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $body = array(
            'BusinessShortCode' =>Config::get('cervempesa.SHORTCODE'),
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 1,
            'PartyA' => +254705813739,
            'PartyB' => Config::get('cervempesa.SHORTCODE'),
            'PhoneNumber' => +254705813739,
            'CallBackURL' =>'https://careermove.co.ke/api/v1/cerve/callback/'.Config::get('cervempesa.CONFIRMATION_KEY'),
            'AccountReference' =>'Careermove',
            'TransactionDesc' => 'Professional CV'
          );

          $response=$this->makeHTTP($url,$body);

          return $response;


    }


    public function mpesaRegisterUrls()
    {
      $url='https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
      $body=array(
            'ShortCode' =>Config::get('cervempesa.SHORTCODE'),
            'ResponseType' => 'Completed',
           'ConfirmationURL' => 'https://careermove.co.ke/api/v1/cerve/confirm/'.Config::get('cervempesa.CONFIRMATION_KEY'),
            'ValidationURL' => 'https://careermove.co.ke/api/v1/cerve/validate'.Config::get('cervempesa.VALIDATION_KEY')
       );

        $response=$this->makeHTTP($url,$body);
        return $response;




    }



}
