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
        return $this->whereIn('brand', $input['brand'])->
        				orWhere('name', '=', "{$input['name']}")->
        				where('year', '=', "{$input['year']}")->
        				where('chipset', '=', "{$input['chipset']}")->
        				where('mem_ram', '=', "{$input['mem_ram']}")->
        				where('mem_int', '=', "{$input['mem_int']}")->
        				where('mem_exp_boolean', '=', "{$input['mem_exp_boolean']}")->
        				where('display', '=', "{$input['display']}")->
        				where('main_cam', '=', "{$input['main_cam']}")->
        				where('selfie_cam', '=', "{$input['selfie_cam']}")->
        				where('battery', '=', "{$input['battery']}")->
        				where('price', '=', "{$input['price']}")->
        				where('antutu', '=', "{$input['antutu']}")->paginate(5);
    }

}
