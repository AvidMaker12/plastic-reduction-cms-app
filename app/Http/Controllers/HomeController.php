<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $pageTitle = 'EcoLife Plastic Waste Reduction App';
        // return view('welcome', compact('pageTitle'));
        // return view('welcome')->with('pageTitle', $pageTitle);
        return view('home');
    }

    public function adminHome(){
        return view('console.dashboard');
    }
}
