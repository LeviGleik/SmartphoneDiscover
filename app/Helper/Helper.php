<?php
if (! function_exists('active_menu')) {
	function active_menu($currentRoute, $requestName) {
		if ($currentRoute == $requestName) {
			return 'color: #fff; background-color: #3490dc; border-color: #3490dc;';
		} else{
			return null;
		}
	}
}
?>