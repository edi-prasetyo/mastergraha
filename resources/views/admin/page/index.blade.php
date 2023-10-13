@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header bg-white d-flex justify-content-between align-items-start">
            <h4 class="my-auto">Pages</h4>
            <a href="{{ url('admin/pages/create') }}" class="btn btn-success text-white">Add Page</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th>title</th>
                        <th>Image</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pages as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->title}}</td>
                        <td><img width="20%" class="img-fluid" src="{{asset($data->image)}}"> </td>
                        <td>
                            <a href="{{url('admin/pages/edit/' .$data->id)}}"
                                class="btn btn-sm btn-primary text-white">Edit</a>
                            @include('admin.page.delete')
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">No Slider Available </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
        <div class="card-body">

        </div>
    </div>
</div>
@endsection