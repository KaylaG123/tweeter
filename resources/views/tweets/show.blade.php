@extends('layout.main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @include('tweets._tweet')
            <br />
            <a href="/tweets/" class="btn btn-primary">back</a>
        </div>
    </div>
</div>
@endsection
