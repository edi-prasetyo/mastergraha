{{-- <div class="footer-area mt-auto">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="footer-heading">Tentang kami</h4>
                <div class="footer-underline"></div>
                <p>
                    {{$option_nav->description}}
                </p>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Links</h4>
                <div class="footer-underline"></div>
                <div class="mb-2"><a href="{{url('')}}" class="text-white">Home</a></div>
                <div class="mb-2"><a href="{{url('/products')}}" class="text-white">Products</a></div>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Shop Now</h4>
                <div class="footer-underline"></div>
                <div class="mb-2"><a href="" class="text-white">Collections</a></div>
                <div class="mb-2"><a href="" class="text-white">Trending Products</a></div>
                <div class="mb-2"><a href="" class="text-white">New Arrivals Products</a></div>
                <div class="mb-2"><a href="" class="text-white">Featured Products</a></div>
                <div class="mb-2"><a href="" class="text-white">Cart</a></div>
            </div>
            <div class="col-md-3">
                <h4 class="footer-heading">Alamat</h4>
                <div class="footer-underline"></div>
                <div class="mb-2">
                    <p>
                        <i class='bx bx-map'></i> {{$option_nav->address}}
                    </p>
                </div>
                <div class="mb-2">
                    <a href="" class="text-white">
                        <i class='bx bx-phone'></i> {{$option_nav->whatsapp}}
                    </a>
                </div>
                <div class="mb-2">
                    <a href="" class="text-white">
                        <i class='bx bx-envelope-open'></i> {{$option_nav->email}}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <p class=""> &copy; 2023 - {{$option_nav->title}}. All rights reserved.</p>
            </div>
            <div class="col-md-4">
                <div class="social-media">
                    Get Connected:
                    <a href=""><i class='bx bxl-facebook'></i></a>
                    <a href=""><i class='bx bxl-twitter'></i></a>
                    <a href=""><i class='bx bxl-instagram'></i></a>
                    <a href=""><i class='bx bxl-youtube'></i></a>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<footer class="footer text-muted">
    <section class="py-4 py-md-5 py-xl-8 bg-light border-top">
        <div class="container overflow-hidden">
            <div class="col-md-10 mx-auto">
                <div class="row gy-4 gy-lg-0">
                    <div class="col-12 col-md-4 col-lg-4">
                        <div class="widget">
                            <h4 class="widget-title mb-4">Hubungi</h4>
                            <address class="mb-4 pe-3"><i class='bx bx-map'></i> {{$option_nav->address}}</address>
                            <p class="mb-1">
                                <i class='bx bxl-whatsapp'></i> <a class="link-secondary text-decoration-none"
                                    href="tel:{{$option_nav->whatsapp}}">
                                    {{$option_nav->phone}}</a>
                            </p>
                            <p class="mb-0">
                                <i class='bx bx-envelope'></i> <a class="link-secondary text-decoration-none"
                                    href="mailto:{{$option_nav->email}}">{{$option_nav->email}}</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title mb-4">Menu</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="{{url('/')}}" class="link-secondary text-decoration-none">Home</a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{url('/products')}}"
                                        class="link-secondary text-decoration-none">Product</a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{url('/blog')}}" class="link-secondary text-decoration-none">Blog</a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{url('/helps')}}" class="link-secondary text-decoration-none">Bantuan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title mb-4 opacity-0">Menu</h4>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <a href="{{url('/contact')}}" class="link-secondary text-decoration-none">Hubungi
                                        Kami</a>
                                </li>
                                <li class="mb-2">
                                    <a href="{{url('/helps')}}" class="link-secondary text-decoration-none">Tentang
                                        Kami</a>
                                </li>
                                <li class="mb-2">
                                    <a href="#!" class="link-secondary text-decoration-none">Kebijakan Privasi</a>
                                </li>
                                <li class="mb-0">
                                    <a href="#!" class="link-secondary text-decoration-none">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="widget">
                            <h4 class="widget-title mb-4">Berlangganan</h4>
                            <p class="mb-4">Dapatkan Informasi Diskon atau artikel menarik dari kami melalui email
                            </p>
                            <form action="#!">
                                <div class="row gy-4">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <span class="input-group-text" id="email-newsletter-addon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z" />
                                                </svg>
                                            </span>
                                            <input type="email" class="form-control" id="email-newsletter" value=""
                                                placeholder="Email Address" aria-label="email-newsletter"
                                                aria-describedby="email-newsletter-addon" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button class="btn btn-primary" type="submit">Subscribe</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-light py-4 py-xl-8 border-light-subtle">
        <div class="container">
            <div class="col-md-10 mx-auto py-md-5 border-top">
                <div class="text-center">
                    Copyright &copy; 2024 {{$option_nav->title}}. All Rights Reserved.
                    <div class="col-md-12">
                        <ul class="social-network social-circle">

                            <li><a href="#" class="fs-2 text-muted" title="Facebook"><i
                                        class='bx bxl-facebook-circle'></i></a>
                            </li>
                            <li><a href="#" class="fs-2 text-muted" title="Twitter"><i class='bx bxl-youtube'></i></a>
                            </li>
                            <li><a href="#" class="fs-2 text-muted" title="Google +"><i
                                        class='bx bxl-instagram'></i></a>
                            </li>
                            <li><a href="#" class="fs-2 text-muted" title="Linkedin"><i class='bx bxl-tiktok'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>