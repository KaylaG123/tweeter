@extends('layout.main')

        @section('content')
            <div class="container">
                <form action="/tweets/{{ $tweet->id }}" method="POST">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                        <textarea name="body" class="form-control" value="body">{{ $tweet->body }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-dark">Save Changes</button>
                </form>
            </div>
        @endsection
