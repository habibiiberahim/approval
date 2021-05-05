@extends('layouts.web')

@section('title')
    Create Submission    
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">

        @if ($errors->any())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                <p></p>
            @endforeach
          </div>
        @endif
        <h4 class="card-title">New Submission</h4>
        <p class="card-description">  </p>
        <form  class="forms-sample" id="create-submission" action="{{ route('submission.store') }}" method="POST"enctype="multipart/form-data">
          @csrf
          <div class="form-group">
                <input placeholder="Title" name='title'type="text" class="form-control">
          </div>
          <div class="form-group">
            <input type="file" name="file[]" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload File: PDF. Size: < 10 MB">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
              </span>
            </div>
          </div>  
          <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection