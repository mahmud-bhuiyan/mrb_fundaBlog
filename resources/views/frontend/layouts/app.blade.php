<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="author" content="MRB">

    @php
        $setting = App\Models\Settings::find(1);
    @endphp
    @if ($setting)
        <link rel="shortcut icon" href="{{ asset('uploads/settings/' . $setting->favicon) }}" type="images/x-icon">
    @endif

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- owl.carousel Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <!-- fontawesome cdn -->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        @include('frontend.layouts.includes.frontend-navbar')

        <main class="">
            @yield('content')
        </main>

        @include('frontend.layouts.includes.frontend-footer')

    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/jquery-3.6.3.min.js') }}"></script>

    <!-- owl.carousel Scripts -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script>
        $('.category-carousel').owlCarousel({
            stagePadding: 50,
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    @yield('scripts')
</body>

</html>
