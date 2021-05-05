<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->role = Auth::user()->getRoleNames()->first();
            
        switch ($this->role) {
            case 'user':
                return redirect()->intended(route('dashboard.users'));
                break;
            case 'supervisor':
                return redirect()->intended(route('dashboard.supervisor'));
                break;
            default:
                return redirect()->intended(route('dashboard.admin'));
                break;
             
        }
    }
    
}
