@extends('layouts.app')
@section('title', 'Graha Studio')
@section('content')

<section class="" style="background: radial-gradient(ellipse at bottom, #2b3d51 0%, #090a0f 100%);">
    <span class="star-height">
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>
    </span>

    <div class="container py-5 col-md-9 mx-auto">
        @foreach($sliders as $key => $slider)


        <div class="row align-items-center g-5 py-5">

            <div class="col-md-6">
                <h1 class="display-5 fw-bold mb-3 ls-sm text-white">
                    <span class="text-info">{{$slider->title}}</span>
                </h1>
                <p class="lead text-white">{{$slider->description}}.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="https://wa.me/{{$option_nav->whatsapp}}"
                        class="btn btn-info btn-lg px-4 me-md-2 text-white">Minta
                        Penawaran</a>
                </div>
            </div>

            <div class="col-md-6 hero-image">
                <img src="{{asset($slider->image)}}" class="d-block mx-lg-auto img-fluid" loading="lazy">
            </div>
        </div>

        @endforeach

    </div>
</section>


<section class="py-5 my-5">
    <div class="container col-md-9 mx-auto">
        <div class="col-md-8 mx-auto">
            <div class="text-center">
                <h1 class="display-5 fw-bold mb-3 ls-sm ">
                    <span class="text-primary">Keunggulan</span> Layanan
                </h1>
                <p class="lead mb-5">
                    Kemi menghadirkan layanan terbaik dengan mempermudah pelanggan untuk memiliki website profesional
                </p>
            </div>
        </div>

        <div class="row">
            @foreach($services as $key => $data)
            <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="card shadow border-0 mb-3">
                    <div class="card-body">
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 mb-3 p-3 rounded">
                            {!!$data->icon!!}
                        </div>
                        <h4>
                            {{$data->name}}
                        </h4>
                        <p class="text-muted mb-6 mb-md-0">
                            {{$data->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <div class="text-center mt-5">
            <a href="https://wa.me/6281233335523" class="btn btn-success btn-lg px-3"><i class='bx bxl-whatsapp'></i>
                Hubungi Kami</a>
        </div>
    </div>
</section>

<section class="bg-light" id="features">
    <div class="container my-5">
        <div class="row gx-5">
            <div class="col-lg-3 mb-5 mb-lg-0">
                <h1 class="display-5 fw-bold mb-3 ls-sm ">
                    <span class="text-primary">Aplikasi Website</span> Siap Pakai
                </h1>
                <p class="lead">
                    Aplikasi siap Pakai sesuai Kebutuhan jenis bisnis Anda. Lihat detail aplikasi
                </p>
                <a href="https://grahastudio.com/grahastudio/product" class="btn btn-primary">Lihat Semua</a>
            </div>
            <div class="col-lg-9">
                <div class="row g-4 row-cols-1 row-cols-lg-3">
                    @forelse($products as $item)
                    <div class="col-md-3">
                        <a href="{{url('item/'.$item->slug)}}">
                            <div class="card rounded mb-3 border-0 shadow-sm">
                                <div class="card-img-cover">
                                    <div class="card-img-frame">
                                        <img src="{{asset($item->image_cover)}}" class="card-img-top rounded-bottom-0"
                                            alt="{{$item->name}}">
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{url('item/'.$item->slug)}}" class="text-muted text-decoration-none">
                                        <h6>{{$item->name}}</h6>
                                    </a>
                                    {{-- <h5>IDR {{number_format($item->price,0)}}</h5> --}}
                                </div>
                                <div class="card-footer bg-white border-0">
                                    <div class="row">
                                        <div class="col-6 col-md-6 d-grid gap-2">
                                            <a href="{{ url('subscription/'.$item->uuid) }}"
                                                class="btn btn-outline-success text-center" role="button"> <i
                                                    class='bx bx-shopping-bag'></i> Beli</a>

                                        </div>
                                        <div class="col-6 col-md-6 d-grid gap-2">
                                            <a href="{{ $item->link_demo }}" class="btn btn-primary text-center"
                                                role="button"> <i class='bx bx-copy-alt'></i> Preview</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="h-100">
                        <div class="col-md-8 mx-auto my-auto">
                            <div class="card text-center">
                                <div class="card-body">
                                    <div class="my-auto">No Products Available</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white py-5">
    <div class="container col-md-8 mx-auto">
        <div class="row">
            <div class="col-md-7" data-aos="fade-right">
                <h2>
                    <h1 class="display-3 fw-bold mb-3 ls-sm ">
                        <span class="text-primary">Web App</span> Development
                    </h1>
                </h2>
                <p class="fs-lg text-muted mb-6">
                    Kami membuat Aplikasi Website menggunakan Framework yang populer dan juga menggunakan fraamwork
                    yaang mudah di pelaajari
                </p>
                <div class="d-flex mb-3">
                    <div class="icon text-primary fs-1">
                        <i class='bx bx-cheese'></i>
                    </div>
                    <div class="ms-5">
                        <h4 class="mb-1">
                            Custom Website
                        </h4>
                        <p class="text-muted mb-6">
                            Anda sudah punya website tapi sulit untuk menambah fitur atau mengubah tampilannya, kami
                            membuat website yang sudah bisa di custom atau menambah fitur sesuai kebutuhan.
                        </p>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <div class="icon text-primary fs-1">
                        <i class='bx bx-coffee'></i>
                    </div>
                    <div class="ms-5">
                        <h4 class="mb-1">
                            Source Aplikasi Web Siap Pakai
                        </h4>
                        <p class="text-muted mb-6 mb-md-0">
                            Kami menyediakan Website yang sudah bisa di gunakan dimana anda tidak perlu menunggu lama,
                            selain itu harga juga lebih terjangkau dan bisa request fitur tambahan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <img src="{{asset('uploads/slider/travel.jpg')}}" class="screenshot img-fluid img-skewed-item"
                    alt="...">
            </div>
        </div>
    </div>
</section>


<section class="my-5">
    <div class="col-md-8 mx-auto">

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
                        Apa itu Graha Studio?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <p>
                            Graha Studio adalah layanan jasa pembuatan website Instant tanpa ribet ngoding dan setup,
                            semua
                            sudah satu paket sekali bayar. Harga murah dan banyak pilihan jenis website sesuai bisnis
                            yang
                            kamu jalankan
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
                            href="https://wa.me/{{$option_nav->whatsapp}}">Chat Whatsapp</a>
                    </div>
                </div>
            </div>
        </div>

    </div>



    {{-- <section class="py-5 my-5">
        <div class="hero-img">
            <div class="container px-4 px-lg-0 col-md-8 mx-auto">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="mb-4 text-center text-xl-start px-md-8 px-lg-19 px-xl-0">
                            <h1 class="display-3 fw-bold mb-3 ls-sm ">
                                <span class="text-primary">Motion Graphic</span>, Video Editing
                            </h1>
                            <p class="mb-6 lead pe-lg-6">
                                Layanan Jasa Pembuatan Video Animasi Motion Graphic untuk profil perusahaan, kami juga
                                melayani shooting video dan editing video untuk vlog dan lainnya
                            </p>
                            <a href="https://bit.ly/geeksui" class="btn btn-dark" target="_blank" title="Buy Geeks"><i
                                    class="bi bi-cart-check-fill me-2"></i>Minta Penawaran</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <iframe width="560" height="315"
                                src="https://www.youtube.com/embed/6nWVwqkMf3E?si=jSEsDBBjCFjEkznj&amp;controls=0"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}



    {{-- <section class="py-3 py-md-5 bg-white">
        <div class="container col-md-8 mx-auto">
            <div class="col-md-8 mx-auto text-center">
                <h1 class="display-3 fw-bold mb-3 ls-sm ">
                    <span class="text-primary">Artikel</span> dan Informasi
                </h1>
                <p class="mb-6 lead pe-lg-6">
                    Berita dan Informasi Teknologi
                </p>
            </div>
        </div>

        <div class="container overflow-hidden col-md-8 mx-auto">
            <div class="row gy-4 gy-lg-0">
                <div class="col-12 col-lg-4">
                    <article>
                        <div class="card border-0">
                            <figure class="card-img-top m-0 overflow-hidden bsb-overlay-hover">
                                <a href="#!">
                                    <img class="img-fluid bsb-scale bsb-hover-scale-up" loading="lazy"
                                        src="http://localhost:8000/uploads/products/1693588999.jpg" alt="">
                                </a>

                            </figure>
                            <div class="card-body border bg-white p-4">
                                <div class="entry-header mb-3">
                                    <ul class="entry-meta list-unstyled d-flex mb-2">
                                        <li>
                                            <a class="link-primary text-decoration-none" href="#!">Business</a>
                                        </li>
                                    </ul>
                                    <h2 class="card-title entry-title h4 mb-0">
                                        <a class="link-dark text-decoration-none" href="#!">Overcoming Challenges to
                                            Make a
                                            Living Online</a>
                                    </h2>
                                </div>

                            </div>
                            <div class="card-footer border border-top-0 bg-white p-4">
                                <ul class="entry-meta list-unstyled d-flex align-items-center m-0">
                                    <li class="me-5">
                                        <i class='bx bx-calendar-alt'></i>
                                        <span class="ms-2 fs-7">7 Feb 2023</span>

                                    </li>
                                    <li>
                                        <i class='bx bx-comment'></i>
                                        <span class="ms-2 fs-7">55</span>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </section> --}}

    @endsection