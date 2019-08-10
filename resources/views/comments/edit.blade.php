@extends('layout.main')

@section('content')

    <h1>Edit comment</h1>

    <form action="/comments/{{ $comment->id }}" method="POST">
        {{ method_field('PUT') }}
        @csrf
        <div class="form-group">
            <textarea name="body" class="form-control">{{ $comment->body }}</textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save comment</button>
        </div>
    </form>

@endsection
