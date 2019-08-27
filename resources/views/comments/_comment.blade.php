<div class="comment-card">
    <div class="card-body">
        <h3><a href="/users/profile/{{$comment->user->id}}">{{ $comment->user->name }}</a></h3><h5> {{ $comment->created_at->diffForHumans() }}</h5>

        <h4>{{ $comment->body }}</h4>

        @if($comment->gif)
            <img src="{{ $comment->gif }}" alt=" "/>
        @endif

        @if(Auth::id() == $comment->user_id)
        <hr />
        <a href="/comments/{{ $comment->id }}/edit" class="btn btn-info">Edit</a> |
        @endif

        @if(Auth::id() == $comment->user_id)
        <form action="/comments/{{ $comment->id }}" method="POST" class="d-inline">
            {{ method_field('DELETE') }}
            @csrf
            <button type="submit" class="btn btn-link">Delete</button>
        @endif

        </form>
    </div>
</div>
