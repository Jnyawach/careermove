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
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-link text-decoration-none" data-bs-toggle="modal"
                                        data-bs-target="#statusModel{{$job->id}}">
                                    {{$job->status->name}}<i class="fa-solid fa-square-pen ms-2"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="statusModel{{$job->id}}" tabindex="-1"
                                     aria-labelledby="statusModel{{$job->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="statusModel{{$job->id}}Label">Change Job
                                                    Status</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('jobs.update',$job->id)}}"
                                                      id="status{{$job->id}}">
                                                    @method('PATCH')
                                                    @csrf
                                                    <h6>Set Status to:</h6>
                                                    @foreach($statuses as $id=>$status)
                                                        <div class="form-check mt-3">
                                                            <input class="form-check-input" type="radio"
                                                                   name="status_id" value="{{$id}}" required>
                                                            <label class="form-check-label " for="experience{{$id}}">
                                                                {{$status}}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    @error('lastName') <span class="error">{{ $message }}</span> @enderror<br>

                                                </form>
                                            </div>
                                            <div class="modal-footer">

                                                <button type="submit" class="btn btn-primary" form="status{{$job->id}}">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div></td>
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
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>CREATED ON</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
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

