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
            <button type="submit" class="btn btn-primary">Add comment</button>
        </div>

        <input type="hidden" name="tweet_id" value="{{ $tweet_id }}" />
    </form>

@endsection
