<?php defined('SYSPATH') or die('No direct script access.');

class Factory_Zip {

	static function isZip($zip_code)
	{
		$query = DB::select()->from('zips')->where('zip_code', '=', $zip_code);
		$results = $query->execute();
		$found = FALSE;
		foreach($results as $zip)
		{
		    $found = TRUE;
		}
		return $found;
	}
	
	static function getZipByZipCode($zip_code)
	{
		return DB::select()->from('zips')->where('zip_code', '=', $zip_code);
	}

	static function getZipByCityName($city_name)
	{
		return DB::select()->from('zips')->where('city_name', 'LIKE', '%'.$city_name.'%');
	}



} // End