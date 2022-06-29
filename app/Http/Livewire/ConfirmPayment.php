<?php

namespace App\Http\Livewire;

use App\Models\MpesaStkPush;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ConfirmPayment extends Component
{
    public $information;
    public $code;

    public function render()
    {
        return view('livewire.confirm-payment');
    }

    public function confirmPayment(){
        if(\Cart::getContent()){
            //get cart/order details
        $cart= \Cart::getContent()->first()->model;


        if($payment=MpesaStkPush::where('mpesa_receipt_number',$this->code)->first()){
           if(is_null($payment->order_id)){
               $payment->update(['order_id'=>$cart->id]);
               $order=Order::findOrFail($cart->id);
               $order->update([
                'trans_id'=> $payment->id,
                'progress_id'=>2,
                'paid'=>1
               ]);

               Mail::send('mailing.order', ['payment'=>$payment, 'order'=>$order], function ($message) use($payment,$order){
                $message->to($order->email);
                $message->subject('Order Confirmation');

            });

            \Cart::clear();


               return redirect('thank-you');
           }else{
               $this->information="We couldn't your confirm payment. The Mpesa Code is invalid. Contact 0705813739 for assistance";
           }

        }else{
           $this->information="We couldn't your confirm payment. Please check the MPESA code you
           entered and try again; Contact 0705813739 for assistance";
        }

        }else{
            $this->information="We couldn't your confirm payment because there is no
            content in your cart. Contact 0705813739 for assistance";
        }



    }


}
