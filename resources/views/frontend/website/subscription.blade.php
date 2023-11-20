@extends('layouts.app')
@section('title', 'Pilih layanan berlangganan')
@section('content')


<section class="py-5" style="background: linear-gradient(to right, rgb(1, 22, 56), rgb(3, 69, 141));">

    <div class="star-height">
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>

        <div class="container col-md-9 mx-auto pt-5">
            <div class="">
                <div class="row py-5">
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bold mb-3 ls-sm text-white">
                            <span class="text-warning">{{$productDetail->name}}</span>
                        </h1>
                        <p class="lead text-white">{{$productDetail->meta_description}}</p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-start mt-5">
                            <a href="{{url('item/' .$productDetail->slug)}}"
                                class="btn btn-warning btn-lg px-4 me-md-2">Detail Aplikasi</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset($productDetail->image_cover)}}" class="d-block mx-lg-auto img-fluid rounded"
                            loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">

    <section>
        <div class="col-md-9 mx-auto pricing">
            <div class="row mb-3 ">
                @foreach($websites as $key => $web)
                <div class="col-md-4">
                    <div
                        class="card mb-4 rounded-3 shadow-sm @if($web->best_seller == 1) {{'bg-primary text-white'}}@endif">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">{{$web->name}}</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-title pricing-card-title"><span class="fs-3 fw-bold"> Rp.
                                    {{number_format($web->price)}}</span>
                                <small class="fw-light fs-5">/{{$web->period}}</small>
                            </div>
                            <p>{!!$web->facility!!}</p>
                            <a href="{{url('subscription/order/' .$web->uuid)}}"
                                class="w-100 btn btn-lg btn-primary  @if($web->best_seller == 1) {{'btn-warning'}}@endif">Order</a>
                            <button type="button" class="w-100 btn btn-info text-white mt-3" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                keterangan
                            </button>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-muted">
                                            {!!$web->description!!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section>
        <div class="col-md-6 mx-auto text-center my-5">
            <h1 class="display-5 fw-bold mb-3 ls-sm ">
                <span class="text-primary">Benefit Memiliki</span> Website sendiri
            </h1>
        </div>
        <div class="col-md-9 mx-auto">
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4> Brand Identity</h4>
                            <p class="text-muted">
                                Brand Identity sangat penting dalam sebuah perusahaan, Biasanya perusahan memiliki
                                system
                                website sendiri untuk memperkenalkan produk dan jasa mereka.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4> Profile Usaha</h4>
                            <p class="text-muted">
                                Website menjadi salah satu icon untuk mengenalkan produk kepada klien, dengan website
                                klien
                                lebih mudah mencari informasi tentang usaha anda.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body mb-3">
                            <h4> System Operasional</h4>
                            <p class="text-muted">
                                Website juga mampu membantu dalam pengelolaan operasional perusahaan seperti,
                                pengelolaan
                                stok barang, pengelolaan booking online, pengelolaan data customer dll.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






</div>

@endsection