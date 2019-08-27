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
        <div class="col-md-4">
            <div class="card profile-card-2">
                <div class="card-img-block">
                    <img class="img-fluid" src="https://images.pexels.com/photos/870903/pexels-photo-870903.jpeg?w=940&h=650&auto=compress&cs=tinysrgb" alt="Card image cap">
                </div>
                <div class="card-body pt-5">
                    <img src="/storage/images/{{ $user->profile->avatar }}" alt="profile-image" class="profile"/>
                    <h4 class="card-title"><a href="/users/profile/{{$user->id}}">{{$user->name}}</a></h4>
                    <h4 class="card-title">{{$user->profile->location}}</h4>
                    <h4 class="card-title">{{$user->profile->birthday}}</h4>
                    <h4 class="card-title">{{$user->profile->bio}}</h4>
                    <!-- <div class="icon-block"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"> <i class="fa fa-twitter"></i></a><a href="#"> <i class="fa fa-google-plus"></i></a></div> -->
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
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
<!-- <div class="col">
<h2>Connect with interesting people</h2>
<br>
<div class="row">
@foreach($users as $user)
@if(auth()->user()->id !== $user->id)
<div class="card">
<img class="card-img-top" src="/storage/images/{{ $user->profile->avatar }}" alt="Card image">
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
</div> -->
