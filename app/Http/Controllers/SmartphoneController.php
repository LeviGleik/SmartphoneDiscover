<?php

namespace App\Http\Controllers;

use App\Smartphone;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;


class SmartphoneController extends Controller
{
	public function index(){
    $smartphones = DB::table('smartphones')->orderBy('name')->paginate(10);
		return view('smartphones.list', ['smartphones' => $smartphones]);
	}  
	public function form(){
    $smartphones = Smartphone::get();
    $chipset = ['a13' => 'Apple A13 Bionic', 'a12z' => 'Apple A12Z Bionic', 'a12x' => 'Apple A12X Bionic', 'a12' => 'Apple A12 Bionic', 'a11' => 'Apple A11 Bionic', 'a10x' => 'Apple A10X Fusion', 'a10' => 'Apple A10 Fusion','a9x' => 'Apple A9X',  'a9' => 'Apple A9', 's865' => 'Snapdragon 865', 's855p' => 'Snapdragon 855+', 's855' => 'Snapdragon 855', 's845' => 'Snapdragon 845', 's835' => 'Snapdragon 835', 's821' => 'Snapdragon 821', 's820' => 'Snapdragon 820', 's765g' => 'Snapdragon 765G', 's730g' => 'Snapdragon 730G', 's730' => 'Snapdragon 730', 's712' => 'Snapdragon 712', 's710' => 'Snapdragon 710', 's675' => 'Snapdragon 675', 's670' => 'Snapdragon 670', 's665' => 'Snapdragon 665', 's660' => 'Snapdragon 660', 's652' => 'Snapdragon 652', 's650' => 'Snapdragon 650', 's636' => 'Snapdragon 636', 's630' => 'Snapdragon 630', 's625' => 'Snapdragon 625', 's450' => 'Snapdragon 450', 's439' => 'Snapdragon 439', 's435' => 'Snapdragon 435', 's430' => 'Snapdragon 430', 's425' => 'Snapdragon 425', 'e9825' => 'Exynos 9825', 'e9820' => 'Exynos 9820', 'e9810' => 'Exynos 9810', 'e9611' => 'Exynos 9611', 'e9610' => 'Exynos 9610', 'e8895' => 'Exynos 8895', 'e8890' => 'Exynos 8890', 'e7904' => 'Exynos 7904', 'e7884' => 'Exynos 7884', 'e7870' => 'Exynos 7870', 'e7580' => 'Exynos 7580', 'e7420' => 'Exynos 7420', 'hx25' => 'Helio X25', 'hx20' => 'Helio X20', 'hx10' => 'Helio X10', 'hg90t' => 'Helio G90T', 'hp70' => 'Helio P70', 'hp65' => 'Helio P65','hp60' => 'Helio P60', 'hp25' => 'Helio P25', 'hp23' => 'Helio P23', 'hp20' => 'Helio P20', 'hp10' => 'Helio P10', 'k990' => 'Kirin 990', 'k980' => 'Kirin 980', 'k970' => 'Kirin 970', 'k960' => 'Kirin 960', 'k659' => 'Kirin 659'];
		return view('smartphones.form', ['smartphones' => $smartphones]);
	}
	public function save(Request $request){
		$smartphone = new Smartphone();
		if($request['mem_exp_boolean'] != true){
			$request['mem_exp_boolean'] = (!isset($request['mem_exp_boolean']))? false : true;
		}
		$val = $request->validate(['brand' => 'required|string|max:32', 		
			'name' => 'required|string|max:32', 		
			'year' => 'required|integer|min:2015|max:2020', 		
			'chipset' => 'required|string|max:64', 		
			'mem_ram' => 'required|integer|min:0|max:16', 		
			'mem_int' => 'required|integer|min:0|max:512', 		
			'mem_exp_boolean' => 'required', 		
			'display' => 'required|regex:/^\d+(\.\d{1,2})?$/', 		
			'main_cam' => 'required|integer|required', 		
			'selfie_cam' => 'required|integer|required', 		
			'battery' => 'required|integer|min:100|max:6000',
			'price' => 'integer',
			'antutu' => 'integer'
		]);
		$smartphone->create(['brand' => $request['brand'], 		
			'name' => $request['name'], 		
			'year' => $request['year'], 		
			'chipset' => $request['chipset'], 		
			'mem_ram' => $request['mem_ram'], 		
			'mem_int' => $request['mem_int'], 		
			'mem_exp_boolean' => $request['mem_exp_boolean'], 		
			'display' => $request['display'], 		
			'main_cam' => $request['main_cam'], 		
			'selfie_cam' => $request['selfie_cam'], 		
			'battery' => $request['battery'], 		
			'price' => $request['price'],
			'antutu' => $request['antutu']
		]);
		print(var_dump($request->all()));
    	\Session::flash('msg_success', 'Smartphone successfully registered.');

		return redirect('smartphones/form');

	}
	public function register(Request $request){
        $this->validator($request->all())->validate();
    }
    public function view($id){
    	$smartphone = Smartphone::FindOrFail($id);
      return view('smartphones/form', ['smartphones' => $smartphone]);
    }
    public function edit($id){
      $smartphone = Smartphone::FindOrFail($id);
      return view('smartphones/form', ['smartphones' => $smartphone]);
    }
    public function update($id, Request $request){
  		$request['mem_exp_boolean'] = (!isset($request['mem_exp_boolean']))? false : true;
      $smartphone = Smartphone::FindOrFail($id);
      $smartphone->update($request->all());
      \Session::flash('msg_update', 'Smartphone updated successfully.');
      return Redirect::to('smartphones/'.$smartphone->id.'/edit');
    }
    public function delete($id){
      \Session::flash('msg_deleted', 'Smartphone deleted successfully.');
      $smartphone = Smartphone::FindOrFail($id);
      $smartphone->delete();
      return Redirect::to('smartphones');
    }
    public function fetch(Request $request){
      if($request->get('query')){
        $query = $request->get('query');
        $data = DB::table('smartphones')
          ->where('name', 'LIKE', "%{$query}%")
          ->get();
        $output = '<ol class="dropdown-menu" style="display:block; position:relative">';
        $i = 0;
        foreach($data as $row){
          $output .= '
          <li value="'.$i.'" id="'.$row->id.'"><a class="dropdown-item" href="#">'.$row->name.'&nbsp;'.$row->mem_int.'&nbsp;GB'.'</a></li>
          ';
          $i++;
        } 
        $output .= '</ol><br />';
        $ldata = [$data,$output];
        return $ldata;
      }
    }
}
