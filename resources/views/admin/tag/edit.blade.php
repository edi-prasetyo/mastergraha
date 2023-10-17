@extends('layouts.admin')

@section('content')
@if(session('message'))
<div class="alert alert-danger">
    {{session('message')}}
</div>
@endif
<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-white">
            <h4>Edit Bank</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{url('admin/tags/'. $tag->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>

                        <input type="text" name="name" value="{{$tag->name}}" class="form-control">
                        @error('name') <small>
                            <div class="text-danger">{{$message}}</div>
                        </small> @enderror
                    </div>


                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection