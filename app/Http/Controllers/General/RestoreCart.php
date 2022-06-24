<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class RestoreCart extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        //
        $order=Order::findOrFail($id);
        $product=Product::findOrFail($order->product_id);

        \Cart::clear();

        \Cart::add([
            'id'=>$order->id,
            'name'=>$product->name,
            'quantity'=>1,
            'price'=>8000,
            'weight'=>0,


        ])->associate($order);



        return redirect('cart')
        ->with('status','Order Successfully restored');

    }
}
