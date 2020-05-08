<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Smartphone extends Model
{
    use Notifiable;
    use Sortable;

    protected $fillable = [
    	'brand', 		
		'name', 		
		'year', 		
		'chipset', 		
		'mem_ram', 		
		'mem_int', 		
		'mem_exp_boolean', 		
		'display', 		
		'main_cam', 		
		'selfie_cam', 		
		'battery',	
		'price',
		'antutu'
	];
    protected $table = 'smartphones';
	public $sortable = ['brand', 'name', 'year', 'main_cam', 'battery', 'price'];

	public function advancedSearchQuery($input){
		// var_dump($input);
        return $this->whereIn('brand', $input['brand'])->
    				whereBetween('year', explode(',', $input['year']))->
    				whereIn('chipset', $input['chipset'])->
    				whereBetween('mem_ram', explode(',', $input['mem_ram']))->
    				whereBetween('mem_int', explode(',', $input['mem_int']))->
    				where('mem_exp_boolean', '=', "{$input['mem_exp_boolean']}")->
    				whereBetween('display', explode(',', $input['display']))->
    				whereBetween('main_cam', explode(',', $input['main_cam']))->
    				whereBetween('selfie_cam', explode(',', $input['selfie_cam']))->
    				whereBetween('battery', explode(',', $input['battery']))->
    				whereBetween('price', explode(',', $input['price']))->
    				orWhere('name', $input['name'])->paginate(8);
    }

}
