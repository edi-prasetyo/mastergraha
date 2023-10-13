<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title') | {{$option_nav->title}} | {{$option_nav->tagline}}</title>
  <meta name="description" content="{{$option_nav->description}} @yield('meta_description')">
  <meta name="keywords" content="{{$option_nav->keywords}} @yield('meta_keyword')">
  <meta name="author" content="@yield('title')">
  <meta name="google-site-verification" content="{{$option_nav->google_meta}}">
  <meta name="robots" content="noindex,nofollow">
  <meta property="og:image" content="@yield('image')">
  <link rel="shortcut icon" href="{{asset('uploads/logo/'.$option_nav->favicon)}}">
  <link rel="stylesheet" href="{{asset('assets/vendor/boxicon/css/boxicons.min.css')}}">
  <link href="{{asset('assets/vendor/offcanvas/offcanvas-navbar.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/star.css')}}" rel="stylesheet">


</head>

<body class="d-flex flex-column min-vh-100">
  <div id="app">
    @include('layouts.inc.frontend.navbar')

    <main>
      @yield('content')
    </main>
  </div>
  @include('layouts.inc.frontend.footer')

</body>
<script src="{{asset('assets/js/jquery-3.6.3.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/offcanvas/offcanvas-navbar.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.js"></script>
<link href="{{asset('admin/vendor/summernote/summernote-lite.min.css')}}" rel="stylesheet">
<script src="{{asset('admin/vendor/summernote/summernote-lite.min.js')}}"></script>

<script type="text/javascript">
  $("img").lazyload({
	    effect : "fadeIn"
	});
</script>

{{-- <script type="text/javascript">
  var nav = document.querySelector('nav');
  
        window.addEventListener('scroll', function () {
          if (window.pageYOffset > 100) {
            nav.classList.add('bg-white', 'shadow-sm');
          } else {
            nav.classList.remove('bg-white', 'shadow-sm');
          }
        });
</script> --}}

@yield('scripts')

</html>