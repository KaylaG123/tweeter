<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="tweeterlogo.png" href="Tweeter/resources/views/images/tweeterlogo.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/welcome.css">

        <title>Tweeter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron jumbotron-fluid">

                <video autoplay muted loop>
                    <source src="" data-src="/images/TweeterLogoAnimation.mp4" type="video/mp4">
                    </video>

                    <div class="container text-skyblue">
                        <h1 class="display-4">Welcome to Tweeter!</h1>
                        <p class="lead">Connect with like-minded people</p>
                        <hr class="my-4">
                        <p></p>
                        <div class="flex-center position-ref">
                            <div class="bottom-right link">
                            @if (Route::has('login'))
                            @auth
                                <a class="btn btn-primary btn-lg" href="{{ url('/home') }}">Home</a>
                            @else
                                <a class="btn btn-primary btn-lg" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a class="btn btn-primary btn-lg" href="{{ route('register') }}">Register</a>
                            @endif
                            @endauth
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="content">
                <div class="title m-b-md">
                    <img src="/images/twitterlogo.png" class="logo" width="100" height="100" alt="navlogo">
                </div>
            </div>
        </div>

        <script>
        function deferVideo() {

            //defer html5 video loading
            $("video source").each(function() {
                var sourceFile = $(this).attr("data-src");
                $(this).attr("src", sourceFile);
                var video = this.parentElement;
                video.load();
            });

        }
        window.onload = deferVideo;
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
