@extends('layouts.app')
@include('layouts.inc.frontend.header')
@section('title', 'Product Aplikasi Web')
@section('content')

<div class="container my-5 col-md-8 mx-auto">
    @include('frontend.help.searchbar')
    @foreach($helpItems as $item)
    <i class='bx bx-right-arrow-alt fs-5 me-2'></i> <a href="{{url('helps/'.$item->slug)}}"
        class="text-decoration-none text-muted">
        {{$item->title}} </a>

    @endforeach
</div>

@endsection