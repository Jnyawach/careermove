@extends('layouts.admin')
@section('title','Mpesa payments')
@section('styles')
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    <section class="p-5">
        @include('includes.status')
        <h1 class="fs-4">Mpesa Payments</h1>
        <hr>
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header p-3">
                        <h5 style="font-size: 18px" class="w-100 ">Payments</h5>
                    </div>
                    <div class="card-body">
                        <table id="role" class="display">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>CODE</th>
                                <th>CELLPHONE</th>
                                <th>DATE</th>
                                <th>AMOUNT</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id}}</td>
                                    <td>{{$payment->mpesa_receipt_number}}</td>
                                    <td>{{$payment->phone_number}}</td>
                                    <td>{{\Carbon\Carbon::parse($payment->transaction_date)->isoFormat('MMMM Do YYYY, h:mm:ss a')}}</td>

                                    <td>{{$payment->amount}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>CODE</th>
                                <th>CELLPHONE</th>
                                <th>DATE</th>
                                <th>AMOUNT</th>

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

