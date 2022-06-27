<?php

namespace App\Http\Livewire;

use App\Models\Discount;
use App\Models\Order;
use Carbon\Carbon;
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



















    public function payPhone(){


    }
    public function clickPay(){
       //$cart= \Cart::getContent()->first()->model;

    


    }
}
