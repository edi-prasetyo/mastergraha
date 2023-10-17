@extends('layouts.app')
@section('title', 'Pilih layanan berlangganan')
@section('content')


<section class="mt-5 py-5" style="background: radial-gradient(ellipse at bottom, #2b3d51 0%, #090a0f 100%);">

    {{-- <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div> --}}


    <div class="container col-md-9 mx-auto">
        <div class="">
            <div class="row py-5">
                <div class="col-md-6">
                    <h1 class="display-5 fw-bold mb-3 ls-sm text-white">
                        <span class="text-warning">{{$productDetail->name}}</span>
                    </h1>
                    <p class="lead text-white">{{$productDetail->meta_description}}</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
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
                            <div class="card-title pricing-card-title"><span class="fs-1 fw-bold"> Rp.
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




    <div class="col-md-9 mx-auto mb-5">

        <div class="col-md-6 mx-auto text-center my-5">
            <h1 class="display-5 fw-bold mb-3 ls-sm ">
                <span class="text-primary">Pertanyaan</span> Umum
            </h1>
        </div>
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Apa Perbedaan Single Licensi dan Full Lisensi?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>
                            <strong>Single Lisensi.</strong> Adalah layanan website yang hanya bisa diakses system web
                            saja yang meliputi admin dashboard, dan fronend website, anda tidak mendapatkan akses cpanel
                            hosting. dan juga tidak mendapatkan source codenya
                        </p>
                        <p>
                            <strong>Full Lisensi.</strong> Adalah lisensi secara keseluruhan dalam hal ini anda akan
                            mendapatkan semua kontrol atas website anda sendiri, mulai dari, akses cpanel hosting,
                            website admin dashboard, dan juga source code yang ada didalamnya, di utamakan anda harus
                            memiliki team it sendiri atau anda juga bisa menggunakan layanan maintanance dari kami jika
                            suatu saat ada trouble pada website anda.
                        </p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Berapa Lama Sampai Website saya Online?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Untuk Website Instan butuh Waktu sekitar 2-3 hari sudah bisa tayang, setelah melakukan
                        pembayaran tetapi jika anda merekuest fitur baru yang tidak ada di aplikasi maka akan
                        membutuhkan waktu lagi sesuai dengan tingkat kesulitan fitur yang akan di tambahkan
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Apakah ada Garansi jika terjadi error atau fitur yang tidak berfungsi?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        untuk Paket personal Lisensi, Kami memberikan Garansi perbaikan jika terjadi error pada website,
                        sedangkaan untuk paket full lisensi kami hanya memberikan free garansi selama 2 bulan setelah
                        website tayang, adapun error yang di sebabkan kelalaian pengguna ( pelanggan mengotak atik
                        source code dll) maka akan dikenakan biaya charge perbaikan.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Apakah Graha Studio memnyediakan Maintanance?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Ya, Kami menyediakan layanan Maintanance, untuk paket personal Lisensi Kami memberikan free
                        maintanance selama kontrak terus berjalan, kecuali penambahan fitur baru maka akan di kenakan
                        biaya tambahan sesuai dengan fitur yang dibuat. sedangkan untuk paket Full Lisensi kami juga
                        menyediakan jasa maintanance pertahun, dengan biaya disesuaikan.
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Bagaimana cara saya membeli produk ini?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Silahkan pilih salah satu tipe produk kemudian klik tombol Order, pastikan anda sudah login ke
                        akun grahastudio, jika belum punya akun silahkan daftar <a href="{{url('register')}}">
                            disini</a> kemudian cari nama domain yang tersedia, kalu proses order, setelah itu lakukan
                        pembayaran, maka website anda akan di proses 2-3 hari. Jika anda mengalami kesulitan silahkan
                        hubungi kami melalui Whatsapp <a class="btn btn-success"
                            href="https://wa.me/{{$option->whatsapp}}">Chat Whatsapp</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>

@endsection