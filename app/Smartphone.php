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
	public $sortable = ['brand', 'name', 'year', 'main_cam', 'mem_int', 'price'];

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
	public function intermediateSearchQuery($input){
		// var_dump($input);
		switch ($input['performance']) {
			case 1:
				$performance = [0, 70000];
				break;
			case 2:
				$performance = [70000, 120000];
				break;
			case 3:
				$performance = [100000, 250000];
				break;
			case 4:
				$performance = [150000, 350000];
				break;
			case 5:
				$performance = [220000, 1000000];
				break;
		}
		switch ($input['camera']) {
			case 1:
				$camera = [5, 8];
				break;
			case 2:
				$camera = [8, 10];
				break;
			case 3:
				$camera = [8, 12];
				break;
			case 4:
				$camera = [12, 16];
				break;
			case 5:
				$camera = [16, 108];
				break;
		}
		switch ($input['battery']) {
			case 1:
				$battery = [0, 1200];
				break;
			case 2:
				$battery = [0, 2000];
				break;
			case 3:
				$battery = [2000, 4000];
				break;
			case 4:
				$battery = [3200, 4500];
				break;
			case 5:
				$battery = [4000, 6000];
				break;
		}
		switch ($input['memory']) {
			case 1:
				$memory = [0, 2];
				break;
			case 2:
				$memory = [0, 16];
				break;
			case 3:
				$memory = [16, 64];
				break;
			case 4:
				$memory = [32, 128];
				break;
			case 5:
				$memory = [64, 512];
				break;
		}
		return $this->whereBetween('antutu', $performance)->
				whereBetween('main_cam', $camera)->
				whereBetween('battery', $battery)->
				whereBetween('mem_int', $memory)->
				paginate(8);
    }
}
