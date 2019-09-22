<?php


// @param  string ;
// @param  array  ;
// @return mixed;




if (!function_exists('aurl')) {    //To make url(‘admin/’) dynamic
	function aurl($url = null) {
		return url('admin/'.$url);
	}
}

//////////////////////////////////////////////////////////////

if (!function_exists('admin')) {  //To make auth()->guard('admin') dynamic
	function admin() {
		return auth()->guard('admin');
	}
}





/////// Validate Helper Functions ///////
if (!function_exists('v_image')) {
	function v_image($ext = null) {
		if ($ext === null) {
			return 'image|mimes:jpg,jpeg,png,gif,bmp';
		} else {
			return 'image|mimes:'.$ext;
		}

	}
}
/////// Validate Helper Functions ///////


if (!function_exists('active_menu')) {
	function active_menu($link) {

		if (preg_match('/'.$link.'/i', Request::segment(2))) {
			return ['menu-open', 'display:block'];
		} else {
			return ['', ''];
		}
	}
}

//////////////////////////////////////////////////

?>