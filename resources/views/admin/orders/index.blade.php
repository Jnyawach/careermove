@extends('layouts.admin')
@section('title','Orders')
@section('content')
<section class="p-5">
    <div>
        <h1 class="fs-4 d-inline-block">Orders</h1>
        <a href="{{route('orders.create')}}" class="d-inline-block btn btn-primary float-end">
            Create Order
        </a>

    </div>
    <hr>

    <div class="row mt-5">
        @foreach ($progress as $status)
        <div class="col-12 col-sm-6 col-md-6 col-lg-4 p-2">
            <a href="{{route('order-status',$status->id)}}" class="text-decoration-none">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="card-title">
                        <h1 class="fs-3">{{$status->name}}</h1>
                    </div>
                    <div>
                        <h6 class="fw-bold fs-4">{{$status->orders->count()}}</h6>
                    </div>

                </div>


            </div>
            </a>
        </div>

        @endforeach

    </div>
</section>
@endsection
