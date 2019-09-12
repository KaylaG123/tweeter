<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit">
        <meta name="csrf-token" content="{{csrf_token()}}" />
        <meta name="_token" content="{{csrf_token()}}" />
        <title>Tweeter</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <div id="app">
            <div class="page-wrapper">
                <div class="header-wrapper">
                    @include('layout._header')
                </div>
                <div class="navbar-wrapper">
                    @include('layout._navbar')
                </div>
                <div class="content-wrapper">

                    @yield('content')
                </div>
                <div class="footer-wrapper">
                    @include('layout._footer')
                </div>
            </div>
        </div>
    <script src="/js/app.js"></script>

    </body>
</html>
