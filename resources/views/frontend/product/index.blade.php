@extends('layouts.app')
@include('layouts.inc.frontend.header')
@section('title', 'Product Aplikasi Web')
@section('content')

<div class="container my-5 col-md-8 mx-auto pt-5">

    <div class="row">
        @if(session('success'))
        <div class="col-md-12">
            <div class="alert alert-success d-flex justify-content-between align-items-start">
                {{session('success')}}
                <a href="{{url('cart')}}" class="btn btn-success">View Cart</a>
            </div>
        </div>
        @endif
        @forelse($products as $item)
        <div class="col-md-4">
            <a href="{{url('item/'.$item->slug)}}">
                <div class="card rounded mb-3 border-0 shadow-sm">
                    <div class="card-img-cover">
                        <div class="card-img-frame">
                            <img src="{{asset($item->image_cover)}}" class="card-img-top rounded-bottom-0"
                                alt="{{$item->name}}">
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{url('item/'.$item->slug)}}" class="text-muted text-decoration-none">
                            <h6>{{$item->name}}</h6>
                        </a>
                        {{-- <h5>IDR {{number_format($item->price,0)}}</h5> --}}
                    </div>
                    <div class="card-footer bg-white border-0">
                        <div class="row">
                            <div class="col-6 col-md-6 d-grid gap-2">
                                <a href="{{ url('subscription/'.$item->uuid) }}"
                                    class="btn btn-outline-success text-center" role="button"> <i
                                        class='bx bx-shopping-bag'></i> Beli</a>

                            </div>
                            <div class="col-6 col-md-6 d-grid gap-2">
                                <a href="{{ $item->link_demo }}" class="btn btn-primary text-center" role="button"> <i
                                        class='bx bx-copy-alt'></i> Preview</a>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @empty
        <div class="h-100">
            <div class="col-md-8 mx-auto my-auto">
                <div class="card text-center">
                    <div class="card-body">
                        <div class="my-auto">No Products Available</div>
                    </div>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</div>

@endsection