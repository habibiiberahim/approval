<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Services\Submission\ListSubmission;
use App\Http\Controllers\Services\Submission\CreateSubmission;
use App\Http\Requests\UpdateSubmissionRequest;

class AdminController extends Controller
{
    //
    public function index(ListSubmission $submission)
    {
        $submissions = $submission->getByStatus('Waiting',10);
        return view('admin.index',compact('submissions'));
    }

    public function edit(ListSubmission $submission, $id)
    {
        $submissions = $submission->getByid($id);
        $supervisors = $submission->UserByRole('supervisor');
        return view('admin.edit',compact('submissions','supervisors'));
    }
    public function update(CreateSubmission $service, UpdateSubmissionRequest $request, $id)
    {
        $submission = $service->setData($request)->update($id);
        return redirect()->route('dashboard.admin');
    }


}
