@extends('layouts.app')
@section('title', 'Graha Studio')
@section('content')

<section class="bg-warning">
    <div class="container py-5">

        <div class="">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-5">
                    <img src="https://grahastudio.com/grahastudio/assets/img/galery/bg-hero.svg"
                        class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500"
                        loading="lazy">
                </div>
                <div class="col-lg-7">
                    <h1 class="display-5 fw-bold mb-3 ls-sm ">
                        <span class="text-primary">Jasa Pembuatan Website</span> dan Video Animasi
                    </h1>
                    <p class="lead">Kami Siap membantu anda untuk menyediakan material Promosi secara Digital.</p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="https://grahastudio.com/grahastudio/offer/custom"
                            class="btn btn-primary btn-lg px-4 me-md-2">Minta Penawaran</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="py-5 my-5">
    <div class="container">
        <div class="text-center">
            <h1 class="display-5 fw-bold mb-3 ls-sm ">
                <span class="text-primary">Layanan</span> Graha Studio
            </h1>
            <p class="lead mb-5">
                Jasa Layanan Digital Online, Pembuatan Website dan Video Editing
            </p>
        </div>
        <div class="row">
            <div class="col-12 col-md-4" data-aos="fade-up">
                <div class="card shadow border-0 mb-3">
                    <div class="card-body">
                        <!-- Icon -->
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded">
                            <i class='bx bx-code-alt'></i>
                        </div>


                        <!-- Heading -->
                        <h4>
                            Web App Development
                        </h4>

                        <!-- Text -->
                        <p class="text-muted mb-6 mb-md-0">
                            Layanan Pembuatan system aplikasi berbasis Web, Seperti System stok barang, system booking
                            online, system akademis, dll.
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="50">
                <div class="card shadow border-0 mb-3">
                    <div class="card-body">
                        <!-- Icon -->
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded">
                            <i class='bx bx-video-recording'></i>
                        </div>

                        <!-- Heading -->
                        <h4>
                            Video Editing
                        </h4>

                        <!-- Text -->
                        <p class="text-muted mb-6 mb-md-0">
                            Layanan pembuatan video animasi dan Syuting untuk keperluan profile perusahaan, atau Event.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card shadow border-0 mb-3">
                    <div class="card-body">
                        <!-- Icon -->
                        <div
                            class="feature-icon d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-2 mb-3 p-3 rounded">
                            <i class='bx bx-receipt'></i>
                        </div>

                        <!-- Heading -->
                        <h4>
                            Jasa Website Murah
                        </h4>

                        <!-- Text -->
                        <p class="text-muted mb-0">
                            Jasa pembuatan Website Instan, reguler lisensi dengan harga yang lebih terjangkau, anda bisa
                            memilih paket harga sesuai kebutuhan.
                        </p>
                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
        <div class="text-center mt-5">
            <a href="https://wa.me/6281233335523" class="btn btn-success btn-lg px-3"><i class='bx bxl-whatsapp'></i>
                Hubungi Kami</a>
        </div>
    </div>
    <!-- / .container -->
</section>

<section class="" id="features">
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
                            <div class="card rounded mb-3 border-0 shadow">
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
                                            <a href="{{ url('add-to-cart/'.$item->uuid) }}"
                                                class="btn btn-primary text-center" role="button"> <i
                                                    class='bx bx-copy-alt'></i> Preview</a>
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

<section class="bg-white shadow py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-7 col-lg-6" data-aos="fade-right">

                <!-- Heading -->
                <h2>
                    <h1 class="display-3 fw-bold mb-3 ls-sm ">
                        <span class="text-primary">Web App</span> Development
                    </h1>
                </h2>

                <!-- Text -->
                <p class="fs-lg text-muted mb-6">
                    Kami membuat Aplikasi Website menggunakan Framework yang populer dan juga menggunakan fraamwork
                    yaang mudah di pelaajari
                </p>

                <!-- List -->
                <div class="d-flex mb-3">

                    <!-- Icon -->
                    <div class="icon text-primary fs-1">
                        <i class='bx bx-cheese'></i>

                    </div>

                    <div class="ms-5">

                        <!-- Heading -->
                        <h4 class="mb-1">
                            Custom Website
                        </h4>

                        <!-- Text -->
                        <p class="text-muted mb-6">
                            Anda sudah punya website tapi sulit untuk menambah fitur atau mengubah tampilannya, kami
                            membuat website yang sudah bisa di custom atau menambah fitur sesuai kebutuhan.
                        </p>

                    </div>

                </div>
                <div class="d-flex mb-3">

                    <!-- Icon -->
                    <div class="icon text-primary fs-1">
                        <i class='bx bx-coffee'></i>
                    </div>

                    <div class="ms-5">

                        <!-- Heading -->
                        <h4 class="mb-1">
                            Source Aplikasi Web Siap Pakai
                        </h4>

                        <!-- Text -->
                        <p class="text-muted mb-6 mb-md-0">
                            Kami menyediakan Website yang sudah bisa di gunakan dimana anda tidak perlu menunggu lama,
                            selain itu harga juga lebih terjangkau dan bisa request fitur tambahan.
                        </p>

                    </div>

                </div>


            </div>
            <div class="col-12 col-md-5 col-lg-6">

                <div class="w-md-150 w-lg-130 position-relative" data-aos="fade-left">

                    <!-- Image -->
                    <div class="img-skewed img-skewed-start">

                        <!-- Image -->
                        <img src="https://landkit.goodthemes.co/assets/img/screenshots/desktop/dashkit.jpg"
                            class="screenshot img-fluid img-skewed-item" alt="...">

                    </div>

                </div>

            </div>
        </div>
    </div> <!-- / .row -->

</section>


<section class="py-5 my-5">
    <div class="hero-img">
        <div class="container px-4 px-lg-0 ">
            <!-- Hero Section -->
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="mb-4 text-center text-xl-start px-md-8 px-lg-19 px-xl-0">
                        <!-- Caption -->
                        <h1 class="display-3 fw-bold mb-3 ls-sm ">
                            <span class="text-primary">Motion Graphic</span>, Video Editing
                        </h1>
                        <p class="mb-6 lead pe-lg-6">
                            Layanan Jasa Pembuatan Video Animasi Motion Graphic untuk profil perusahaan, kami juga
                            melayani shooting video dan editing video untuk vlog dan lainnya
                        </p>
                        <!-- List -->
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
</section>



<section class="py-3 py-md-5 bg-white">
    <div class="container">
        <div class="col-md-8 mx-auto text-center">
            <h1 class="display-3 fw-bold mb-3 ls-sm ">
                <span class="text-primary">Artikel</span> dan Informasi
            </h1>
            <p class="mb-6 lead pe-lg-6">
                Berita dan Informasi Teknologi
            </p>
        </div>
    </div>

    <div class="container overflow-hidden">
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
                                    <a class="link-dark text-decoration-none" href="#!">Overcoming Challenges to Make a
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
</section>

@endsection