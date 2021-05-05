<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Services\Submission\ListSubmission;
use App\Models\Submission;

class UserController extends Controller
{
    public function index(ListSubmission $submission)
    {
        $submissions = $submission->getByUser(Auth::user()->id,5);
        return view('user.index',compact('submissions'));
       
    }

    public function invoice(ListSubmission $submission ,$id)
    {
        $submissions = $submission->getByid($id);
        return view('user.invoice',compact('submissions'));
       
    }


}
