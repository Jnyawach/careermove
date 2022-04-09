@extends('layouts.admin')
@section('title',$company->name)
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        <div class="row">
            <div class="col-12">
                <img src="{{asset($company->getFirstMediaUrl('logo')
                                        ?$company->getFirstMediaUrl('logo','logo-icon'):'company-icon.jpg')}}"
                     alt="{{$company->name}}">
                <h6>{{$company->name}}</h6>
                <p><i class="fa-solid fa-location-crosshairs"></i> {{$company->location->name}}</p>
                <hr>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-header p-3">
                <h5 style="font-size: 18px" class="w-100 ">Jobs Posted</h5>
            </div>
            <div class="card-body">
                <table id="role" class="display">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>DATE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Social Media Manager</td>
                            <td>Feb 20, 2022</td>
                            <td>Active</td>
                            <td>
                                <div class="dropdown">
                                    <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false" style="cursor: pointer">Action</h5>
                                    <ul class="dropdown-menu" aria-labelledby="roleButton">
                                        <li><a class="dropdown-item" href="{{route('companies.show',$company->slug)}}">View</a> </li>
                                        @can('Edit-model')
                                            <li><a class="dropdown-item" href="{{route('companies.edit',  $company->id) }}">Edit</a>
                                            </li>
                                            <li>
                                                <form action="{{route('companies.destroy',$company->id)}}"
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

                    </tbody>
                    <tfoot>
                    <tr>
                    <tr>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>DATE</th>
                        <th>STATUs</th>
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
            $('#role').DataTable();
        } );
    </script>
@endsection
