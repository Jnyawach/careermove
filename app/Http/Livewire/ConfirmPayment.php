<?php

namespace App\Http\Livewire;

use App\Models\MpesaStkPush;
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
     if($payment=MpesaStkPush::where('mpesa_receipt_number',$this->code)->first()){
        return redirect('thank-you');
     }else{
        $this->information="We couldn't your confirm payment. Please check the MPESA code you
        entered and try again; Contact 0705813739 for assistance";
     }


    }


}
