@extends('layout.main')

@section('content')

    <h1>Edit comment</h1>

    <form action="/comments/{{ $comment->id }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-group">
            <textarea name="body" class="form-control">{{ $comment->body }}</textarea>
            <img src="{{ $comment->gif }}" alt=" "/>
        </div>
        <div class="form-group">
            <a class="btn btn-primary" href="#addGif" data-toggle="collapse">Change GIF
                <!--<i class="fa fa-camera"></i>Photo-->
            </a>

            <div id="addGif" class="collapse">
                <gif-search></gif-search>
            </div>
        </div>
        <div class="col-10 offset-10">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save comment</button>
            </div>
        </div>
    </form>

@endsection
