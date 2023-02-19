<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Digitized Medieval Manuscripts app - @yield('code')</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    {{-- Template Main CSS File --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<main id="main">
    <section class="inner-page">
        <div class="container py-4 rounded">
            <div class="d-flex align-items-center justify-content-center vh-100">
                <div class="text-center row">
                    <div class="col-md-6" data-aos="fade-right">
                        <img src="{{asset('img/hero-img.png')}}" alt="DMMapp image"
                             class="img-fluid">
                    </div>
                    <div class="col-md-6 mt-5">
                        <div class="my-5" data-aos="fade-down">
                            <p class="display-1"><span class="text-primary">@yield('code')</span></p>
                            <p class="lead">
                                @yield('message')
                            </p>
                        </div>
                        <div data-aos="fade-in" data-aos-duration="3000">
                            <figure>
                                <blockquote class="blockquote">
                                    <p class="fst-italic">"@yield('latin-message')"</p>
                                </blockquote>
                                <figcaption class="blockquote-footer">
                                    <p title="Translation">"@yield('translation')"</p>
                                </figcaption>
                                <figcaption class="blockquote-footer mt-2">
                                    <cite title="Source Title">@yield('source')</cite>
                                </figcaption>
                            </figure>
                            @yield('button')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

<script
    src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
    crossorigin="anonymous"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script type="text/javascript" src="{{asset('/js/manifest.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
<script type="text/javascript" src="{{asset('js/main.min.js')}}"></script>
</body>

</html>
