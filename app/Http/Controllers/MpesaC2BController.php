<?php

namespace App\Http\Controllers;

use App\Models\MpesaStkPush;
use Config;
use SmoDav\Mpesa\Laravel\Facades\Registrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MpesaC2BController extends Controller
{
    //



    public function validateTrx(Request $request){
        Log::info($request->all());
    }

    public function confirmTrx(Request $request){
        Log::info($request->all());
    }

    public function callbackTrx(){
        $callback=file_get_contents('php://input');
        $content=json_decode($callback);


        /*if ($content->Body->stkCallback->ResultCode==0){
            $mpesa_confirm=new MpesaStkPush();
            $mpesa_confirm->result_desc=$content->Body->stkCallback->ResultDesc;
            $mpesa_confirm->result_code=$content->Body->stkCallback->ResultCode;
            $mpesa_confirm->merchant_request_id=$content->Body->stkCallback->MerchantRequestID;
            $mpesa_confirm->checkout_request_id=$content->Body->stkCallback->CheckoutRequestID;
            $mpesa_confirm->amount= $content->Body->stkCallback->CallbackMetadata->Item[0]->Value;
            $mpesa_confirm->mpesa_receipt_number= $content->Body->stkCallback->CallbackMetadata->Item[1]->Value;
            $mpesa_confirm->transaction_date= $content->Body->stkCallback->CallbackMetadata->Item[3]->Value;
            $mpesa_confirm->phone_number= $content->Body->stkCallback->CallbackMetadata->Item[4]->Value;

            $mpesa_confirm->save();
        }*/
        Log::info($callback);


    }

    /**
     * Use this function to process the C2B Confirmation result callback
     * @return string
     */
    public static function C2BConfirmation(){
        $callbackJSONData=file_get_contents('php://input');
        $callbackData=json_decode($callbackJSONData);
        $transactionType=$callbackData->TransactionType;
        $transID=$callbackData->TransID;
        $transTime=$callbackData->TransTime;
        $transAmount=$callbackData->TransAmount;
        $businessShortCode=$callbackData->BusinessShortCode;
        $billRefNumber=$callbackData->BillRefNumber;
        $invoiceNumber=$callbackData->InvoiceNumber;
        $orgAccountBalance=$callbackData->OrgAccountBalance;
        $thirdPartyTransID=$callbackData->ThirdPartyTransID;
        $MSISDN=$callbackData->MSISDN;
        $firstName=$callbackData->FirstName;
        $middleName=$callbackData->MiddleName;
        $lastName=$callbackData->LastName;

        Log::info($callbackJSONData);
    }
}
