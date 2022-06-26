<?php

namespace App\Http\Livewire;

use App\Models\Discount;
use App\Models\Mpesa;
use App\Models\Order;
use Carbon\Carbon;
use Config;
use Illuminate\Support\Arr;
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

    public function generateAccessToken()
    {
        $consumer_key=Config::get('cervempesa.CONSUMER_KEY');
        $consumer_secret=Config::get('cervempesa.CONSUMER_SECRET');
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
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

    public function lipaNaMpesaPassword()
    {
        $lipa_time = Carbon::rawParse('now')->format('YmdHms');
        $passkey =Config::get('cervempesa.MPESA_PASSKEY');
        $BusinessShortCode = Config::get('cervempesa.SHORTCODE');
        $timestamp =$lipa_time;
        $lipa_na_mpesa_password = base64_encode($BusinessShortCode.$passkey.$timestamp);
        return $lipa_na_mpesa_password;
    }

    public function makeHttp($url,$body){

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));


        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
        $curl_response = curl_exec($curl);
        return $curl_response;

    }


    public function customerMpesaSTKPush()
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';


        $body = array (
            //Fill in the request parameters with valid values
            'BusinessShortCode' => Config::get('cervempesa.SHORTCODE'),
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 1,
            'PartyA' => 254705813739, // replace this with your phone number
            'PartyB' => Config::get('cervempesa.SHORTCODE'),
            'PhoneNumber' => 254705813739, // replace this with your phone number
            'CallBackURL' => 'https://careermove.co.ke/',
            'AccountReference' => "Careermove",
            'TransactionDesc' => "Careermove payment"
        );

        $response=$this->makeHttp($url,$body);
        return $response;

    }

     /**
     * J-son Response to M-pesa API feedback - Success or Failure
     */
    public function createValidationResponse($result_code, $result_description){
        $result=json_encode(["ResultCode"=>$result_code, "ResultDesc"=>$result_description]);
        $response = new Response();
        $response->headers->set("Content-Type","application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }

    /**
     *  M-pesa Validation Method
     * Safaricom will only call your validation if you have requested by writing an official letter to them
     */
    public function mpesaValidation()
    {
        $result_code = "0";
        $result_description = "Accepted validation request.";
        return $this->createValidationResponse($result_code, $result_description);
    }

    public function mpesaConfirmation(Request $request)
    {
        $content=json_decode($request->getContent());
        $mpesa_transaction = new Mpesa();
        $mpesa_transaction->TransactionType = $content->TransactionType;
        $mpesa_transaction->TransID = $content->TransID;
        $mpesa_transaction->TransTime = $content->TransTime;
        $mpesa_transaction->TransAmount = $content->TransAmount;
        $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
        $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
        $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
        $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
        $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
        $mpesa_transaction->MSISDN = $content->MSISDN;
        $mpesa_transaction->FirstName = $content->FirstName;
        $mpesa_transaction->MiddleName = $content->MiddleName;
        $mpesa_transaction->LastName = $content->LastName;
        $mpesa_transaction->save();
        // Responding to the confirmation request
        $response = new Response();
        $response->headers->set("Content-Type","text/xml; charset=utf-8");
        $response->setContent(json_encode(["C2BPaymentConfirmationResult"=>"Success"]));
        return $response;
    }

    /**
     * M-pesa Register Validation and Confirmation method
     */
    public function mpesaRegisterUrls()
    {

        $url='https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        $body=json_encode(array(
            'ShortCode' => Config::get('cervempesa.SHORTCODE'),
            'ResponseType' => 'Completed',
            'ConfirmationURL' => 'https://careermove.co.ke/api/v1/cerve/transaction/confirmation/'.Config::get('cervempesa.MPESA_CONFIRM_KEY'),
            'ValidationURL' => 'https://careermove.co.ke/api/v1/cerve/validation/'.Config::get('cervempesa.MPESA_VALIDATE_KEY')
        ));
        $response=$this->makeHttp($url,$body);

    }



    public function payPhone(){


    }
    public function clickPay(){
       //$cart= \Cart::getContent()->first()->model;

       $response=$this->generateAccessToken();

       dd($response);


    }
}
