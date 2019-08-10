<!--https://investmentnovel.com/how-to-create-follow-unfollow-functionality-in-laravel/-->
<!-- https://itsolutionstuff.com/post/laravel-5-follow-unfollow-system-exampleexample.html -->

@extends('layout.main')

@section('content')
    <div class="col">
    <h2>Connect with interesting people</h2>
    <br>
    <div class="row">
        @foreach($users as $user)
        @if(auth()->user()->id !== $user->id)
        <div class="card" style="width:250px">
            <img class="card-img-top" src="/images/{{ $user->profile->avatar }}" alt="Card image">
            <div class="card-body">
                <h4 class="card-title"><a href="/users/profile/{{$user->id}}">{{$user->name}}</a></h4>
                <h4 class="card-title">{{$user->profile->location}}</h4>
                <h4 class="card-title">{{$user->profile->birthday}}</h4>
                <h4 class="card-title">{{$user->profile->bio}}</h4>
                <h4 class="mb-2">
                    <h4>Following: <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></h4>
                    <h4>Followers: <span class="badge badge-primary">{{ $user->followers()->get()->count() }}</span></h4>
                </p>
                <button class="btn btn-primary follow"  data-id="{{ $user->id }}">
                    <strong>
                        @if(auth()->user()->isFollowing($user))
                        UnFollow
                        @else
                        Follow
                        @endif
                    </strong>
                </button>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
<div class="col-md-10">
    <div class="row justify-content-end">
        <a href="/tweets" class="btn btn-primary">Next</a>
    </div>
</div>
@endsection
