@extends('layouts.admin')
@section('title', $progress->name)
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
<section class="p-5">
    <h1 class="fs-4 d-inline-block">{{$progress->name}} Orders ({{$progress->count()}})</h1>
    <ul class="nav mt-5">
        @foreach ($statuses as $status)
        <li class="nav-item">
            <a class="nav-link fw-bold "  href="{{route('order-status',$status->id)}}">{{$status->name}}</a>
          </li>
        @endforeach

      </ul>
    <hr>
    <div class="card">

        <div class="card-body">
            <table id="blog" class="display">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Payment</th>
                    <th>Cellphone</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Action </th>
                </tr>
                </thead>
                <tbody>
                @if($progress->count()>0)
                    @foreach($progress->orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->payment?$order->payment->mpesa_receipt_number:'N/A'}}</td>

                            <td>{{$order->cellphone}}</td>
                            <td>{{$order->product->name}}</td>
                            <td class="text-warning">{{$order->progress->name}}</td>
                            <td>
                                <!---remember to use auth for super admin-->
                                <div class="dropdown">
                                    <button class="btn p-0 m-0 dropdown-toggle" type="button"
                                            id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                        See action
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="message1">
                                        <li><a class="dropdown-item" href="{{route('orders.show', $order->id)}}">
                                                View <i class="fas fa-external-link-square-alt ms-2"></i></a>
                                        </li>
                                        @can('Edit-model')
                                            <li><a class="dropdown-item" href="{{route('orders.edit', $order->id)}}">
                                                    Edit <i class="fas fa-bookmark ms-2"></i></a></li>


                                        @endcan
                                    </ul>

                                </div>

                            </td>



                        </tr>

                    @endforeach
                @endif
                </tbody>
                <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Payment</th>
                    <th>Cellphone</th>
                    <th>Product</th>
                    <th>Status</th>
                    <th>Action </th>
                </tr>
                </tfoot>

            </table>

        </div>
    </div>
</section>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#blog').DataTable();

        } );
    </script>
@endsection
