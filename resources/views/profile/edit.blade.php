@extends('layout.main')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <form action="/users/profile/{{$profile->user->id}}" method="POST" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ $profile->user->name }}"/>
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" value="{{ $profile->location }}"/>
                    </div>
                    <div class="form-group">
                        <label for="birthday">Birthday</label>
                        <input type="text" name="birthday" class="form-control" value="{{ $profile->birthday }}"/>
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <input type="text" name="bio" class="form-control" value="{{ $profile->bio }}"/>
                    </div>
                    <div class="form-group">
                        <label for="image">Image (only .jpg)</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Account</button>
                    @csrf
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
