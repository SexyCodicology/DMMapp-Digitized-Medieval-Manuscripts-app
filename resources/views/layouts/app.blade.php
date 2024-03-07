<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @production
        @empty(config('google.ga-id'))
        @else
            {{-- Global site tag (gtag.js) - Google Analytics --}}
            <script async
                    src="https://www.googletagmanager.com/gtag/js?id={{ config('google.ga-id') }}">
            </script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    dataLayer.push(arguments);
                }

                gtag('js', new Date());
                gtag('config', '{{ config('google.ga-id') }}');
            </script>
        @endempty
    @endproduction
    {{-- metadata --}}
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @env(['local', 'staging'])
        <meta name="robots" content="none"/>
    @endenv

    {{-- Primary Meta Tags --}}
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ config('app.name', 'Digitized Medieval Manuscripts app - DMMapp') }}
        @endif
    </title>
    <meta name="title"
          content="@hasSection('title-meta')@yield('title-meta')@else{{ config('app.name', 'DMMapp - Digitized Medieval Manuscripts app') }}@endif">
    <meta name="description"
          content="@hasSection('description-meta')@yield('description-meta')@else{{ 'Discover the beauty of digitized medieval manuscripts with the DMMapp. Our platform collects links to digitized collections from around the world, providing a gateway to the past. ' }}@endif">
    @hasSection('last-edited')
        @yield('last-edited')
    @endif

    <link rel="canonical" href={{ URL::current() }}>
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ URL::current() }}">
    <meta property="og:title"
          content="@hasSection('title-meta')@yield('title-meta')@else{{ config('app.name', 'DMMapp - Digitized Medieval Manuscripts app') }}@endif">
    <meta property="og:description"
          content="@hasSection('description-meta')@yield('description-meta')@else{{ 'Discover the beauty of digitized medieval manuscripts with the DMMapp. Our platform collects links to digitized collections from around the world, providing a gateway to the past. ' }}@endif">
    <meta property="og:image" content="{{ mix('img/dmmapp.png') }}">

    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ URL::current() }}">
    <meta property="twitter:title"
          content="@hasSection('title-meta')@yield('title-meta')@else{{ config('app.name', 'DMMapp - Digitized Medieval Manuscripts app') }}@endif">
    <meta property="twitter:description"
          content="@hasSection('description-meta')@yield('description-meta')@else{{ 'Discover the beauty of digitized medieval manuscripts with the DMMapp. Our platform collects links to digitized collections from around the world, providing a gateway to the past. ' }}@endif">
    <meta property="twitter:image" content="{{ mix('img/dmmapp.png') }}">

    {{-- Icons --}}
    <link href="{{mix('img/favicon.ico')}}" rel="icon">
    <link rel="manifest" href="{{ mix('img/manifest.json') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ mix('img/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ mix('img/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ mix('img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ mix('img/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ mix('img/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ mix('img/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ mix('img/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ mix('img/apple-touch-icon-152x152.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ mix('img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ mix('img/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ mix('img/favicon-16x16.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ mix('img/mstile-310x310.png') }}">
    <meta name="theme-color" content="#ffffff">


    {{-- Vendor CSS Files --}}
    {{-- Template Main CSS File --}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">

    @yield('css')

</head>

<body>

{{-- SECTION -  Header --}}
<header id="header" class="d-flex align-items-center shadow-sm">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto d-flex justify-content-around">
            <a href="{{ url('/') }}"><img src="{{ mix('img/small-logo.png') }}" alt="DMMapp Logo"
                                          class="img-fluid" width="30" height="24"></a>
            <h2 class="ms-3"><a href="{{ url('/') }}">DMMapp</a></h2>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link" href="/">Home</a></li>
                @if (Request::is('/'))
                    <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link" href="#tools">Tools</a></li>
                            <li><a class="nav-link" href="#team">Team</a></li>
                            <li><a class="nav-link" href="#cta">Support Us</a></li>
                        </ul>
                @else
                    <li><a class="nav-link" href="#cta">Support Us</a></li>
                @endif
                <li><a class="nav-link" href="{{ route('data') }}">Data</a></li>
                <li><a class="nav-link" href="{{ route('map') }}">Map</a></li>
                <li><a class="nav-link" href="https://blog.digitizedmedievalmanuscripts.org/" target="_blank">Blog <sup><i
                                class="bi bi-box-arrow-up-right small"></i></sup></a></li>
                <li><a class="nav-link"
                       href="https://blog.digitizedmedievalmanuscripts.org/contact-us/" target="_blank">Contact <sup><i
                                class="bi bi-box-arrow-up-right small"></i></sup></a></li>
                @auth
                    <li class="dropdown"><a href="#"><span>Admin</span> <i
                                class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li>
                                <a href="{{ route('admin') }}">Manage institutions</a>
                            </li>
                            <li><a class="nav-link" href="{{ route('create_library') }}">Add institution</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="nav-link" href="{{ route('broken-links') }}">Manage broken links</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="nav-link" href="/admin/jobs" target="_blank" rel="noopener noreferrer">Jobs
                                    monitor</a>
                            </li>
                            <li><a class="nav-link" href="/admin/log-viewer" rel="noopener noreferrer">Logs
                                    monitor</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                <li class="ml-4"></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle mx-3"></i>
        </nav>{{-- .navbar --}}

        <div class="header-social-links d-flex align-items-center">
            <a href="https://www.patreon.com/join/424150" class="patreon" data-dmmapp="patreon-top-icon"><i
                    class="bi bi-chat-left-heart-fill"></i></a>
            <a href="https://www.linkedin.com/company/sexy-codicology" class="linkedin"><i
                    class="bi bi-linkedin"></i></a>

        </div>

    </div>
</header>
{{-- !SECTION Header --}}

<main id="main">
    @if (Request::is('/'))
    @else
        <section id="breadcrumbs" class="breadcrumbs border-bottom shadow">
            <div class="container">

                @yield('breadcrumbs')

            </div>
        </section>
    @endif
    <section class="inner-page">
        <div class="text-center">
            <div class="spinner-border text-primary mt-5" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div class="container border py-4 shadow rounded" data-aos="fade-up">

            @yield('content')
        </div>
    </section>

</main>{{-- !SECTION #main --}}

{{-- SECTION -  Footer --}}
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>DMMapp</h3>
                        <div class="social-links mt-3">
                            <a href="https://www.patreon.com/join/424150" class="patreon"
                               data-dmmapp="patreon-footer-icon"><i
                                    class="bi bi-chat-left-heart-fill"></i></a>
                            <a href="https://www.linkedin.com/company/sexy-codicology" class="linkedin"><i
                                    class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a
                                href="https://blog.digitizedmedievalmanuscripts.org/about/">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a
                                href="https://blog.digitizedmedievalmanuscripts.org">Blog</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('map') }}">Map</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="{{ route('data') }}">Data</a></li>
                        <li><i class="bi bi-chevron-right disabled"></i> <a href="#">API (coming soon)</a></li>

                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-patreon">
                    <h4>Support us</h4>
                    <p>The DMMapp lives on donations by manuscripts lovers like yourself!</p>
                    <a href="https://www.patreon.com/join/424150"
                       data-patreon-widget-type="become-patron-button" data-dmmapp="patreon-footer-link">Become a
                        Patron!</a>

                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            <p xmlns:dct="http://purl.org/dc/terms/" xmlns:vcard="http://www.w3.org/2001/vcard-rdf/3.0#">
                <a rel="license"
                   href="https://creativecommons.org/publicdomain/zero/1.0/">
                    <img src="https://i.creativecommons.org/p/zero/1.0/88x31.png" style="border-style: none;"
                         alt="CC0"/>
                </a>
                <br/>
                To the extent possible under law,
                <a rel="dct:publisher"
                   href="https://digitizedmedievalmanuscripts.org/">
                    <span property="dct:title">we</span></a>
                have waived all copyright and related or neighboring rights to
                <span property="dct:title">the DMMapp</span>.
                This work is published from:
                <span property="vcard:Country" datatype="dct:ISO3166"
                      content="NL" about="https://digitizedmedievalmanuscripts.org/">
  The Netherlands</span>.
            </p>
            @guest
                <div>
                    <a class="fw-lighter text-center" data-dmmapp="login" rel="nofollow"
                       href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
            @endguest
        </div>
        {{-- <div class="credits">
             All the links in the footer should remain intact.
             You can delete the links only if you purchased the pro version.
             Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/DMMapp-bootstrap-metro-style-template/
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div> --}}
    </div>
</footer>
@yield('feedback')
{{-- !SECTION Footer --}}

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
<script type="text/javascript" src="{{mix('js/manifest.js')}}"></script>
<script type="text/javascript" src="{{mix('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{mix('js/app.js')}}"></script>
<script type="text/javascript" src="{{mix('js/main.min.js')}}"></script>
<script type="text/javascript"> $(function () {
        $('.spinner-border').hide();
    });</script>

@yield('javascript')
@stack('scripts')

</body>

</html>
