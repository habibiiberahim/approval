<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Services\Submission\Listsubmission;
use App\Http\Controllers\Services\Submission\CreateSubmission;
use App\Http\Requests\StoreSubmissionRequest;

class SubmissionController extends Controller
{
    //CRUD SUBMISSION
    public function create()
    {
        return view('submission.create');
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param StoreSubmissionRequest $request
     * @param CreateSubmission $submission
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSubmission $service, StoreSubmissionRequest $request)
    {
        
        $submission = $service->setData($request)->store();
        return redirect()->route('submission.users');
    }

    public function download($nameFile)
    { 
        $path = storage_path('App/file/'.$nameFile);
        return response()->download($path, "download.pdf");
    }
    
}
