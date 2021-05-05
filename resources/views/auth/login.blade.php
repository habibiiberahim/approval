@extends('layouts.app')

@section('title')
    LOGIN
@endsection

@section('content')
<div class="row flex-grow">
    <div class="col-lg-5 mx-auto">
      <div class="auth-form-light text-left p-5">
        
        @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
        @endforeach 
        
        <h4>Hello! let's get started</h4>
        <h6 class="font-weight-light">Login to continue.</h6>
        <form class="pt-3" method="POST" action="{{ route('login') }}">
            @csrf
           
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="form-group">
                 <input id="email" type="email" class=" form-control-lg form-control  @error('email') is-invalid @enderror form-control-lg"  placeholder="Email Address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror form-control-lg" placeholder="Password" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            </div>
            <div class="mt-3">
                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                    {{ __('LOGIN') }}
                </button>   
          </div>
          <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="{{ route('register') }}" class="text-primary">Create</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
