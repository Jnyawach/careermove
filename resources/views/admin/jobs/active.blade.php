@extends('layouts.admin')
@section('title','Job Listings')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">


        @include('includes.jobs_nav')
        @include('includes.status')
        <div class="card mt-5 shadow-sm">
            <div class="card-header">
                <h5>Active Jobs</h5>
            </div>
            <div class="card-body">
                <table id="table_id4" class="display">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>CREATED ON</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                        <tr>
                            <td>{{$job->id}}</td>
                            <td>{{$job->title}}</td>
                            <td>{{$job->created_at->diffForHumans()}}</td>
                            <td>
                                <a href="{{route('jobs.show', $job->slug)}}" class="btn btn-link p-0 m-0 text-decoration-none">
                                    {{$job->status->name}}<i class="fa-solid fa-square-pen ms-2"></i>
                                </a>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false" style="cursor: pointer">Action</h5>
                                    <ul class="dropdown-menu" aria-labelledby="roleButton">
                                        <li>
                                            <a class="dropdown-item" href="{{route('jobs.edit',$job->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{route('jobs.show',$job->slug)}}">View</a>
                                        </li>
                                        <li>
                                            <form action="{{route('jobs.destroy',$job->id)}}" method="POST">
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
                        <th>TITLE</th>
                        <th>CREATED ON</th>
                        <th>STATUS</th>
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

