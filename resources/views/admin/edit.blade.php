@extends('layouts.web')

@section('title')
    Submission
@endsection

@section('content')
<div class="row flex-grow">
    <div class="col-lg-6 mx-auto">
      <div class="auth-form-light text-left p-5">
        <div class="card">
            <div class="card-title"></div>
            <div class="card-body">
                @foreach ($submissions as $item)
                <form class="" method="POST" action="{{ route('submission.admin.update',$item->id) }}">
                    @csrf

              
                <div class="form-group row">
                    <div class="col-sm-12">
                        <label for="">Title</label>
                        <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $item->title }}" required autocomplete="name" autofocus>
                    </div>
                </div>
                <div class="form-group row">  
                    <div class="col-sm-12">
                        <label for="">Supervisor</label>
                        <select name="supervisor" id="supervisor" class="form-control form-control-lg" aria-placeholder="Supervisor">
                            @foreach ($supervisors as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                
                            @endforeach
                        </select>
                    </div>
                </div>
                @endforeach
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                        {{ __(' Add Supervisor') }}
                    </button>
                </div>
              </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection