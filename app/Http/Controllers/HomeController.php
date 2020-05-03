<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Smartphone;


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
    public function beginnerSearch(){
        return view('home.beginner');
    }
    public function intermediateSearch(){
        return view('home.intermediate');
    }
    public function advancedSearch(Request $request){
        
        $brand = $request->input('brand');
        $name = $request->input('name');
        $year = $request->input('year');
        $chipset = $request->input('chipset');
        $mem_ram = $request->input('mem_ram');
        $mem_int = $request->input('mem_int');
        $mem_exp_boolean = $request->input('mem_exp_boolean');
        $display = $request->input('display');
        $main_cam = $request->input('main_cam');
        $selfie_cam = $request->input('selfie_cam');
        $battery = $request->input('battery');
        $price = $request->input('price');
        $antutu = $request->input('antutu');

        $data = Smartphone::where('brand', 'LIKE', "%{$brand}%")->get();

        return view('smartphones.list');
    }
}
