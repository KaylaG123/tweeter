@extends('layout.main')

@section('content')
<div class="col">
    <h2 class="create">What's on your mind?
        <a href="/tweets/create" class="btn btn-primary">Tweet</a>
    </h2>
</div>

    @foreach ($tweets as $tweet)
        @include('tweets._tweet')
    @endforeach
    {{ $tweets->links() }}
@endsection
