<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    public function login(Request $request){
        $input = $request->all(); // Take all login form request data.
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))) { // If auth attempt is true then successful login.
            if(auth()->user()->is_admin == 1){
                return redirect()->route('admin.home'); // Route name from web.php
            }else {
                return redirect()->route('user.home'); // Redirect to user dashboard 'home' page instead of admin console if the user is not an admin.
            }
        }else {
            return redirect()->route('login')->with('error','Incorrect email and password combination.');
        }
    }
}
