@extends('layouts.app')
@section('title', $page->title)
@section('meta_keyword', $page->meta_keyword)
@section('meta_description', $page->meta_description)
@section('image', url($page->image))
@section('content')
@include('layouts.inc.frontend.header')
<div class="container my-3">
    <div class="col-md-8 mx-auto">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="p-3">
                    <h3>{{$page->title}}</h3>
                    {!!$page->content!!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection