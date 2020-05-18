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
        $brand = [
            'apple' => 'Apple',
            'lg' => 'LG',
            'motorola' => 'Motorola',
            'samsung' => 'Samsung'
        ];
        $chipset = ['a13' => 'Apple A13 Bionic', 'a12z' => 'Apple A12Z Bionic', 'a12x' => 'Apple A12X Bionic', 'a12' => 'Apple A12 Bionic', 'a11' => 'Apple A11 Bionic', 'a10x' => 'Apple A10X Fusion', 'a10' => 'Apple A10 Fusion','a9x' => 'Apple A9X',  'a9' => 'Apple A9', 's865' => 'Snapdragon 865', 's855p' => 'Snapdragon 855+', 's855' => 'Snapdragon 855', 's845' => 'Snapdragon 845', 's835' => 'Snapdragon 835', 's821' => 'Snapdragon 821', 's820' => 'Snapdragon 820', 's765g' => 'Snapdragon 765G', 's730g' => 'Snapdragon 730G', 's730' => 'Snapdragon 730', 's712' => 'Snapdragon 712', 's710' => 'Snapdragon 710', 's675' => 'Snapdragon 675', 's670' => 'Snapdragon 670', 's665' => 'Snapdragon 665', 's660' => 'Snapdragon 660', 's652' => 'Snapdragon 652', 's650' => 'Snapdragon 650', 's636' => 'Snapdragon 636', 's630' => 'Snapdragon 630', 's625' => 'Snapdragon 625', 's450' => 'Snapdragon 450', 's439' => 'Snapdragon 439', 's435' => 'Snapdragon 435', 's430' => 'Snapdragon 430', 's425' => 'Snapdragon 425', 'e980' => 'Exynos 980', 'e9825' => 'Exynos 9825', 'e9820' => 'Exynos 9820', 'e9810' => 'Exynos 9810', 'e9611' => 'Exynos 9611', 'e9610' => 'Exynos 9610', 'e8895' => 'Exynos 8895', 'e8890' => 'Exynos 8890', 'e7904' => 'Exynos 7904', 'e7884' => 'Exynos 7884', 'e7870' => 'Exynos 7870', 'e7580' => 'Exynos 7580', 'e7420' => 'Exynos 7420', 'hx25' => 'Helio X25', 'hx20' => 'Helio X20', 'hx10' => 'Helio X10', 'hg90t' => 'Helio G90T', 'hp70' => 'Helio P70', 'hp65' => 'Helio P65','hp60' => 'Helio P60', 'hp25' => 'Helio P25', 'hp23' => 'Helio P23', 'hp20' => 'Helio P20', 'hp10' => 'Helio P10', 'k990' => 'Kirin 990', 'k980' => 'Kirin 980', 'k970' => 'Kirin 970', 'k960' => 'Kirin 960', 'k659' => 'Kirin 659'];
        return view('home.advanced', ['brand' => $brand, 'chipset' => $chipset]);
    }
    public function beginnerSearch(Request $request){    
        $input = $request->all();    
        // if(!isset($input['check'])){
        //     $input['camera'] = 0;
        // }else{
        //     $input['camera'] = 1;
        // }
        $smartphone = new Smartphone();
        \Session::put($request->all());
        $data = $smartphone->beginnerSearchQuery($request->session()->all());
        return view('smartphones.list', ['smartphones' => $data]);
    }
    public function intermediateSearch(Request $request){
        $smartphone = new Smartphone();
        \Session::put($request->all());
        $data = $smartphone->intermediateSearchQuery($request->session()->all());
        return view('smartphones.list', ['smartphones' => $data]);
    }
    public function advancedSearch(Request $request){
        $input = $request->all();
        
        if(!isset($input['mem_exp_boolean'])){
            $input['mem_exp_boolean'] = 0;
        }else{
            $input['mem_exp_boolean'] = 1;
        }
        $smartphone = new Smartphone();
        $request->validate(['brand' => 'required', 'chipset' => 'required']);
        \Session::put($input);
        $data = $smartphone->advancedSearchQuery($request->session()->all());
        return view('smartphones.list', ['smartphones' => $data]);
    }
}
