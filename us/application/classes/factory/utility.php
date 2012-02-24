<?php defined('SYSPATH') or die('No direct script access.');

class Factory_Utility {

	static function getSiteUrl()
	{
		$i = 0;
		$query = DB::select()->from('lfas_options')->where('option_name', '=', 'siteurl');
//echo '<br /> $i: '.$i. ' - ' . $query .'<br />';
		$results = $query->execute();

		$siteurl = '';
		foreach($results as $wp_options)
		{
			$siteurl = $wp_options['option_value'];
			$i++;
		}
//echo '<br /> $i: '. $i . ' - site url [' . $siteurl . ']';
		return $siteurl;
	}
	
} // End
