<?php defined('SYSPATH') or die('No direct script access.');

class Factory_State {

	static function isState($state_name)
	{
		$query = DB::select()->from('state')->where('state_url', 'LIKE', $state_name);

		$results = $query->execute();
		$found = FALSE;
		foreach($results as $state)
		{
		    //$found = TRUE;
			// Need to return the state name without the hyphen
			$found = $state['state_name'];
		}
		return $found;
	}
	
	static function getZipByState($state_name, $order_by='city_name', $order_direction='ASC')
	{
		return DB::select()->from('zip_info_state')->where('state_name', 'LIKE', '%'.$state_name.'%')->order_by($order_by, $order_direction);
	}

	static function getStates()
	{
		return DB::select()->from('state')->order_by('state_name', 'ASC');
	}
	
	static function getCityFooter()
	{
		$zip_list = "'30361','78703', '02119', '28204', '60622', '44127', '43201', '75205', '80238', '48206', '76102', '06105', '77056', '46202', '90018', '53715', '33144', '53205', '55411', '10055', '32806',  '10055', '85012', '15219', '97204', '02903', '95817', '92123',  '94117', '98102', '63105', '33604', '27608', '20005'";
		
		return DB::select()->from('zip_info_state')->where('zip_code', 'IN', $zip_list)->order_by($order_by, $city_name);

	}
	
	
} // End