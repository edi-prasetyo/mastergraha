@extends('layouts.admin')

@section('content')
@if(session('message'))
<div class="alert alert-danger">
    {{session('message')}}
</div>
@endif

<div class="col-md-12">
    <div class="card">
        @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif
        <div class="card-header bg-white">
            <h4>Create Slider</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <form action="{{url('admin/pages/create')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Content</label>
                        <textarea id="summernote" name="content"
                            class="form-control @error('content') is-invalid @enderror"></textarea>
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">meta Title</label>
                        <input type="text" name="meta_title"
                            class="form-control @error('meta_title') is-invalid @enderror">
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
                                class="form-control @error('meta_description') is-invalid @enderror"></textarea>
                            @error('meta_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">meta keyword</label>
                            <textarea name="meta_keywords"
                                class="form-control @error('meta_keywords') is-invalid @enderror"></textarea>
                            @error('meta_keywords')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Save</button>
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