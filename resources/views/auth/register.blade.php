@extends('layouts.app')

@section('title')
  REGISTER
@endsection

@section('content')

<div class="row flex-grow">
    <div class="col-lg-6 mx-auto">
      <div class="auth-form-light text-left p-5">
        <h4>Create an Account?</h4>
        <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
        <div class="card">
            <div class="card-title"></div>
            <div class="card-body">
                <form class="" method="POST" action="{{ route('register') }}">
                    @csrf
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Name</label>
                        <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">  
                    <div class="col-sm-12">
                        <label for="">Email</label>
                        <input placeholder="example@sistem.com" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                     <div class="col-sm-6">
                        <label for="">Password</label>
                        <input placeholder="Minimum 8 Character" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <label for="">Confirm Password</label>
                        <input placeholder="Minimum 8 Character"  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        
                        @error('password-confirm')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                        {{ __(' REGISTER') }}
                    </button>
                </div>
                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="{{ route('login') }}" class="text-primary">Login</a>
              </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
