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
        $display = $request->input('display');
        $main_cam = $request->input('main_cam');
        $selfie_cam = $request->input('selfie_cam');
        $battery = $request->input('battery');
        $price = $request->input('price');
        $antutu = $request->input('antutu');
        if($request->input('mem_exp_boolean') != true){
            $mem_exp_boolean = (null !==($request->input('mem_exp_boolean')))? 0 : 1;
        }
        $data = DB::table('smartphones')->where('brand', '=', "{$brand}")
                ->where('name', '=', "{$name}")
                ->where('year', '=', "{$year}")
                ->where('chipset', '=', "{$chipset}")
                ->where('mem_ram', '=', "{$mem_ram}")
                ->where('mem_int', '=', "{$mem_int}")
                ->where('mem_exp_boolean', '=', "{$mem_exp_boolean}")->get();
        return view('smartphones.list', ['smartphones' => $data]);
    }
}
