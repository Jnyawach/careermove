@extends('layouts.admin')
@section('title','Authors')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="container">

    @include('includes.status')
    <section class="p-2">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header p-3">
                        <h5 style="font-size: 18px" class="w-100 ">Authors-({{$authors->count()}})
                        <a href="{{route('authors.create')}}" class="float-end">Add Author</a> </h5>
                    </div>
                    <div class="card-body">
                        <table id="role" class="display">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>TITLE</th>
                                <th>PROFESSION</th>
                                <th>CREATED ON</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{$author->id}}</td>
                                    <td>{{$author->first_name}} {{$author->last_name}}</td>
                                    <td>{{$author->title}}</td>
                                    <td>{{$author->profession}}</td>
                                    <td>{{$author->created_at->diffForHumans()}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false" style="cursor: pointer">Action</h5>
                                            <ul class="dropdown-menu" aria-labelledby="roleButton">
                                                <li><a class="dropdown-item" href="{{route('authors.show',$author->id)}}">View</a> </li>
                                                @can('Edit-model')
                                                <li><a class="dropdown-item" href="{{route('authors.edit',  $author->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{route('authors.destroy',$author->id)}}"
                                                          method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            delete
                                                        </button>
                                                    </form>
                                                </li>
                                                    @endcan
                                            </ul>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>TITLE</th>
                                <th>PROFESSION</th>
                                <th>CREATED ON</th>
                                <th>ACTION</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#role').DataTable();
        } );
    </script>
@endsection
