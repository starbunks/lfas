<?php defined('SYSPATH') or die('No direct script access.');

class Model_Pagelayout {

	protected $footer_html = '';
	
	public $page_title;
	
	/**
	* __construct
	*
	*/
	function __construct() {

	}

	/*
	 *
	 */
	static public function buildFooterCityHtml() {

		$results = Factory_State::getFooterCity();
		$li = '';
		
		foreach($results as $city)
		{
			$li .= '<li><a href="' . 
				Service_Pageutility::getApplicationUrl() . 
				$city['value'] . 
				'" title="' . $city['name'] . 
				'">' . 
				$city['name']  . 
				'</a></li>';
				
			//$a_city[$city['id']]['name'] = $city['name'];
			//$a_city[$city['id']]['value'] = $city['value']
			
		}
		return '<ul>' . $li . '</ul>';
	}	


	/*
	 *
	 */
	static public function buildFooterLastHtml() 
	{

		$results = Factory_State::getFooterLast();

		$li = '';
		
		foreach($results as $list)
		{
			$li .= '<li><a href="' . 
				Service_Pageutility::getApplicationUrl() . 
				$list['post_name'] . 
				'" title="' . $list['post_title'] . 
				'">' . 
				$list['post_title']  . 
				'</a></li>';
			
		}
		return '<ul>' . $li . '</ul>';
	}
		
} // End