@extends('layouts.admin')
@section('content')
<div class="col-md-12">
    @if(session('message'))
    <div class="alert alert-danger">{{session('message')}}</div>
    @endif
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white">
                    Buat Paket Baru
                </div>
                <div class="card-body">

                    <form action="{{url('admin/products/add_website')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$product->id}}">

                        <div class="row">
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Paket</label>
                                <select class="form-select" aria-label="Default select example" name="name">
                                    <option selected>Open this select menu</option>
                                    <option value="basic">Basic</option>
                                    <option value="advance">Advance</option>
                                    <option value="ultimate">Ultimate</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-3">
                                <label class="form-label">Paket</label>
                                <select class="form-select" aria-label="Default select example" name="period">
                                    <option selected>Open this select menu</option>
                                    <option value="bulan">Bulan</option>
                                    <option value="tahun">Tahun</option>
                                    <option value="lifetime">Lifetime</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Harga</label>
                                <input type="text" class="form-control" name="price">
                            </div>

                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <label class="form-check-label">Best Seller?</label>
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="flexSwitchCheckDefault" name="best_seller">
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label class="form-label">Fasilitas</label>
                            <textarea name="facility" id="summernote2"
                                class="form-control @error('facility') is-invalid @enderror"></textarea>
                            @error('facility')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" id="summernote"
                                class="form-control @error('description') is-invalid @enderror"></textarea>
                            @error('description')
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
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    Website
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($websites as $key => $web)
                        <tr>
                            <td>{{$web->name}}</td>
                            <td>{{number_format($web->price)}}</td>
                            <td>
                                <a href="{{url('admin/products/edit_website/' .$web->id)}}" class="text-success"><i
                                        class="feather-edit mr-3  fa-fw"></i></a>
                                <a href="{{url('admin/products/delete_website/' .$web->id)}}" class="text-danger"><i
                                        class="feather-trash mr-3  fa-fw"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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