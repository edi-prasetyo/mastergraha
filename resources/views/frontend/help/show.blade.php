@extends('layouts.app')
@include('layouts.inc.frontend.header')
@section('title', 'Product Aplikasi Web')
@section('content')

<div class="container my-5 col-md-8 mx-auto">
    @include('frontend.help.searchbar')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2> {{$help->title}}</h2>
                    {!!$help->content!!}
                </div>
            </div>
        </div>
        <div class="col-md-4">

        </div>
    </div>
</div>
@endsection