@extends('layouts.app')

@section('content')
@include('layouts.inc.frontend.header')
<div class="col-md-12">
    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    <div class="container">

        <div class="row">
            <div class="col-md-3">
                @include('frontend.member.sidebar')
            </div>
            <div class="col-md-9">



                <div class="card border-0 shadow-sm">
                    <div class="table-responsive text-nowrap">
                        <table class="table text-nowrap">
                            <thead>
                                <tr>
                                    <th>Aplikasi</th>
                                    <th>Expired</th>
                                    <th>Lisensi</th>
                                    <th>Domain</th>
                                    <th>status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">

                                @forelse ($subscriptions as $data)


                                @php
                                $expiry_date = $data->end_date;
                                $today = time();
                                $interval = strtotime($expiry_date) - $today;
                                $day = floor($interval / 86400); // 1 day

                                @endphp


                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="d-flex flex-column">
                                                <span class="fw-semibold lh-1">{{$data->product_name}}</span>
                                                <small class="text-muted">{{$data->website_name}}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>


                                        @if($day >= 0 && $day < 7) <span class="text-warning">
                                            {{$data->end_date}}</span>
                                            @elseif($day <=0) <span class="text-danger"> {{$data->end_date}}</span>
                                                @else
                                                <span class="text-dark"> {{$data->end_date}}</span>
                                                @endif



                                    </td>
                                    <td>
                                        {{$data->website_name}}
                                    </td>
                                    <td>
                                        {{$data->domain_name}}
                                    </td>
                                    <td>
                                        @if($day >= 0 && $day < 7) <span class="badge bg-label-warning"> pending</span>

                                            @elseif($day <=0) <span class="badge bg-label-danger">{{'inactive'}}</span>
                                                @else <span class="badge bg-label-success">{{'active'}}</span> @endif
                                    </td>

                                    <td>

                                        @if($day >= 0 && $day < 7) <a href="{{url('orders/renewal/'. $data->uuid)}}"
                                            class="btn btn-label-primary btn-sm">
                                            <span class="tf-icons bx bx-pie-chart-alt me-1"></span> Renewal
                                            </a>
                                            @elseif($day <=0) {{'Expired'}} @else {{''}} @endif <a
                                                href="https://{{$data->domain_name}}" class="btn btn-success btn-sm"> <i
                                                    class='bx bx-link-external'></i> Access
                                                Web</a>

                                    </td>
                                </tr>
                                @empty
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-12 my-3">
            {{$subscriptions->links()}}
        </div>
    </div>
</div>
@endsection