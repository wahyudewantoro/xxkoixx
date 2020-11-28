<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
        // dd(Auth::user());
    }
}
