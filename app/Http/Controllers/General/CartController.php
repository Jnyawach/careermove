<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Google\Service\ShoppingContent\Weight;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated=$request->validate([
            'name'=>'string|required|max:255',
            'email'=>'string|email|required|max:255',
            'cellphone'=>'required|max:10|min:10',
            'old_cv'=>'required|mimes:pdf,docx,doc|max:2048',

        ],[
            'required'=>'Please provide :attribute',
            'email.email'=>'Please provide a valid email',
            'cellphone.max'=>'Invalid! Check length or format: Use this format 0722002100',
            'old_cv.max'=>'Maximum file size is 2MB',
            'cellphone.min'=>'Invalid! Check length or format: Use this format 0722002100',
            'string'=>':attribute should be a string',
            'old_cv.mimes'=>'Only accepts pdf,doc or docx file types'
        ]);
        $product=Product::where('sku','1655820467CER')->latest()->first();

       $order_number=Carbon::now()->timestamp."CER";
        $order=Order::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'cellphone'=>$validated['cellphone'],
            'paid'=>0,
            'progress_id'=>1,
            'product_id'=>$product->id,
            'order_number'=>$order_number,
        ]);

        if($files=$request['old_cv']){
            $order->addMedia($files)->toMediaCollection('old_cv');
        }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated=$request->validate([
            'name'=>'string|required|max:255',
            'email'=>'string|email|required|max:255',
            'cellphone'=>'required|max:13|min:13',
            'old_cv'=>'nullable|mimes:pdf,docx,doc|max:2048',

        ],[
            'required'=>'Please provide :attribute',
            'email.email'=>'Please provide a valid email',
            'cellphone.max'=>'Invalid! Check length or format: Use this format +254722002100',
            'old_cv.max'=>'Maximum file size is 2MB',
            'cellphone.min'=>'Invalid! Check length or format: Use this format +254722002100',
            'string'=>':attribute should be a string',
            'old_cv.mimes'=>'Only accepts pdf,doc or docx file types'
        ]);
        $order=Order::findOrFail($id);

        $order->update([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'cellphone'=>$validated['cellphone'],
            'paid'=>0,
            'progress_id'=>1,

        ]);
        if($files=$request['old_cv']){
            $order->cleaMediaCollection($files);
            $order->addMedia($files)->toMediaCollection('old_cv');
        }

        $product=Product::findOrFail($order->product_id);


        \Cart::clear();

        \Cart::add([
            'id'=>$order->id,
            'name'=>$product->name,
            'quantity'=>1,
            'price'=>$product->price,
            'weight'=>0,


        ])->associate($order);

        return redirect()->back()
        ->with('status','Order Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
