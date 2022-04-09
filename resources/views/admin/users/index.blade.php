@extends('layouts.admin')
@section('title','Users')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section>
        <div class="row">
            <div class="col-12 p-5">
                <h2>Users</h2>
                <hr>
                <section>
                    <div class="row">
                        <div class="col-12 mx-auto">
                            @include('includes.status')
                            <div class="card shadow-sm">
                                <div class="card-header p-3">
                                    <h5 style="font-size: 18px">Users<span class="float-end fw-bold">Total:
                                            {{$users->count()}}</span></h5>
                                </div>
                                <div class="card-body">
                                    <table id="table_id4" class="display">
                                        <thead>
                                        <tr>
                                            <th>User Id</th>
                                            <th>Name</th>
                                            <th>Registration date</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($users->count()>0)
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{$user->id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->created_at->isoFormat('MMM Do Y')}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->getRoleNames()->first()}}</td>
                                                    <td>
                                                        <!---remember to use auth for super admin-->
                                                        <div class="dropdown">
                                                            <button class="btn  p-0 m-0 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                                                See action
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="{{route('users.show',$user->id)}}">
                                                                        View <i class="fas fa-external-link-square-alt ms-2"></i>
                                                                  </a>
                                                                </li>
                                                                @can('Edit-model')
                                                                    <li><a class="dropdown-item" href="{{route('users.edit',$user->id)}}">
                                                                    Edit <i class="fas fa-bookmark ms-2"></i></a>
                                                                    </li>

                                                                    <li>
                                                                        <form method="POST" action="{{route('users.destroy', $user->id)}}">
                                                                            @method('DELETE')
                                                                            @csrf
                                                                            <input type="hidden" name="user_id"  value="{{$user->id}}">
                                                                            <button type="submit"  class="btn text-danger">Delete
                                                                                    <i class="far fa-trash-alt ms-2"></i>
                                                                            </button>
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
                                        <th>User Id</th>
                                        <th>Name</th>
                                        <th>Registration date</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                        </tfoot>

                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="{{route('users.create')}}">Add User</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>

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

