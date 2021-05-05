<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $this->role = Auth::user()->getRoleNames()->first();
            
          
            switch ($this->role) {
                case 'user':
                    return redirect()->intended(route('dashboard.users'));
                    break;
                case 'supervisor':
                    return redirect()->intended(route('dashboard.supervisor'));
                    break;
                case 'admin':
                    return redirect()->intended(route('dashboard.admin'));
                    break;
                 
            }
                   
        }
        $error = ['error' => 'Email atau password tidak sesuai'];
        return redirect()->back()->withInput()->with($error);
    }
}
