@extends('layout.main')

    @section('content')
        <div class="container">
            <div class="flash-message">
                @if (Session::has('message'))
                    <p>{{ Session('message') }}</p>
                @endif
            </div>
            <form action="/tweets" method="POST">
                @csrf
                <div class="form-group">
                    <textarea name="body" class="form-control" placeholder="What's on your mind..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tweet</button>
        </form>
    </div>
@endsection
