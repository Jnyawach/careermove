<?php

namespace App\Http\Livewire;


use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;
class EditProducts extends Component
{
    use WithFileUploads;
    public $description;
    public $name;
    public $category;
    public $sale_price;
    public $price;
    public $photo;
    public $product;

    public function mount(){
        $this->description=$this->product->description;
        $this->name=$this->product->name;
        $this->category=$this->product->category_id;
        $this->sale_price=$this->product->sale_price;
        $this->price=$this->product->price;
    }
    protected $rules=[
        'description'=>'required',
        'name'=>'required|string|max:150|min:10',
        'price'=>'required|integer',
        'sale_price'=>'required|integer',
        'category'=>'integer|required',
        'photo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048|dimensions:width=874,height=1240',
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

    ];
    public function render()
    {
        $categories=Category::pluck('name','id');
        return view('livewire.edit-products',[
            'categories'=>$categories,
        ]);
    }

    public function updateProduct(){

        $this->validate();


        $product=Product::findOrFail($this->product->id);
        $product->update([
            'name'=>$this->name,
            'status'=>1,
            'description'=>$this->description,
            'price'=>$this->price,
            'sale_price'=>$this->sale_price,
            'category_id'=>$this->category,

        ]);

        if($files=$this->photo){
            $product->clearMediaCollection('photo');
            $product->addMedia($files)->toMediaCollection('photo');
        }

        $this->reset();

        return redirect('admin/products')
        ->with('status','Products Updated Successfully');

    }
}
