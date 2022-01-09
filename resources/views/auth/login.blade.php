@extends('layouts.first')
@section('content')
<div>&nbsp;</div>

<div class="appHeader">
        <div class="left">
            <a href="javascript:;" class="icon goBack">
                <i class="icon ion-ios-arrow-back"></i>
            </a>
        </div>
        
        <div class="pageTitle">Login</div>
        @guest
        @if (Route::has('register'))<div class="right">
     
            <a href="{{ route('register') }}" class="link">Register</a>
        </div>
        @endif
                        @endguest
    </div>
  
 <!-- searchBox -->
    
    <!-- * searchBox -->
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="searchBox">
        <form>
            <span class="inputIcon">
                <i class="icon ion-ios-search"></i>
            </span>
            <input type="text" class="form-control" id="searchInput" placeholder="Search...">
            <a href="javascript:;" class="toggleSearchbox closeButton">
                <i class="icon ion-ios-close-circle"></i>
            </a>
        </form>
    </div>
     <!-- searchBox -->
    
    <!-- * searchBox -->
    <!-- * App Header -->

    <!-- App Capsule -->

<div id="appCapsule">

<div class="appContent">


<div class="sectionTitle text-center mt-3">
    <div class="title">
        <h1>Welcome to Jaago</h1>
    </div>
    <div class="lead mb-2">Sign in to continue</div>
</div>


<form method="POST" action="{{ route('login') }}">
@csrf
    <div class="form-group">
        <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="E-mail Address" required autofocus>
        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <div class="form-group">
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">
        
        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
    </div>
    <div class="form-group row mt-3 mb-3">
        <div class="col-6">
            <div class="form-check mb-1">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>
        </div>
        <div class="col-6 text-end">
        @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
            @endif
        </div>
    </div>
    <div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">
            Sign in
        </button>
    </div>
</form>


</div>
</div>

@endsection
