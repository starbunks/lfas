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
	
	static function getFooterCity()
	{	
		$query =  DB::select()->from('name_value')->where('type', '=', 'city')->order_by('name');
		$results = $query->execute();
		return $results;
	}
	

	/**
	*	
	* select ID, post_name, post_title, guid  from lfas_posts where post_parent=0 and post_type='page';
	*/
	static function getFooterLast()
	{
		$a_select = array('ID','post_name','post_title', 'guid');

		$query =  DB::select_array($a_select)->from('lfas_posts')->where('post_type', '=', 'page')->and_where('post_parent', '=', '0');
		return $query->execute();
	}

	
} // End