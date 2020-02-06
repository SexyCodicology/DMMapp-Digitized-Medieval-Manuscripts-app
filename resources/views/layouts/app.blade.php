<!doctype html>
<html lang="en">

<head prefix="og: //ogp.me/ns#">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@if(View::hasSection('title'))@yield('title')
        @else{{ config('app.name', 'DMMapp - Open Source Edition') }}@endif</title>
    <link rel="canonical" href={{URL::current()}}>
    <meta name="application-name"
        content="@if(View::hasSection('title'))@yield('title') @else{{ config('app.name', 'DMMapp - Open Source Edition') }}@endif" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{{ asset('img/apple-icon-57x57.png') }}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{{ asset('img/apple-icon-60x60.png') }}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{{ asset('img/apple-icon-72x72.png') }}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{{ asset('img/apple-icon-76x76.png') }}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{{ asset('img/apple-icon-114x114.png') }}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{{ asset('img/apple-icon-120x120.png') }}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{{ asset('img/apple-icon-144x144.png') }}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{{ asset('img/apple-icon-152x152.png') }}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{{ asset('img/apple-icon-180x180.png') }}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{{ asset('img/android-icon-192x192.png') }}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{{ asset('img/favicon-32x32.png') }}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{{ asset('img/favicon-96x96.png') }}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{{ asset('img/favicon-16x16.png') }}}">
    <link rel="manifest" href="{{{ asset('img/manifest.json') }}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{{ asset('img/ms-icon-144x144.png') }}}">
    <meta name="theme-color" content="#ffffff">




    <!-- Boostrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
        integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    @yield('css')
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <!--SECTION NAV -->
    <div class="wrapper">
        <!--SECTION Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header"><a href="/">
                    <img src="{{{ asset('img/logo.png') }}}" alt="logo"
                        style="width:50%; display: block; margin:0 auto;"></a>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="/" class="active">
                        <i class="fas fa-atlas"></i>
                        DMMapp - Open Source
                    </a>
                </li>
                <li>
                    <a href="/data/">
                        <i class="fas fa-database"></i>
                        Data
                    </a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-hands-helping"></i> Contribute
                    </a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="https://docs.google.com/forms/d/e/****************************/viewform?"
                                target="_blank" rel="noopener">Report data issue <sup><i
                                        class="fas fa-external-link-alt fa-xs"></i></sup></a>
                        </li>
                        <li>
                            <a href="https://example.com/" target="_blank" rel="noopener">Report
                                missing repository <sup><i class="fas fa-external-link-alt fa-xs"></i></sup></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="https://example.com/" target="_blank" rel="noopener">
                        <i class="fas fa-question"></i>
                        Link <sup><i class="fas fa-external-link-alt fa-xs"></i></sup>
                    </a>
                </li>
                <li>
                <li>
                    <a href="https://example.com/" target="_blank" rel="noopener">
                        <i class="fas fa-book"></i>
                        Link <sup><i class="fas fa-external-link-alt fa-xs"></i></sup>
                    </a>
                </li>
                <li>
                    <a href="https://example.com/" target="_blank" rel="noopener">
                        <i class="far fa-newspaper"></i>
                        Link <sup><i class="fas fa-external-link-alt fa-xs"></i></sup>
                    </a>
                </li>
                <li>
                    <a href="https://example.com/" target="_blank" rel="noopener">
                        <i class="far fa-id-badge"></i>
                        Link <sup><i class="fas fa-external-link-alt fa-xs"></i></sup>
                    </a>
                </li>
                <li>
                    <a href="https://example.com/" target="_blank" rel="noopener">
                        <i class="far fa-comment-alt"></i>
                        Contact Us <sup><i class="fas fa-external-link-alt fa-xs"></i></sup>
                    </a>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
                <li>
                </li>
                <li>
                </li>
            </ul>
        </nav>
        <!-- SECTION End nav -->
        <!--SECTION Page Content  -->
        <div id="content">
            <!-- SECTION Page nav -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-sm btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">DMMapp - Open Source</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/data/">Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://example.com/" target="_blank" rel="noopener">Link
                                    <sup><i class="fas fa-external-link-alt fa-xs"></i></sup></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://example.com/" target="_blank"
                                    rel="noopener">Link<sup><i class="fas fa-external-link-alt fa-xs"></i></sup></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- SECTION End page nav -->
            <div class="container">
                <h1 class="text-center">{{ config('app.name', 'DMMapp - Open Source Edition') }}</h1>
                <h6 class="text-muted text-center">Enim sint veniam</h6>
                <div class="row">
                    <!-- SECTION Yield Content -->
                    @yield('content')
                    <!-- SECTION End Yield Content -->
                    <footer class="pt-4 my-md-5 pt-md-5 border-top">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 col-md">
                                    <h5>Voluptate nostrud eu ipsum veniam.</h5>
                                    <ul class="list-unstyled text-small">
                                        <li><a class="text-muted" href="/">Home</a></li>
                                        <li><a class="text-muted" href="https://example.com/" target="_blank"
                                                rel="noopener">Link</a></li>
                                    </ul>
                                </div>
                                <div class="col-6 col-md">
                                    <h5>Resources</h5>
                                    <ul class="list-unstyled text-small">
                                        <li><a class="text-muted"
                                                href="https://docs.google.com/forms/d/e/*****************************/viewform"
                                                target="_blank" rel="noopener">Report data issue </a></li>
                                        <li><a class="text-muted"
                                                href="https://docs.google.com/forms/d/e/*****************************/viewform"
                                                target="_blank" rel="noopener">Submit a missing repository</a></li>
                                        <li><a class="text-muted" href="/login">Admin
                                                login</a></li>
                                    </ul>
                                </div>
                                <div class="col-6 col-md">
                                    <h5>About</h5>
                                    <ul class="list-unstyled text-small">
                                        <li><a class="text-muted" href="https://example.com/" target="_blank"
                                                rel="noopener">Link</a></li>
                                        <li><a class="text-muted" href="https://example.com/" target="_blank"
                                                rel="noopener">Link</a></li>
                                        <li><a class="text-muted" href="https://example.com/" target="_blank"
                                                rel="noopener">Link</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <p class="text-muted">Designed and built with all the love in the world by <a
                                        href="https://www.linkedin.com/in/giuliomenna" target="_blank"
                                        rel="noopener">Giulio Menna</a> and <a
                                        href="https://www.linkedin.com/in/mjtdevos/" target="_blank"
                                        rel="noopener">Marjolein de Vos</a> - A.K.A. the Sexy Codicology
                                    Team.
                                    <br />Made possible with the help of our <a
                                        href="https://www.patreon.com/SexyCodicology" target="_blank"
                                        rel="noopener">patrons</a>. Become
                                    one of them over at <a href="https://www.patreon.com/join/SexyCodicology?"
                                        target="_blank" rel="noopener">Patreon</a>.</p>
                                <p class="text-muted">The DMMapp - Open Source is shared under a <a
                                        href="https://github.com/SexyCodicology/DMMapp-Open-Source/blob/master/LICENSE"
                                        target="_blank" rel="noopener">MIT License</a>.</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <!-- SECTION addtional JS Jquery, popper, bootstrap, sidebar's sidebar -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    @yield('javascript')
    <script type="text/javascript" async defer src="https://use.fontawesome.com/releases/v5.4.1/js/all.js"
        integrity="sha384-L469/ELG4Bg9sDQbl0hvjMq8pOcqFgkSpwhwnslzvVVGpDjYJ6wJJyYjvG3u8XW7" crossorigin="anonymous">
    </script>
    <script type="text/javascript" async defer>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>