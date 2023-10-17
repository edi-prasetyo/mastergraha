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
            <h4 class="my-auto">Service</h4>
            <a href="{{url('admin/services/create')}}" class="btn btn-success text-white">Add Services</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="5%">ID</th>
                        <th scope="col">icon</th>
                        <th scope="col">Name</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->icon}} </td>
                        <td>{{$data->name}}</td>

                        <td>
                            <a href="{{url('admin/service/edit/' .$data->id)}}"
                                class="btn btn-sm btn-primary text-white">Edit</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    <div class="col-md-12 mt-5">
        {{$services->links()}}
    </div>
</div>
@endsection