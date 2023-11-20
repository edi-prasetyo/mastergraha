@extends('layouts.admin')

@section('content')

<div class="col-md-12">
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-white">
                    <h3 class="text-muted"><i class="feather-grid mr-3 fa-fw"></i> {{$help->name}}</h3>
                    <h4>Create Help Items</h4>
                </div>
                <div class="card-body">

                    <form action="{{url('admin/helps/add-item')}}" method="POST">
                        @csrf
                        <input type="hidden" name="help_id" value="{{$help->id}}">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <label class="form-check-label">Status</label>
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="flexSwitchCheckDefault" name="status" checked>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Desc</label>
                            <textarea name="content" id="summernote"
                                class="form-control @error('content') is-invalid @enderror"></textarea>
                            @error('content')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" name="meta_title"
                                        class="form-control @error('meta_title') is-invalid @enderror">
                                    @error('meta_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Meta Keyword</label>
                                    <input type="text" name="meta_keyword"
                                        class="form-control @error('meta_keyword') is-invalid @enderror">
                                    @error('meta_keyword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description"
                                class="form-control @error('meta_description') is-invalid @enderror"></textarea>
                            @error('meta_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>


                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-white">
                    Help Items
                </div>
                <div class="card-body">
                    @if(session('message'))
                    <div class="alert alert-success">
                        {{session('message')}}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th width="25%" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($helpItems as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>
                                    <a href="" class="btn btn-success btn-sm"><i
                                            class="feather-edit mr-3 fa-fw"></i></a>
                                    <a href="" class="btn btn-danger btn-sm"><i
                                            class="feather-trash mr-3 fa-fw"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $('#summernote').summernote({
            tabsize: 2
            , height: 230,

            tooltip: false
        });
       
</script>

@endsection