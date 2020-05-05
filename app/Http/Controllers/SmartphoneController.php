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
    $smartphones = DB::table('smartphones')->paginate(8);
		return view('smartphones.list', ['smartphones' => $smartphones]);
	}  
	public function form(){
    $smartphones = Smartphone::get();
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
        $output .= '</ol>';
        $ldata = [$data,$output];
        return $ldata;
      }
    }
}
