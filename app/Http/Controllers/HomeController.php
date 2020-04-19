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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.home');
    }
    public function beginner(){
        return view('home.beginner');
    }
    public function intermediate(){
        return view('home.intermediate');
    }
    public function advanced(){
        return view('home.advanced');
    }
}
