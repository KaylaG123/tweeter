@extends('layout.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <img class="card-img-top" src="/storage/avatars/{{ $user->profile->avatar }}" alt="Card image">
                <div class="card-body">
                    <h4 class="card-title"><a href="/users/profile/{{$user->id}}">{{$user->name}}</a></h4>
                    <h4 class="card-title">{{$user->profile->location}}</h4>
                    <h4 class="card-title">{{$user->profile->birthday}}</h4>
                    <h4 class="card-title">{{$user->profile->bio}}</h4>
                    <p class="mb-2">
                        <h3>Following: <span class="badge badge-primary">{{ $user->followings()->get()->count() }}</span></h3>
                        <h3>Followers: <span class="badge badge-primary">{{ $user->followers()->get()->count() }}</span></h3>
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
                    @if(Auth::id() == $user->profile->user_id)
                    <a href="/users/profile/{{$user->id}}/edit" class="btn btn-dark">Edit Profile</a>
                    @endif
                </div>
            </div>
            <br />
            <div class="panel-body">
                <h2 class="create">What's on your mind?
                    <a href="/tweets/create" class="btn btn-primary">Tweet</a>
                </h2>
            </div>
            <br />
            <div>
                <h2>{{$user->name}}'s Latest Tweets:</h2>

                @foreach ($user->tweets as $tweet)
                <!-- <h2>{{ $tweet->user->name }}</h2>
                <h3>{{ $tweet->body }}</h4> -->
                    @include('tweets._tweet')
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
