@extends('layouts.admin')
@section('title','Products')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                @include('includes.status')

                <div class="card">
                    <div class="card-header">
                        <h6 class="fs-5">Products- {{$products->count()}}
                        <a href="{{route('products.create')}}" class="float-end">Add Products</a></h6>
                    </div>
                    <div class="card-body">
                        <table id="blog" class="display">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Marked Price</th>
                                <th>Status</th>
                                <th>Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($products->count()>0)
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->price}}</td>

                                        <td>{{$product->sale_price}}</td>
                                        <td>
                                            @if ($product->status==1)
                                            <form action="{{route('products.update',$product->id)}}" method="POST">
                                                @method('PATCH')
                                                @csrf
                                                @honeypot
                                                <input type="hidden" value="0" name="status">
                                                <button type="submit" class="btn btn-link text-danger">Disable</button>
                                            </form>
                                            @else
                                            <form action="{{route('products.update',$product->id)}}" method="POST">
                                                @method('PATCH')
                                                @csrf
                                                @honeypot
                                                <input type="hidden" value="1" name="status">
                                                <button type="submit" class="btn btn-link text-success">Enable</button>
                                            </form>
                                            @endif

                                        </td>
                                        <td>
                                            <!---remember to use auth for super admin-->
                                            <div class="dropdown">
                                                <button class="btn p-0 m-0 dropdown-toggle" type="button"
                                                        id="message1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    See action
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="message1">
                                                    <li><a class="dropdown-item" href="{{route('products.show', $product->slug)}}">
                                                            View <i class="fas fa-external-link-square-alt ms-2"></i></a>
                                                    </li>
                                                    @can('Edit-model')
                                                        <li><a class="dropdown-item" href="{{route('products.edit', $product->id)}}">
                                                                Edit <i class="fas fa-bookmark ms-2"></i></a></li>
                                                        <li>
                                                            <form method="POST" action="{{route('products.destroy',$product->id)}}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn btn-link text-danger">delete</button>
                                                            </form>
                                                        </li>

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
                                <th>Price</th>
                                <th>Marked Price</th>
                                <th>Status</th>
                                <th>Action </th>
                            </tr>
                            </tfoot>

                        </table>

                    </div>
                </div>
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


