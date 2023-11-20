@extends('layouts.app')
@section('title', 'Graha Studio')
@section('content')

<section class="" style="background: radial-gradient(ellipse at bottom, #2b3d51 0%, #090a0f 100%);">
    <div class="star-height">
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>


        <div class="container py-5 col-md-9 mx-auto">
            @foreach($sliders as $key => $slider)


            <div class="row align-items-center g-5 py-5">

                <div class="col-md-6">
                    <h1 class="display-1 fw-bold mb-3">
                        <span class="text-info text-animation-color">{{$slider->title}}</span>
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
                <div class="card mb-3">
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

<section class="bg-white py-3" id="features">
    <div class="container my-5">
        <div class="col-md-7 mx-auto text-center col-md-8 mx-auto">
            <h1 class="display-5 fw-bold mb-3 ls-sm ">
                <span class="text-primary">Pilih Jenis</span> Aplikasi yang sesuai
            </h1>
            <p class="lead">
                Kami memiliki banyak jenis aplikasi website yang sesuai dengan bisnis proses anda, silahkan pilih yang
                sesuai dengan bisnis yang anda jalankan
            </p>
            <a href="https://grahastudio.com/grahastudio/product" class="btn btn-primary my-3">Lihat Semua</a>
        </div>

        <div class="col-md-9 mx-auto">
            <div class="row">
                @forelse($products as $item)
                <div class="col-md-4">
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
</section>

{{-- <section class="bg-white py-5">
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
</section> --}}

