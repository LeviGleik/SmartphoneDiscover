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
        $brand[1] = 'Apple';
        $brand[2] = 'LG';   
        $brand[3] = 'Motorola';
        $brand[4] = 'Samsung';
        return view('home.advanced', ['brand' => $brand]);
    }
    public function beginnerSearch(){
        return view('home.beginner');
    }
    public function intermediateSearch(){
        return view('home.intermediate');
    }
    public function advancedSearch(Request $request){
        $input = $request->all();
        $brand = [
            'apple' => '1',
            'lg' => '2',
            'motorola' => '3',
            'samsung' => '4'
        ];
        $test = [0 => '1', 1 => '4'];
        if(!isset($input['mem_exp_boolean'])){
            $input['mem_exp_boolean'] = 0;
        }else{
            $input['mem_exp_boolean'] = 1;
        }
        if(!isset($input['antutu']) || $input['antutu'] == null){
            $input['antutu'] = 0;
        }
        if(isset($input['brand'])){
            $input['brand'] = array_flip(array_intersect($brand, $input['brand']));
        }
        $smartphone = new Smartphone();
        

        \Session::put($input);
        $data = $smartphone->advancedSearchQuery($request->session()->all());
        return view('smartphones.list', ['smartphones' => $data]);
    }
}
