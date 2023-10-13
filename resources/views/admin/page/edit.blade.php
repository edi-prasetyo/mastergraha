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
            <h4>Edit Slider</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{url('admin/pages/'.$page->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{$page->title}}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea id="summernote" name="content"
                            class="form-control @error('content') is-invalid @enderror">{{$page->content}}</textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                        <div class="col-md-4 my-3">
                            <img class="img-fluid" src="{{asset($page->image)}}">
                        </div>

                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">meta Title</label>
                        <input type="text" name="meta_title"
                            class="form-control @error('meta_title') is-invalid @enderror"
                            value="{{$page->meta_title}}">
                        @error('meta_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">meta description </label>
                            <textarea name="meta_description"
                                class="form-control @error('meta_description') is-invalid @enderror">{{$page->meta_description}}</textarea>
                            @error('meta_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">meta keyword</label>
                            <textarea name="meta_keywords"
                                class="form-control @error('meta_keywords') is-invalid @enderror">{{$page->meta_keywords}}</textarea>
                            @error('meta_keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
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

@section('scripts')

<script>
    $('#summernote').summernote({
            tabsize: 2
            , height: 230,

            tooltip: false
        });
</script>

@endsection