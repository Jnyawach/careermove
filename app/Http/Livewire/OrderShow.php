<?php

namespace App\Http\Livewire;

use App\Models\Discount;
use App\Models\Order;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class OrderShow extends Component
{
    public $order;
    public $status;
    public $success=false;
    public $discount=false;
    public $amount;
    public $expiry;


    public function render()
    {
        $statuses=Progress::pluck('name','id');
        return view('livewire.order-show',[
            'statuses'=>$statuses,
        ]);
    }

    public function orderStatus(){
        $order=Order::findOrFail($this->order->id);
        $order->update([
            'progress_id'=>$this->status,
            'user_id'=>Auth::id()
        ]);
        $this->order=$order;

        $this->success="Status Changed Successfully";


    }

    public function offerDiscount(){
        $order=Order::findOrFail($this->order->id);
        $uniqueKey=strtoupper(substr(sha1(microtime()), rand(0, 5),6));

        $discount=$order->discount()->create([
            'amount'=>$this->amount,
            'expiry'=>$this->expiry,
            'code'=>$uniqueKey
        ]);
        $this->order=$order;
        Mail::send('mailing.discount', ['discount'=>$discount, 'order'=>$order], function ($message) use($discount,$order){
            $message->to($order->email);
            $message->subject('Here is a discount for you!');

        });

        $this->discount="Discount Sent Successfully";

    }

    public function deleteDiscount($id){
        $discount=Discount::findOrFail($id);
        $discount->delete();
        return redirect(request()->header('Referer'));
    }
}
