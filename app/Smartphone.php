<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Smartphone extends Model
{
    use Notifiable;

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
		'battery'
	];
}
