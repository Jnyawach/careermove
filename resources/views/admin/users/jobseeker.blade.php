@extends('layouts.admin')
@section('title','Jobseeker')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
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
                    @foreach($jobseekers as $manager)
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
                                        <li><a class="dropdown-item" href="{{route('users.edit',$manager->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{route('users.destroy',$manager->id)}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="dropdown-item text-danger">
                                                    delete
                                                </button>
                                            </form>
                                        </li>
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
