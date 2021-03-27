<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content={{$page->meta_keywords}} {{$page->meta_description}}}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$page->title}}</title>

    <link rel="icon"  href=""/>
    <!-- Styles -->
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    <link href="{{ asset('main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>
<body>
<div id="app" class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-main">
        <div class="app-main__outer">
            <div class="app-main__inner">
                <img width="700" height="450" src="{{ $page->getFirstMediaUrl('image') != null ? $page->getFirstMediaUrl('image') : config('app.placeholder').'160' }}"
                alt="">
                <h6>{{$page->excerpt}}</h6>
               {!! $page->body !!}
            </div>
            @include('layouts.backend.partials.footer')
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('assets/scripts/main.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/iziToast.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
@stack('js')
@include('vendor.lara-izitoast.toast')
</body>
</html>