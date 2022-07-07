@extends('layouts.admin')
@section('title', $product->title)
@section('content')
<section class="p-5">
    <ul class="nav">
        <li class="nav-item">
            <a href="{{route('products.edit',$product->id)}}" class="btn btn-link text-decoration-none">Edit</a>
        </li>
        <li class="nav-item">
            <button type="button" class="btn btn-link text-decoration-none">
                Status: @if ($product->status==0)
                    Disabled
                    @else
                    Active
                @endif
            </button>
        </li>


    </ul>
    <hr>
    <div class="row">
        <div class="col-4">
            <img src="{{$product->getFirstMediaUrl('photo')}}"
            class="img-fluid img-thumbnail">

        </div>
        <div class="col-8">
            <h1 class="fs-4">{{$product->name}}</h1>
            <div>
                <p class="p-0 m-0"><span>Price:</span> {{$product->price}}</p>
                <p class="p-0 m-0"><span>Marked Price:</span> {{$product->sale_price}}</p>
                <p class="p-0 m-0"><span>Sku:</span> {{$product->sku}}</p>
                <p class="p-0 m-0"><span>Category:</span> {{$product->category->name}}</p>
                <p class="p-0 mt-3"><span>Description:</span>{{$product->description}}</p>
                <p class="p-0 mt-3"><span>Offers:</span>{{$product->offers}}</p>
            </div>
        </div>
    </div>
</section>
@endsection
