<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no,maximum-scale=1">
    <meta name="description" content="The new social media website that everyone's talking about. Come see what all the hype is about! Stay connected and flock on! ">
    <meta name="author"      content="Kayla">
    <meta name="keywords"    content="pizza, okotoks, south, calgary">
    <link rel="shortcut icon" type="tweeterlogo.png" href="/images/twitterlogo.png"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/welcome.css">

    <title>Tweeter | The place where everyone's flocking to</title>

    <!-- Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:800&display=swap" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,600" > -->
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: rgba(227,242,253,0.1);">
        <a class="navbar-brand" href="/marketing/index">
            <img src="/images/twitterlogo.png" id="animate1" class="trigger1" width="30" height="30" alt="navlogo">
        </a>
        <!-- <div class="col-12 offset-6"> -->
        <ul>
            @if (Route::has('login'))
            @auth
            <a class="btn btn-primary btn-lg" href="{{ url('/home') }}">Home</a>
            @else
            <a class="login btn btn-primary btn-lg" href="{{ route('login') }}">Login</a>
            <a class="mobile btn btn-primary btn-lg" href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
            <!-- <a href="{{ route('register') }}" class="btn-liquid">
            <span class="inner">Sign up</span>
        </a> -->
        <a class="mobile btn btn-primary btn-lg" href="{{ route('register') }}">Sign up</a>
        <a class="login btn btn-primary btn-lg" href="{{ route('register') }}">Sign up</a>



        <!-- <a class="btn btn-primary btn-lg" href="{{ route('register') }}">Sign up</a> -->
        @endif
        @endauth
        @endif
    </li>
</ul>
<!-- </div> -->
</nav>

<section id="flock">
    <div class="bird jumbotron jumbotron-fluid">

        <video autoplay muted loop>
            <source src="" data-src="/images/TweeterLogoAnimation.mp4" type="video/mp4">
            </video>

            <div class="flocking">
                <div class="container">
                    <h1 class="display-4">The place to find your flock!</h1>

                    <hr class="my-4">
                    <div id="typed-strings">
                        <p>TWEETER - Where like-minded people come to connect</p>
                    </div>
                    <span id="typed"></span>
                </div>
            </div>
        </div>
    </section>

    <div class="call parallax">
        <div class="float">
            <div id="reveal-elements">
                <div class="list container">
                    <div class="row ">
                        <div class="row offset-1">
                            <div class="box1">
                                <div class="floating digit">
                                    <h5>Need a job?</h5>
                                </div>
                            </div>
                        </div>
                        <div class="box2">
                            <div class="col-xs-1 offset-1">
                                <div class="floating digit">
                                    <h5>Found a funny meme?</h5>
                                </div>
                            </div>
                        </div>
                        <div class="box3">
                            <div class="col-xs-1 offset-1">
                                <div class="floating digit">
                                    <h5>At the coolest event?</h5>
                                </div>
                            </div>
                        </div>
                        <div class="box4">
                            <div class="col-xs-1 offset-1">
                                <div class="floating digit">
                                    <h5>Looking for love?</h5>
                                </div>
                            </div>
                        </div>
                        <div class="box5">
                            <div class="col-xs-1 offset-1">
                                <div class="floating digit">
                                    <h5>Bored of your other social media apps?</h5>
                                </div>
                            </div>
                        </div>
                        <br />

                        <div class="col-xs-1">
                            <div class="blurb lead">
                                <p>Don't stress, Tweeter's got it all. Join today so you can see the new opportunites that await!</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>



    <section>
        <div class="coffee jumbotron jumbotron-fluid">

            <video autoplay muted loop>
                <source src="" data-src="/images/coffeeShop.mp4" type="video/mp4">
                </video>

                <div class="container">
                    <h2 class="display-4">No More #FOMO </h2>
                    <h4 class="lead">This is the new place to be - sign up today!</h4>
                </div>
                <!-- /.container -->
            </div>
            <!-- /.jumbotron -->
        </section>

        <div class="call parallax">
            <section id="phone">
                <div class="phone text-white">
                    <div class=" phone container" data-depth="0.8">
                        <h2 class="display-4">Creative. Simple. Fun!</h2>
                        <br class="my-4">
                        <h4 class="display-5">Tweeter understands people like you.</h4>
                        <br />
                        <p class="lead"> You want something
                            new and fresh, easy to navigate and fun to use.</p>
                            <p class="lead">We've got you covered, it all starts here. Just sign up
                                today and let the new adventure begin. </p>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="content">
                    <div class="title m-b-md">
                        <img src="/images/twitterlogo.png" class="logo" width="100" height="100" alt="navlogo">
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
                <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
                <script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
                <script src="{{asset('/js/main.js')}}"></script>




            </body>
            </html>
