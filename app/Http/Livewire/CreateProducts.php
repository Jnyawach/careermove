<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProducts extends Component
{
    use WithFileUploads;
    public $description;
    public $name;
    public $category;
    public $sale_price;
    public $price;
    public $photo;

    protected $rules=[
        'description'=>'required',
        'name'=>'required|string|max:150|min:10',
        'price'=>'required|integer',
        'sale_price'=>'required|integer',
        'category'=>'integer|required',
        'photo'=>'required|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=874,height=1240',
    ];
    protected $messages=[
        'description.required'=>'Please Provide Product description',
        'name.required'=>'Please provide product name',
        'price.required'=>'Please provide product name',
        'sale_price.required'=>'Please provide product name',
        'name.max'=>'The product Name is too long',
        'name.min'=>'The product Name is too short',
        'price.integer'=>'The price must be whole number',
        'sale_price.integer'=>'The price must be whole number',
        'photo.dimensions'=>'Please ensure that product image is 874px by 1240px',
        'photo.required'=>'Please provide product image'


    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        $categories=Category::pluck('name','id');
        return view('livewire.create-products',[
            'categories'=>$categories,
        ]);
    }

    public function createProduct(){

        $this->validate();
        $sku=Carbon::now()->timestamp."CER";

        $product=Product::create([
            'name'=>$this->name,
            'status'=>1,
            'description'=>$this->description,
            'price'=>$this->price,
            'sale_price'=>$this->sale_price,
            'category_id'=>$this->category,
            'sku'=>$sku
        ]);

        if($files=$this->photo){
            $product->addMedia($files)->toMediaCollection('photo');
        }

        $this->reset();

        return redirect('admin/products')
        ->with('status','Products Created Successfully');

    }
}
