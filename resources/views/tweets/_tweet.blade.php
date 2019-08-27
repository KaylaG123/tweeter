<article>
    <div class="list-group-item">
        <div class="row">
            <div class="col">
                <h1 class="body">
                    <div><a href="/users/profile/{{$tweet->user->id}}">{{$tweet->user->name}}</a></div>
                <h1>
                <a href="/tweets/{{ $tweet->id }}">{{ $tweet->body }}</a>
                <div>
                    @foreach($tweet->comments as $comment)
                        @include('comments._comment')
                    @endforeach
                </div>

                <div class="row">
                    <div>
                        <a href="/comments/create/{{ $tweet->id }}"><i class="fas fa-comment"></i></a>
                    </div>
                    <a href="/tweets/{{ $tweet->id }}/like" class="btn btn-link">Like</a>
                    ({{ $tweet->likes()->count() }})
                    @if(Auth::id() == $tweet->user_id)
                </div>
                <div class="col">
                    <a href="/tweets/{{ $tweet->id }}/edit"><i class="far fa-edit"></i></a>
                </div>
                @endif
            </div>

             @if(Auth::id() == $tweet->user_id)

            <div class="col-2 d-flex align-items-center justify-content-end">
                <form action="/tweets/{{ $tweet->id }}" method="POST" class="form-inline">
                    @csrf
                    {{ method_field('DELETE') }}
                    <button type="submit" class="close">&times;</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</article>
