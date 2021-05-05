@extends('layouts.web')

@section('title')
    Invoice
@endsection

@section('content')
<div class="row flex-grow">
    <div class="col-lg-6 mx-auto">
      <div class="auth-form-light text-left p-5">
        <div class="card">
            <div class="card-title"></div>
            @foreach ($submissions as $item)
  
                <div class="card-body">
                    <div class="form-group row"> 
                        <div class="col-sm-12 text-center" >
                            <label for="">Invoice</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="" class="">Title</label>
                            <input disabled placeholder="Name" id="name" type="text" class="form-control disabled @error('name') is-invalid @enderror" name="name" value="{{ $item->title }}" required autocomplete="name" autofocus>
                        </div>
                    </div>
                    <div class="form-group row">  
                        <div class="col-sm-12">
                            <label for="">Status</label>
                            <input disabled placeholder="example@uin-malang.ac.id" id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $item->status }}" required autocomplete="email">
                        </div>
                    </div>
                </div>
              </div>
            </div>          
            @endforeach
        </div>
      </div>
    </div>
  </div>
@endsection