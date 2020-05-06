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
		var_dump($input);
        return $this->whereIn('brand', $input['brand'])->
    				whereIn('year', explode(',', $input['year']))->
    				whereIn('chipset', explode(',', $input['chipset']))->
    				whereIn('mem_ram', explode(',', $input['mem_ram']))->
    				whereIn('mem_int', explode(',', $input['mem_int']))->
    				where('mem_exp_boolean', '=', "{$input['mem_exp_boolean']}")->
    				whereIn('display', explode(',', $input['display']))->
    				whereIn('main_cam', explode(',', $input['main_cam']))->
    				whereIn('selfie_cam', explode(',', $input['selfie_cam']))->
    				whereIn('battery', explode(',', $input['battery']))->
    				whereIn('price', explode(',', $input['price']))->
    				orWhere('name', $input['name'])->paginate(5);
    }

}