{{-- <section>
    <div class="container">
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
                            <div class="card-header border-0 bg-white d-flex align-items-start">
                                <div
                                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 p-2 rounded me-3">
                                    <i class='bx bx-trophy'></i>
                                </div>
                                <h4> Brand Identity</h4>
                            </div>

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
                            <div class="card-header border-0 bg-white d-flex align-items-start">
                                <div
                                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 p-2 rounded me-3">
                                    <i class='bx bx-store-alt'></i>
                                </div>
                                <h4> Profile Usaha</h4>
                            </div>

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
                            <div class="card-header border-0 bg-white d-flex align-items-start">
                                <div
                                    class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 p-2 rounded me-3">
                                    <i class='bx bx-shape-square'></i>
                                </div>
                                <h4> System </h4>
                            </div>
                            <p class="text-muted">
                                Website pengelolaan System operasional perusahaan seperti,
                                pengelolaan
                                stok barang, pengelolaan booking online dll.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-dark parallax py-5" style="background-image: url({{url('uploads/logo/bg-paralax-moon.jpg')}})">


    <div class="star-height">
        <div id='stars'></div>
        <div id='stars2'></div>
        <div id='stars3'></div>




        <div class="container">
            <div class="row justify-content-md-center ">
                <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
                    <h2 class="mb-4 display-5 text-center text-white">Layanan</h2>
                    <p class="text-secondary mb-5 text-center text-primary">We offer a wide range of services to help
                        tech
                        companies of
                        all sizes succeed. We specialize in market research, secure payments, and 24/7 support.</p>
                    <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                </div>
            </div>
        </div>

        <div class="container overflow-hidden">
            <div class="row gy-5 gx-md-5 justify-content-center">
                <div class="col-10 col-md-5 col-xl-4 overflow-hidden ">
                    <div class="row gy-4">
                        <div class="col-12 col-lg-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                class="bi bi-command text-primary" viewBox="0 0 16 16">
                                <path
                                    d="M3.5 2A1.5 1.5 0 0 1 5 3.5V5H3.5a1.5 1.5 0 1 1 0-3zM6 5V3.5A2.5 2.5 0 1 0 3.5 6H5v4H3.5A2.5 2.5 0 1 0 6 12.5V11h4v1.5a2.5 2.5 0 1 0 2.5-2.5H11V6h1.5A2.5 2.5 0 1 0 10 3.5V5H6zm4 1v4H6V6h4zm1-1V3.5A1.5 1.5 0 1 1 12.5 5H11zm0 6h1.5a1.5 1.5 0 1 1-1.5 1.5V11zm-6 0v1.5A1.5 1.5 0 1 1 3.5 11H5z" />
                            </svg>
                        </div>
                        <div class="col-12 col-lg-10">
                            <h4 class="mb-3 text-white">Market Research</h4>
                            <p class="mb-3 text-secondary">We can help you to understand your target market and identify
                                new
                                opportunities for growth. We offer a variety of market research services including
                                surveys.
                            </p>
                            <div>
                                <a href="#!" class="fw-bold text-decoration-none link-primary">
                                    Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-5 col-xl-4 overflow-hidden">
                    <div class="row gy-4">
                        <div class="col-12 col-lg-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                class="bi bi-laptop text-primary" viewBox="0 0 16 16">
                                <path
                                    d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z" />
                            </svg>
                        </div>
                        <div class="col-12 col-lg-10">
                            <h4 class="mb-3 text-white">Web Design</h4>
                            <p class="mb-3 text-secondary">We can help you to create a visually appealing website. We
                                take
                                into account your brand identity and target audience when designing your website.</p>
                            <div>
                                <a href="#!" class="fw-bold text-decoration-none link-primary">
                                    Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-5 col-xl-4 overflow-hidden">
                    <div class="row gy-4">
                        <div class="col-12 col-lg-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                class="bi bi-credit-card-2-front text-primary" viewBox="0 0 16 16">
                                <path
                                    d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z" />
                                <path
                                    d="M2 5.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1zm0 3a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </div>
                        <div class="col-12 col-lg-10">
                            <h4 class="mb-3 text-white">Secure Payments</h4>
                            <p class="mb-3 text-secondary">We offer a variety of secure payment solutions to help you
                                accept
                                payments. We also offer fraud protection to help protect your business from fraud.</p>
                            <div>
                                <a href="#!" class="fw-bold text-decoration-none link-primary">
                                    Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-5 col-xl-4 overflow-hidden">
                    <div class="row gy-4">
                        <div class="col-12 col-lg-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                class="bi bi-cup-hot text-primary" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M.5 6a.5.5 0 0 0-.488.608l1.652 7.434A2.5 2.5 0 0 0 4.104 16h5.792a2.5 2.5 0 0 0 2.44-1.958l.131-.59a3 3 0 0 0 1.3-5.854l.221-.99A.5.5 0 0 0 13.5 6H.5ZM13 12.5a2.01 2.01 0 0 1-.316-.025l.867-3.898A2.001 2.001 0 0 1 13 12.5ZM2.64 13.825 1.123 7h11.754l-1.517 6.825A1.5 1.5 0 0 1 9.896 15H4.104a1.5 1.5 0 0 1-1.464-1.175Z" />
                                <path
                                    d="m4.4.8-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 3.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 3.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 3 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 4.4.8Zm3 0-.003.004-.014.019a4.167 4.167 0 0 0-.204.31 2.327 2.327 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.31 3.31 0 0 1-.202.388 5.444 5.444 0 0 1-.253.382l-.018.025-.005.008-.002.002A.5.5 0 0 1 6.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 6.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 6 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 7.4.8Zm3 0-.003.004-.014.019a4.077 4.077 0 0 0-.204.31 2.337 2.337 0 0 0-.141.267c-.026.06-.034.092-.037.103v.004a.593.593 0 0 0 .091.248c.075.133.178.272.308.445l.01.012c.118.158.26.347.37.543.112.2.22.455.22.745 0 .188-.065.368-.119.494a3.198 3.198 0 0 1-.202.388 5.385 5.385 0 0 1-.252.382l-.019.025-.005.008-.002.002A.5.5 0 0 1 9.6 4.2l.003-.004.014-.019a4.149 4.149 0 0 0 .204-.31 2.06 2.06 0 0 0 .141-.267c.026-.06.034-.092.037-.103a.593.593 0 0 0-.09-.252A4.334 4.334 0 0 0 9.6 2.8l-.01-.012a5.099 5.099 0 0 1-.37-.543A1.53 1.53 0 0 1 9 1.5c0-.188.065-.368.119-.494.059-.138.134-.274.202-.388a5.446 5.446 0 0 1 .253-.382l.025-.035A.5.5 0 0 1 10.4.8Z" />
                            </svg>
                        </div>
                        <div class="col-12 col-lg-10">
                            <h4 class="mb-3 text-white">Daily Updates</h4>
                            <p class="mb-3 text-secondary">We provide our clients with daily updates on their business
                                performance. This includes data on website traffic, sales, blog posts, and other key
                                metrics.</p>
                            <div>
                                <a href="#!" class="fw-bold text-decoration-none link-primary">
                                    Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-5 col-xl-4 overflow-hidden">
                    <div class="row gy-4">
                        <div class="col-12 col-lg-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                class="bi bi-gear text-primary" viewBox="0 0 16 16">
                                <path
                                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z" />
                                <path
                                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z" />
                            </svg>
                        </div>
                        <div class="col-12 col-lg-10">
                            <h4 class="mb-3 text-white">Digital Marketing</h4>
                            <p class="mb-3 text-secondary">We can help you to promote your business online through a
                                variety
                                of digital marketing channels, including search engine optimization (SEO).</p>
                            <div>
                                <a href="#!" class="fw-bold text-decoration-none link-primary">
                                    Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-10 col-md-5 col-xl-4 overflow-hidden">
                    <div class="row gy-4">
                        <div class="col-12 col-lg-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor"
                                class="bi bi-telephone-inbound text-primary" viewBox="0 0 16 16">
                                <path
                                    d="M15.854.146a.5.5 0 0 1 0 .708L11.707 5H14.5a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 1 0v2.793L15.146.146a.5.5 0 0 1 .708 0zm-12.2 1.182a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                            </svg>
                        </div>
                        <div class="col-12 col-lg-10">
                            <h4 class="mb-3 text-white">24/7 Support</h4>
                            <p class="mb-3 text-secondary">We offer 24/7 support to our clients. This means that you can
                                always get help when you need it, no matter what time of day or night it is.</p>
                            <div>
                                <a href="#!" class="fw-bold text-decoration-none link-primary">
                                    Learn More
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div> --}}





    {{-- <div class="container">
        <div class="col-md-6 mx-auto text-center my-5">
            <h1 class="display-5 fw-bold mb-3 ls-sm ">
                <span class="text-primary">Langkah mudah</span> Pemesanan Website
            </h1>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="">
                <div class="alert alert-primary">
                    <h4>
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 p-2 rounded me-3">
                            <i class='bx bx-laptop'></i>
                        </div> Pilih Jenis Aplikasi website
                    </h4>
                    Pilih Jenis Website yang sesuai dengan bisnis yang kamu jalankan, kamu juga bisa melihat demo
                    websitenya, dan bahkan bisa masuk juga ke admin dashboardnya, jika sudah cocok, klik ORDER
                </div>

                <div class="alert alert-primary">
                    <h4>
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 p-2 rounded me-3">
                            <i class='bx bx-copy-alt'></i>
                        </div> Pilih Paket Berlangganan
                    </h4>
                    Pilih paket berlangganan, dengan menyesuaikan budget bisa digunakan kemudian klik tombol Order
                </div>
                <div class="alert alert-primary">
                    <h4>
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 p-2 rounded me-3">
                            <i class='bx bx-copy-alt'></i>
                        </div> Tentukan Nama Domain
                    </h4>
                    Cari Nama Domain untuk nama domain anda, tips mencari nama domain, Jika nama domain tidak tersedia
                    berarti nama tersebut sudah di gunakan orang lain, coba mengganti extensi lain misalnya .net, .org
                    .co.id, atau bisa juga mengubah nama lain, jika pencarian nama domain tersedia, silahkan pilih
                    durasi
                    berlangganan, min. durasi adalah 6 bulan, kemudian klik tombol proses order.
                </div>
                <div class="alert alert-primary">
                    <h4>
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 p-2 rounded me-3">
                            <i class='bx bx-credit-card'></i>
                        </div> Lakukan Pembayaran
                    </h4>
                    Jika order sudah jadi silahkan lakukan pembayaran bayar, kemudian lakukan konfirmasi pembayaran,
                    maka
                    website anda akan segera di proses dengan waktu sesuai paket yang anda pilih.
                </div>
            </div>
        </div>
    </div> --}}
