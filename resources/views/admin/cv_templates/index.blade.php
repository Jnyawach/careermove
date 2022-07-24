@extends('layouts.admin')
@section('title','Resume Templates')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <div>
            <h1 class="fs-3 d-inline-block">CV templates</h1>
            <a href="{{route('cv_templates.create')}}" class="btn btn-primary d-inline-block float-end">
                Create Template</a>
        </div>

        <hr>
        @include('includes.status')
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header p-3">
                        <h5 style="font-size: 18px">CV Templates</h5>
                    </div>
                    <div class="card-body">
                        <table id="role" class="display">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>FOLDER</th>
                                <th>IMAGE</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($templates as $template)
                                <tr>
                                    <td>{{$template->id}}</td>
                                    <td>{{$template->name}}</td>
                                    <td>{{$template->folder}}</td>
                                    <td><img src="{{asset($template->getFirstMediaUrl('template')
                                        ?$template->getFirstMediaUrl('template','template-icon'):'company-icon.jpg')}}"
                                             alt="{{$template->name}}" style="height: 60px"></td>
                                    <td>
                                        @if($template->status=0)
                                            <span class="text-danger">Inactive</span>
                                        @else
                                            <span class="text-success">Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false" style="cursor: pointer">Action</h5>
                                            <ul class="dropdown-menu" aria-labelledby="roleButton">
                                                <li><a class="dropdown-item" href="{{route('cv_templates.show',$template->slug)}}">View</a> </li>
                                                @can('Edit-model')
                                                    <li><a class="dropdown-item" href="{{route('cv_templates.edit',  $template->id) }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <form action="{{route('cv_templates.destroy',$template->id)}}"
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
                                <th>FOLDER</th>
                                <th>IMAGE</th>
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
@endsection
@section('scripts')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready( function () {
            $('#role').DataTable();
        } );
    </script>
@endsection

