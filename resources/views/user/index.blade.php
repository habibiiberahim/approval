@extends('layouts.web')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">    
            <div class="form-group">
                    <a href="{{ route('submission.create') }}" class="btn btn-gradient-primary mr-2" role="button" aria-pressed="true">New Submission</a>
            </div>
            <div class="form-group">
                <h4 class="card-title">Submission</h4>
            </div>
            <div class="form-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submissions as $item)              
                            <tr>
                                <td>{{$loop->iteration}}</td> 
                                <td>{{$item->title}}</td> 
                                <td>{{$item->status}}</td> 
                                <td class="td-actions">
                                    <form action="{{route('submission.user.invoice' ,$item->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        @if ($item->status === "Complete")
                                            <button type="submit" rel="tooltip" title="Show Invoice" class="btn btn-primary btn-link btn-sm">
                                                <i class="mdi mdi-check menu-icon"></i>
                                            </button>
                                        @else
                                            <button type="submit" disabled rel="tooltip" title="Show Invoice" class="btn btn-primary btn-link btn-sm">
                                                <i class="mdi mdi-check menu-icon"></i>
                                            </button>
                                        @endif

                                       
                                      </form>
                                </td>
                            </tr> 
                        @endforeach   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection