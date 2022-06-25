@extends('layouts.admin')
@section('title','Testimonies')
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
                        <h5 style="font-size: 18px" class="w-100 ">Testimonies-({{$testimonies->count()}})
                        <a href="{{route('testimony.create')}}" class="float-end">Add Testimony</a> </h5>
                    </div>
                    <div class="card-body">
                        <table id="role" class="display">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>PROFILE</th>
                                <th>PROFESSION</th>
                                <th>RATING</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($testimonies as $testimony)
                                <tr>
                                    <td>{{$testimony->id}}</td>
                                    <td>{{$testimony->first_name}}</td>
                                    <td>
                                        <img src="{{asset($testimony->getFirstMediaUrl('profile')
                                        ?$testimony->getFirstMediaUrl('profile','profile-icon'):'images/user-icon.png')}}"
                                        class="img-fluid" style="height:50px">
                                    </td>
                                    <td>{{$testimony->title}}</td>
                                    <td>{{$testimony->rating}}/5</td>
                                    <td>
                                        @if ($testimony->status==1)
                                        <form action="{{route('testimony-status',$testimony->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            @honeypot
                                            <input type="hidden" value="0" name="status">
                                            <button type="submit" class="btn btn-link text-danger">Disable</button>
                                        </form>
                                        @else
                                        <form action="{{route('testimony-status',$testimony->id)}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            @honeypot
                                            <input type="hidden" value="1" name="status">
                                            <button type="submit" class="btn btn-link text-success">Enable</button>
                                        </form>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false" style="cursor: pointer">Action</h5>
                                            <ul class="dropdown-menu" aria-labelledby="roleButton">
                                                <li><a class="dropdown-item" href="{{route('testimony.show',$testimony->id)}}">View</a> </li>
                                                @can('Edit-model')
                                                <li><a class="dropdown-item" href="{{route('testimony.edit',  $testimony->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{route('testimony.destroy',$testimony->id)}}"
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
                                <th>PROFILE</th>
                                <th>PROFESSION</th>
                                <th>RATING</th>
                                <th>STATUS</th>
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
