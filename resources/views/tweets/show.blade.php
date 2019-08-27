@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @include('tweets._tweet')
            <br />
            <div class="col-12 offset-11">
                <a href="/tweets/" class="btn btn-primary">back</a>
            </div>
            <br />
        </div>
    </div>
</div>
@endsection
