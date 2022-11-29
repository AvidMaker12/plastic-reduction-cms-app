<?php

namespace App\Http\Controllers;

use App\Models\User;
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
     * Show the client/user's dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function userHome(User $user)
    {
        // if(Auth::user()->id == $user->id) {
        //     $pageTitle = 'EcoLife Plastic Waste Reduction App';
        //     // return view('welcome', compact('pageTitle'));
        //     // return view('welcome')->with('pageTitle', $pageTitle);
        //    return view('home',['users' => $user]);
        // }

        return view('home');
    }

    public function adminHome()
    {
        return view('console.dashboard');
    }
}
