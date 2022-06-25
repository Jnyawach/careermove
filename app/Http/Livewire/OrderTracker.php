<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Product;
use Livewire\Component;

class OrderTracker extends Component
{
    public $code;
    public $order;
    public $info=false;

    public function render()
    {
        return view('livewire.order-tracker');
    }

    public function searchOrder(){
        if($order=Order::where('order_number',$this->code)->first()){
          $this->order=$order;
        }else{
         $this->info="We did not find your Order. Please check the Order Number and try again";
        }
    }

    public function restoreOrder($id){
        $order=Order::findOrFail($id);

        $product=Product::findOrFail($order->product_id);

        \Cart::clear();

        \Cart::add([
            'id'=>$order->id,
            'name'=>$product->name,
            'quantity'=>1,
            'price'=>$product->price,
            'weight'=>0,


        ])->associate($order);

        return redirect('cart');

    }
}
