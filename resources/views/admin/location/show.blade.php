@extends('layouts.admin')
@section('title', $location->name)
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
<section class="p-5">
    <h3>Jobs in {{$location->name}}</h3>
    <hr>
    <div class="card mt-5 shadow-sm">
        <div class="card-header">
            <h5>All Jobs</h5>
        </div>
        <div class="card-body">
            <table id="table_id4" class="display">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>CREATED ON</th>
                    <th>STATUS</th>
                    <th>COMPANY</th>
                </tr>
                </thead>
                <tbody>
                @foreach($location->jobs as $job)
                    <tr>
                        <td>{{$job->id}}</td>
                        <td>{{$job->title}}</td>
                        <td>{{$job->created_at->diffForHumans()}}</td>
                        <td>
                           {{$job->status->name}}
                        </td>
                        <td>{{$job->company->name}}</td>

                @endforeach
                </tbody>
                <tfoot>

                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>CREATED ON</th>
                    <th>STATUS</th>
                    <th>COMPANY</th>
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
