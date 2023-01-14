<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- metadata --}}
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="none" />

    {{-- Primary Meta Tags --}}
    <title>Digitized Medieval Manuscripts app - DMMapp</title>
    <meta name="title" content="DMMapp - Digitized Medieval Manuscripts app">

    <link rel="canonical" href={{ URL::current() }}>

    @env('production')
        {{-- Template Main CSS File --}}
        <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    @endenv
    @env(['local', 'staging'])
        {{-- Template Main CSS File --}}
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @endenv

    @yield('css')

</head>

<body>
@foreach ($urls as $url)
    <p><a href="{{ $url }}" rel="nofollow noopener noreferrer">{{ $url }}</a></p>
@endforeach
</body>
