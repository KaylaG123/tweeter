@extends('layout.main')


@section('content')

<h1>{{$tweet->body}}</h1>
<hr />
    <h2>Comment</h2>
    <form action="/comments" method="POST">
        @csrf
        <div class="form-group">
            <textarea name="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <a class="btn btn-primary" href="#addGif" data-toggle="collapse">Add GIF
                <!--<i class="fa fa-camera"></i>Photo-->
            </a>

            <div id="addGif" class="collapse">
                <gif-search></gif-search>
            </div>
        </div>
        <div class="col-10 offset-10">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Add comment</button>
            </div>
        </div>


        <!-- <div class="form-group">
            <button type="submit" class="btn btn-primary">Add GIF</button>
            <input type="hidden" name="giphy" />
        </div> -->

        <input type="hidden" name="tweet_id" value="{{ $tweet_id }}" />
    </form>

@endsection
