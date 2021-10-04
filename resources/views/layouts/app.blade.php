<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- TODO variable if statments: each page gets the title of the institution + digitized medieval manuscripts --}}
    <title>{{ config('app.name', 'DMMapp - Digitized Medieval Manuscripts app') }}</title>
    {{-- TODO variable if statments: each page gets the description of the institution + digitized medieval manuscripts --}}
    <meta content="Digitized medieval manuscripts belonging to  the ..." name="description">
    {{-- TODO check keywords --}}
    <meta content="Digitized medieval manuscripts, manuscripts, digitized books, medieval" name="keywords">

    {{-- Favicons --}}
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com/" crossorigin>
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    {{-- Vendor CSS Files --}}

    {{-- TODO convert to blade call as the CSS --}}
    {{-- TODO cdn files over local files --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    {{-- Template Main CSS File --}}
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')

</head>

<body>

    {{-- SECTION -  Header --}}
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a href="{{ url('/') }}">DMMapp</a></h1>
                {{-- TODO image logo --}}
                {{-- <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="DMMapp Logo"
                        class="img-fluid"></a> --}}
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    {{-- TODO fix nav links --}}
                    <li><a class="nav-link" href="/">Home</a></li>
                    <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="nav-link" href="#about">About Us</a></li>
                            <li><a class="nav-link" href="#team">Team</a></li>
                            <li><a class="nav-link" href="#testimonials">Testimonials</a></li>
                            {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i
                                        class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">Deep Drop Down 1</a></li>
                                    <li><a href="#">Deep Drop Down 2</a></li>
                                    <li><a href="#">Deep Drop Down 3</a></li>
                                    <li><a href="#">Deep Drop Down 4</a></li>
                                    <li><a href="#">Deep Drop Down 5</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </li>
                    <li><a class="nav-link" href="{{route('map')}}">Map</a></li>
                    <li><a class="nav-link" href="{{route('data')}}">Data</a></li>
                    <li><a class="nav-link" href="https://blog.digitizedmedievalmanuscripts.org/">Blog</a></li>
                    <li><a class="nav-link" href="https://blog.digitizedmedievalmanuscripts.org/contact-us/">Contact</a></li>
                    <li class="ml-4"></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>{{-- .navbar --}}

            <div class="header-social-links d-flex align-items-center">
                <a class="nav-link" href="https://www.patreon.com/bePatron?u=3645539"
                    data-patreon-widget-type="become-patron-button">Become a Patron!</a>
                <a href="https://twitter.com/sexycodicology" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="https://www.facebook.com/SexyCodicology/" class="facebook"><i
                        class="bi bi-facebook"></i></a>
                <a href="https://www.linkedin.com/company/sexy-codicology" class="linkedin"><i
                        class="bi bi-linkedin"></i></a>

            </div>

        </div>
    </header>
    {{-- !SECTION Header --}}

    <main id="main">

        @yield('breadcrumbs')
        <section class="inner-page">
            <div class="container">

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
                                <a href="https://twitter.com/sexycodicology" class="twitter"><i
                                        class="bx bxl-twitter"></i></a>
                                <a href="https://www.facebook.com/SexyCodicology/" class="facebook"><i
                                        class="bx bxl-facebook"></i></a>
                                <a href="https://www.linkedin.com/company/sexy-codicology" class="linkedin"><i
                                        class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ url('/') }}">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="https://blog.digitizedmedievalmanuscripts.org/about/">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a
                                    href="https://blog.digitizedmedievalmanuscripts.org">Blog</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('map') }}">Map</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="{{ route('data') }}">Data</a></li>
                            <li><i class="bx bx-chevron-right disabled"></i> <a href="#">API (coming soon)</a></li>

                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-patreon">
                        <h4>Support us</h4>
                        <p>The DMMapp lives on donations by manuscripts lovers like yourself!</p>
                        <a href="https://www.patreon.com/bePatron?u=3645539"
                            data-patreon-widget-type="become-patron-button">Become a Patron!</a>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Giulio Menna</span></strong>. <a rel="license"
                    href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License"
                        style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br />This
                work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative
                    Commons Attribution 4.0 International License</a>.
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
    {{-- !SECTION Footer --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>


    <script type="text/javascript" async defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js"
        integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous">
    </script>

    {{-- Vendor JS Files --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script async defer src="https://c6.patreon.com/becomePatronButton.bundle.js"></script>

    {{-- Template Main JS File --}}
    <script src="js/main.js"></script>
    @yield('javascript')

</body>

</html>
