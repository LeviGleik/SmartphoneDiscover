<?php

namespace App\Http\Controllers;

use App\Smartphone;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SmartphoneController extends Controller
{
	public function index(){
        $smartphones = Smartphone::get();
        $smartphones = Smartphone::sortable()->paginate(10);
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
        var_dump($request->all());

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
			'battery' => 'required|integer|min:100|max:6000'
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
			'battery' => $request['battery']
		]);
		
    	\Session::flash('msg_success', 'Smartphone successfully registered.');

		return redirect('smartphones/form');

	}
	public function register(Request $request){
        $this->validator($request->all())->validate();
    }
    public function edit($id){

        $smartphone = Smartphone::FindOrFail($id);
        return view('smartphones/form', ['smartphones' => $smartphone]);
    }
    public function update($id, Request $request){

		$request['mem_exp_boolean'] = (!isset($request['mem_exp_boolean']))? false : true;
        \Session::flash('msg_update', 'Smartphone updated successfully.');
        $smartphone = Smartphone::FindOrFail($id);
        $smartphone->update($request->all());
        return Redirect::to('smartphones/'.$smartphone->id.'/edit');
    }
    public function delete($id){
        \Session::flash('msg_deleted', 'Smartphone deleted successfully.');
        $smartphone = Smartphone::FindOrFail($id);
        $smartphone->delete();
        return Redirect::to('smartphones');
    }
}
