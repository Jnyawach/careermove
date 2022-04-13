@extends('layouts.admin')
@section('title','Industry')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <div class="container">

        @include('includes.status')
        <section class="p-3">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-header p-3">
                            <h5 style="font-size: 18px" class="float-start">Industry</h5>
                            <!-- Button trigger modal -->
                            <button class="float-end btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#createCategoryModal">Add Industry
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="#createCategoryModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="#createCategoryModalLabel">Add Industry</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('industry.store')}}" method="POST" id="roleForm"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group required">
                                                    <label class="control-label" for="name">
                                                        Profession</label>
                                                    <input type="text" class="form-control complete" name="name"
                                                           required>
                                                    @error('name') <span class="error">{{ $message }}</span> @enderror

                                                </div>
                                                <div class="form-group mt-3">
                                                    <label class="control-label" for="status">
                                                        Status</label>
                                                    <select class="form-select" name="status"
                                                            id="status">
                                                        <option selected
                                                                value="1">Active</option>
                                                        <option value="0">Inactive</option>

                                                    </select>
                                                    @error('status') <span class="error">{{ $message }}</span> @enderror
                                                </div>

                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" form="roleForm" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="role" class="display">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>JOBS</th>
                                    <th>CREATED ON</th>
                                    <th>ACTION</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($industries as $industry)
                                    <tr>
                                        <td>{{$industry->id}}</td>
                                        <td>{{$industry->name}}</td>
                                        <td>{{$industry->jobs->count()}}</td>
                                        <td>{{$industry->created_at->diffForHumans()}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6"
                                                    data-bs-toggle="dropdown"
                                                    aria-expanded="false" style="cursor: pointer">Action</h5>
                                                <ul class="dropdown-menu" aria-labelledby="roleButton">
                                                    <li><a class="dropdown-item" href="{{route('industry.show',$industry->slug)}}">View</a> </li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                           data-bs-target="#editModal{{$industry->id}}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{route('industry.destroy',$industry->id)}}"
                                                              method="POST">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit" class="dropdown-item text-danger">
                                                                delete
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editModal{{$industry->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit
                                                                Profession</h5>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{route('industry.update',$industry->id)}}"
                                                                method="POST" id="roleEdit{{$industry->id}}" enctype="multipart/form-data">
                                                                @method('PATCH')
                                                                @csrf
                                                                <div class="form-group required">
                                                                    <label class="control-label" for="name">
                                                                        Industry Name:
                                                                    </label>
                                                                    <input type="text" class="form-control complete"
                                                                           name="name"
                                                                           required value="{{$industry->name}}">
                                                                    @error('name') <span class="error">{{ $message }}</span> @enderror

                                                                </div>
                                                                <div class="form-group mt-3">
                                                                    <label class="control-label" for="status">
                                                                        Status</label>
                                                                    <select class="form-select" name="status"
                                                                            id="status">
                                                                        <option selected
                                                                                value="1">Active</option>
                                                                        <option value="0">Inactive</option>

                                                                    </select>
                                                                    @error('status') <span class="error">{{ $message }}</span> @enderror
                                                                </div>


                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary"
                                                                    form="roleEdit{{$industry->id}}">Save changes
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>NAME</th>
                                    <th>JOBS</th>
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

