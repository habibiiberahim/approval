<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Services\Submission\ListSubmission;
use App\Http\Controllers\Services\Submission\CreateSubmission;


class SupervisorController extends Controller
{
    //
    public function index(ListSubmission $submission)
    {
        $submissions = $submission->getByIdSupervisor(Auth::user()->id, 10);
        return view('supervisor.index',compact('submissions'));
    }

    public function update(CreateSubmission $service, $id)
    {
        $submission = $service->updateStatus($id);
        return redirect()->route('dashboard.supervisor');
    }
}
