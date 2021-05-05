@extends('layouts.web')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">    
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
                            <th>File</th>
                            <th>Approve</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($submissions as $item)                                                
                            <tr>
                                <td>{{$loop->iteration}}</td> 
                                <td>{{$item->title}}</td> 
                                <td>{{$item->status}}</td> 
                                <td class="td-actions">
                                    <form action="{{route('submission.file' ,$item->file)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" rel="tooltip" title="Download" class="btn btn-primary btn-link btn-sm">
                                            <i class="mdi mdi-download menu-icon"></i>
                                        </button>
                                      </form>
                                </td>
                                <td class="td-actions">
                                    <form action="{{route('submission.supervisor.approve' ,$item->id)}}" method="post">
                                        @csrf
                                        @method('PUT')

                                        @if ($item->status === "Complete")
                                            <button type="submit" disabled  rel="tooltip" title="Approve" class="btn btn-primary btn-link btn-sm">
                                                <i class="mdi mdi-check menu-icon"></i>
                                            </button>
                                        @else
                                            <button type="submit" rel="tooltip" title="Approve" class="btn btn-primary btn-link btn-sm">
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