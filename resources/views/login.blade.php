@extends('layouts.main')

@section('title', 'Login')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($notFound))
<div class="alert alert-danger">
        <ul>
            {{$notFound}}
        </ul>
    </div>
@endif
    <div class="text-center">
    <form class="form-signin" method="post" action='/login'>
        @csrf
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
        <label>
            <a href="{{route('register')}}">REGISTER NEW USER</a>
        </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2021</p>
</form>

    </div> 

@endsection

