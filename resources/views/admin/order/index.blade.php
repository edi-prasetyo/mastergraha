@extends('layouts.admin')

@section('content')
<div class="col-md-12">
    @if(session('message'))
    <div class="col-md-12">
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between align-items-start">
            <h4 class="my-auto">Data Orders</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Invoice</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Phone</th>
                        <th scope="col">email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Amount</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $data)
                    <tr>
                        <td>{{$data->invoice_number}}</td>
                        <td>{{$data->customer_name}}</td>
                        <td>{{$data->customer_phone}}</td>
                        <td>{{$data->customer_email}}</td>
                        <td>{{$data->order_type}}</td>
                        <td>
                            @if($data->payment_status == 1)
                            <i class="fa-solid fa-circle text-success" style="font-size: 7px;"></i> <span
                                class="text-success">Paid</span>
                            @else
                            <i class="fa-solid fa-circle text-danger my-auto" style="font-size: 7px;"></i> <span
                                class="text-danger">Unpaid</span>
                            @endif
                        </td>

                        <td>Rp. {{number_format($data->total_amount)}}</td>
                        <td>
                            <a class="btn btn-success" href="{{url('admin/orders/' .$data->id)}}"> View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="col-md-12 mt-5">
        {{$orders->links()}}
    </div>
</div>
@endsection