<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ __('My blog') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/all.min.css') }}">
    <link href="{{ asset('assets/vendors/aos/aos.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header edica-landing-header">
    <div class="container">
        @include('blog.includes.navbar')
        @yield('carousel')
    </div>
</header>

<main>
    @yield('content')
</main>
{{--<section class="edica-footer-banner-section">--}}
{{--    <div class="container">--}}
{{--        <div class="footer-banner" data-aos="fade-up">--}}
{{--            <h1 class="banner-title">Download it now.</h1>--}}
{{--            <div class="banner-btns-wrapper">--}}
{{--                <button class="btn btn-success"> <img src="assets/images/apple@1x.svg" alt="ios" class="mr-2"> App Store</button>--}}
{{--                <button class="btn btn-success"> <img src="assets/images/android@1x.svg" alt="android" class="mr-2"> Google Play</button>--}}
{{--            </div>--}}
{{--            <p class="banner-text">Add some helper text here to explain the finer details of your <br> product or service.</p>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<footer class="edica-footer mt-3" data-aos="fade-up">
    @include('blog.includes.footer')
</footer>
<script src="{{ asset('assets/vendors/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/aos/aos.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
    AOS.init({
        duration: 2000
    });
</script>
</body>
</html>
