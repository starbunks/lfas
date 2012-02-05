<?php defined('SYSPATH') or die('No direct script access.');

class Service_Breadcrumb {


	/**
	* getHomePageLink
	*
	* @return html
	*/
	public static function build($city_name, $state_name, $zip_code) 
	{
		return self::getHomePageLink() . ' &gt ' . 
				self::getPageBreadCrumbUs() . ' &gt ' .
				self::getPageBreadCrumbState($state_name) . ' &gt ' .
				self::getPageBreadCrumbCity($city_name, $state_name, $zip_code) . ' &gt ' .
				self::getPageBreadCrumbZip($city_name, $state_name, $zip_code);
	}
	
	/**
	* getHomePageStateLink
	*
	* @return html
	*/
	public static function buildState($state_name) 
	{
		return self::getHomePageLink() . ' &gt ' . 
				self::getPageBreadCrumbUs() . ' &gt ' .
				self::getPageBreadCrumbState($state_name);
	}
	
	/**
	* getHomePageLink
	*
	* @return html
	*/
	public static function getHomePageLink() 
	{
		return '<a href="' . Service_Pageutility::getSiteUrl() . '" title="Looking For A Sitter Home" rel="bookmark">Home</a>';
	}


  /**
   * getPageBreadCrumbUs
   *
   * @return String html
   */
  	public static function getPageBreadCrumbUs() 
	{
    	return '<a href="' . Service_Pageutility::getApplicationUrl() . 
			'" title="Sitters Across the United States" rel="bookmark">United States</a>';  
  	}


  /**
   * getPageBreadCrumbState
   *
   * @param $state_name
   * @return String html
   */
  	public static function getPageBreadCrumbState($state_name) 
	{

    	return '<a href="' . Service_Pageutility::getApplicationUrl() . $state_name . '" title="Looking For A Sitter in ' . $state_name . '" rel="bookmark">' . ucfirst($state_name) . '</a>';  
  	}


	/**
	* getPageBreadCrumbCity
	*
	* @param $city_name
	* @param $state_name
	* @param $zip_name
	* @return String html
	*/
	public static function getPageBreadCrumbCity($city_name, $state_name, $zip_code, $with_zip=false) 
	{

		$link_title = 'Looking For A Sitter in ' . $city_name . ', ' . $state_name;
		$html_return_a = '<a href="' . 
									Service_Pageutility::getApplicationUrl() . 
									$city_name . '/' . 
									$state_name . '/' . 
									$zip_code . '"  title="' . $link_title . '" rel="bookmark">';

		if ($with_zip)
		{
			$html_return_b = ucfirst($city_name) . ' (' . $zip_code . ')</a>';  
		}
		else
		{
			$html_return_b = ucfirst($city_name) . '</a>';  
		}
		
		return $html_return_a . $html_return_b; 

 	}


	/**
	* getPageBreadCrumbZip
	*
	* @param $city_name
	* @param $state_name
	* @param $zip_name
	* @return String html
	*/
	public static function getPageBreadCrumbZip($city_name, $state_name, $zip_code) 
	{
		$link_title = 'Looking For A Sitter in ' . $city_name . ', ' . $state_name . '  ' . $zip_code;
		
    	return '<a href="' . Service_Pageutility::getApplicationUrl() . $city_name . '/' . 
											$state_name . '/' . 
											$zip_code . '" title="' . $link_title . '" rel="bookmark" >' . 	
											$zip_code . '</a>';  
 	}


}

?>