<div class="footer-area mt-auto">
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
            {{-- <div class="col-md-3">
                <h4 class="footer-heading">Shop Now</h4>
                <div class="footer-underline"></div>
                <div class="mb-2"><a href="" class="text-white">Collections</a></div>
                <div class="mb-2"><a href="" class="text-white">Trending Products</a></div>
                <div class="mb-2"><a href="" class="text-white">New Arrivals Products</a></div>
                <div class="mb-2"><a href="" class="text-white">Featured Products</a></div>
                <div class="mb-2"><a href="" class="text-white">Cart</a></div>
            </div> --}}
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
</div>