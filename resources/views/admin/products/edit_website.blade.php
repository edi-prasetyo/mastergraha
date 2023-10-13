@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    @if(session('message'))
    <div class="alert alert-danger">{{session('message')}}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-warning">
        @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
        @endforeach
    </div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    {{$product->name}}
                </div>
                <div class="card-body">
                    <form action="{{url('admin/products/update_website/' .$website->id)}}" method="POST">
                        @method('put')
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">

                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Paket</label>
                                <select class="form-select" aria-label="Default select example" name="name">
                                    <option selected>Pilih Paket</option>
                                    <option value="basic" {{$website->name == 'basic' ? 'selected' : ''}}>Basic</option>
                                    <option value="advance" {{$website->name == 'advance' ? 'selected' : ''}}>Advance
                                    </option>
                                    <option value="ultimate" {{$website->name == 'ultimate' ? 'selected' : ''}}>Ultimate
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">periode</label>
                                <select class="form-select" aria-label="Default select example" name="period">
                                    <option selected>Pilih Periode</option>
                                    <option value="bulan" {{$website->period == 'bulan' ? 'selected' : ''}}>Bulan
                                    </option>
                                    <option value="tahun" {{$website->period == 'tahun' ? 'selected' : ''}}>Tahun
                                    </option>
                                    <option value="lifetime" {{$website->period == 'lifetime' ? 'selected' :
                                        ''}}>Lifetime</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control" name="price" value="{{$website->price}}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <label class="form-check-label">Best Seller?</label>
                                <input class="form-check-input" type="checkbox" name="best_seller"
                                    {{$website->best_seller ==
                                '1'
                                ? 'checked':''}}>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Fasilitas</label>
                            <textarea name="facility" id="summernote2"
                                class="form-control @error('facility') is-invalid @enderror">{{$website->facility}}</textarea>
                            @error('facility')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="summernote"
                                class="form-control @error('description') is-invalid @enderror">{{$website->description}}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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
       
    $('#summernote2').summernote({
            tabsize: 2
            , height: 130,

            tooltip: false
        });
       
</script>

@endsection