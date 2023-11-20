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
            <h4 class="my-auto">Help Center</h4>
            <a href="{{url('admin/helps/create')}}" class="btn btn-success">Add Help</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($helps as $data)
                    <tr>
                        <td>{{$data->name}}</td>

                        <td>
                            <a href="{{url('admin/helps/show/' .$data->id)}}"
                                class="btn btn-sm btn-primary text-white">Help Item</a>
                            <a href="{{url('admin/helps/edit/' .$data->id)}}"
                                class="btn btn-sm btn-primary text-white">Edit</a>
                            @include('admin.help.delete')
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="col-md-12 mt-5">
        {{$helps->links()}}
    </div>
</div>
@endsection