</section>

<section class="my-5">
    <div class="container">
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
                                Graha Studio adalah layanan jasa pembuatan website Instant tanpa ribet ngoding dan
                                setup,
                                semua
                                sudah satu paket sekali bayar. Harga murah dan banyak pilihan jenis website sesuai
                                bisnis
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
                            untuk Paket personal Lisensi, Kami memberikan Garansi perbaikan jika terjadi error pada
                            website,
                            sedangkaan untuk paket full lisensi kami hanya memberikan free garansi selama 2 bulan
                            setelah
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
                            maintanance selama kontrak terus berjalan, kecuali penambahan fitur baru maka akan di
                            kenakan
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
                            Silahkan pilih salah satu tipe produk kemudian klik tombol Order, pastikan anda sudah login
                            ke
                            akun grahastudio, jika belum punya akun silahkan daftar <a href="{{url('register')}}">
                                disini</a> kemudian cari nama domain yang tersedia, kalu proses order, setelah itu
                            lakukan
                            pembayaran, maka website anda akan di proses 2-3 hari. Jika anda mengalami kesulitan
                            silahkan
                            hubungi kami melalui Whatsapp <a class="btn btn-success"
                                href="https://wa.me/{{$option_nav->whatsapp}}">Chat Whatsapp</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="my-5">
    <div class="container">
        <div class="col-md-10 mx-auto">
            <div class="col-md-6 mx-auto text-center my-5">
                <h1 class="display-5 fw-bold mb-3 ls-sm ">
                    <span class="text-primary">Artikel</span> Menarik
                </h1>
            </div>

            <div id="posts" class="row">
                <div class="col-md-4">
                    <div class="card border-0 shadow loading">
                        <div class="image-loading">

                        </div>
                        <div class="content-loading">
                            <h4></h4>
                            <div class="description-loading">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow loading">
                        <div class="image-loading">

                        </div>
                        <div class="content-loading">
                            <h4></h4>
                            <div class="description-loading">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 shadow loading">
                        <div class="image-loading">

                        </div>
                        <div class="content-loading">
                            <h4></h4>
                            <div class="description-loading">

                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
</section>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            type: 'GET',
            url: 'https://edikomputer.com/wp-json/wp/v2/posts?per_page=3&orderby=id',

            success: function (data) {
                var posts_html = '';
                $.each(data, function (index, post) {
                    posts_html += '<div class="col-md-4"><div class="card mb-3"><img class="img-fluid" src="' + post.yoast_head_json.og_image[0].url + '">';
                    posts_html += '<div class="card-body"><a class="text-decoration-none text-muted" href="' + post.link + '"><h4>' + post.title.rendered + '</h4></a></div>';
                    posts_html += '<div class="card-footer bg-white text-muted"><p> <i class="bx bx-user me-3"></i>' + post.yoast_head_json.author + '</p></div></div></div>';
                    
                });
                $('#posts').html(posts_html);
            },
            error: function (request, status, error) {
                alert(error);
            }
        });
    });
</script>
@endsection