@extends('layouts.admin')
@section('title','Advertising Programme')
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
                        <h5 style="font-size: 18px" class="w-100 ">Adverts-({{$adverts->count()}})
                        <a href="{{route('adverts.create')}}" class="float-end">Create Advert</a> </h5>
                    </div>
                    <div class="card-body">
                        <table id="role" class="display">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>BANNER</th>
                                <th>STATUS</th>
                                <th>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($adverts as $advert)
                                <tr>
                                    <td>{{$advert->id}}</td>
                                    <td>{{$advert->name}}</td>
                                    <td><a href="{{$advert->link}}" target="_blank">
                                        <img src="{{asset($advert->getFirstMediaUrl('banner')
                                        ?$advert->getFirstMediaUrl('banner'):'images/user-icon.jpg')}}"
                                        alt="{{$advert->name}}" style="width: 250px" class="float-start me-2"></td>
                                    </a>
                                    <td>
                                        @if ($advert->status==1)
                                        <span class="text-success">active</span>
                                        @else
                                        <span class="text-danger">disabled</span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="dropdown">
                                            <h5 id="roleButton" class="dropdown-toggle fw-bold fs-6"
                                                data-bs-toggle="dropdown"
                                                aria-expanded="false" style="cursor: pointer">Action</h5>
                                            <ul class="dropdown-menu" aria-labelledby="roleButton">

                                                @can('Edit-model')
                                                <li><a class="dropdown-item" href="{{route('adverts.edit',  $advert->id) }}">Edit</a>
                                                </li>
                                                <li>
                                                    <form action="{{route('adverts.destroy',$advert->id)}}"
                                                          method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            delete
                                                        </button>
                                                    </form>
                                                </li>
                                                <li>
                                                    @if ($advert->status==1)
                                                    <form action="{{route('ads-disable',$advert->id)}}"
                                                        method="POST">
                                                      @method('PATCH')
                                                      @csrf
                                                      <input type="hidden" name="status" value="0">
                                                      <button type="submit" class="dropdown-item text-danger">
                                                          disable
                                                      </button>
                                                  </form>
                                                    @else
                                                    <form action="{{route('ads-disable',$advert->id)}}"
                                                        method="POST">
                                                      @method('PATCH')
                                                      @csrf
                                                      <input type="hidden" name="status" value="1">
                                                      <button type="submit" class="dropdown-item text-success">
                                                          enable
                                                      </button>
                                                  </form>
                                                    @endif
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
                                <th>BANNER</th>
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
