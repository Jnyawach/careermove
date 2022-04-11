@extends('layouts.admin')
@section('title','Users')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>{{$users}}</h1>
                        </div>
                        <h5>Total Users</h5>
                    </div>

                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>{{$managers->count()}}</h1>
                        </div>
                        <h5>Managers</h5>
                    </div>

                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>{{$employers}}</h1>
                        </div>
                        <h5>Employers
                        <a href="{{route('admin-employers')}}" class="float-end">See all</a> </h5>
                    </div>

                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="card-title">
                            <h1>{{$jobseekers}}</h1>
                        </div>
                        <h5>Jobseekers
                            <a href="{{route('admin-jobseeker')}}" class="float-end">See all</a> </h5>
                    </div>

                </div>
            </div>
        </div>

        @include('includes.status')
        <div class="card mt-5">
            <div class="card-header">
                <h5>Managers</h5>
            </div>
            <div class="card-body">
                <table id="table_id4" class="display">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>CREATED ON</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($managers as $manager)
                        <tr>
                            <td>{{$manager->id}}</td>
                            <td>{{$manager->name}}</td>
                            <td>{{$manager->email}}</td>
                            <td>{{$manager->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="dropdown">
                                    <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false" style="cursor: pointer">Action</h5>
                                    <ul class="dropdown-menu" aria-labelledby="roleButton">
                                        <li><a class="dropdown-item" href="{{route('users.show',$manager->id)
                                        }}">View</a></li>
                                        @can('Edit-model')
                                        <li><a class="dropdown-item" href="{{route('users.edit',$manager->id)
                                        }}">Edit</a></li>

                                        <li>
                                            <form action="{{route('users.destroy',$manager->id)}}" method="POST">
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
                        <th>EMAIL</th>
                        <th>CREATED ON</th>
                        <th>ACTION</th>
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
            $('#table_id4').DataTable();

        } );
    </script>
@endsection

