<?php defined('SYSPATH') or die('No direct script access.');

class Service_Pageutility {

	public static function getGlobal()
	{
		$siteurl = 'http://localhost:8888/lfas.32/';
		return $siteurl;
	}
	
	public static function getTageline($city_name='', $state_name)
	{
		$pre_tagline = "Helping Parents Find Child Care in ";
		
		if ($city_name == '')
		{
			$tagline = $pre_tagline . ucfirst($state_name);
		}
		else
		{
			$tagline = $pre_tagline . ucfirst($city_name) . ', ' . ucfirst($state_name);
		}
		
		return $tagline;
		
	}
	
	public static function getSitterCount($dom, $city_name, $state_name, $zip_code)
	{
		//41,350 Babysitters Found in 60645
		
		$total_results = number_format(intval($dom->TotalResults));
		$copy = ' Found';

		return $total_results . $copy;
	}
	
	public static function getSitterPageTitle($city_name, $state_name, $zip_code)
	{
		//Babysitters in <city> <state> <zip>
		$copy = ' Babysitters in ';
		$location = ucfirst($city_name) . ', ' . ucfirst($state_name) . ' ' . $zip_code;

		return $copy . $location;
	}
	
	/**
	* 
	* getSiteUrl - removes the 'us' from the URL::base() function
	*
	**/
	public static function getSiteUrl()
	{
		$base_url = URL::base();
		return trim($base_url, 'us/');
	}
	
	public static function getFooterCityList()
	{
		$base_url = URL::base();
		$html_footer = 
		'<li><a href="' . $base_url . 'atlanta/georgia/30361" title="Link to Atlanta">Atlanta</a></li>
		<li><a href="' . $base_url . 'austin/texas/78703" title="Link to Austin">Austin</a></li>
		<li><a href="' . $base_url . 'boston/massachusetts/02119" title="Link to Boston">Boston</a></li>
		<li><a href="' . $base_url . 'charlotte/north-carolina/28204" title="Link to Charlotte">Charlotte</a></li>
		<li><a href="' . $base_url . 'chicago/illinois/60622" title="Link to Chicago">Chicago</a></li>
		<li><a href="' . $base_url . 'cleveland/ohio/44127" title="Link to Cleveland">Cleveland</a></li>
		<li><a href="' . $base_url . 'columbus/ohio/43201" title="Link to Columbus">Columbus</a></li>
		<li><a href="' . $base_url . 'dallas/texas/75205" title="Link to Dallas">Dallas</a></li>
		<li><a href="' . $base_url . 'denver/coloardo/80238" title="Link to Denver">Denver</a></li>
		<li><a href="' . $base_url . 'detroit/michigan/48206" title="Link to Detroit">Detroit</a></li>
		<li><a href="' . $base_url . 'fort-worth/texas/76102" title="Link to Fort Worth">Fort Worth</a></li>
		<li><a href="' . $base_url . 'hartford/connecticut/06105" title="Link to Hartford">Hartford</a></li>
		<li><a href="' . $base_url . 'houston/texas/77056" title="Link to Houston">Houston</a></li>
		<li><a href="' . $base_url . 'indianapolis/indiana/46202" title="Link to Indianapolis">Indianapolis</a></li>
		<li><a href="' . $base_url . 'los-angeles/california/90018" title="Link to Los Angeles">Los Angeles</a></li>
		<li><a href="' . $base_url . 'madison/wisconsin/53715" title="Link to Madison">Madison</a></li>
		<li><a href="' . $base_url . 'miami/florida/33144" title="Link to Miami">Miami</a></li>
		<li><a href="' . $base_url . 'milwaukee/wisconsin/53205" title="Link to Milwaukee">Milwaukee</a></li>
		<li><a href="' . $base_url . 'minneapolis/innesota/55411" title="Link to Minneapolis">Minneapolis</a></li>
		<li><a href="' . $base_url . 'new-york/new-york/10055" title="Link to New York">New York</a></li>
		<li><a href="' . $base_url . 'orlando/florida/32806" title="Link to Orlando">Orlando</a></li>
		<li><a href="' . $base_url . 'philadelphia/pennsylvania/10055" title="Link to Philadelphia">Philadelphia</a></li>
		<li><a href="' . $base_url . 'phoenix/arizona/85012" title="Link to Phoenix">Phoenix</a></li>
		<li><a href="' . $base_url . 'pittsburgh/pennsylvania/15219" title="Link to Pittsburgh">Pittsburgh</a></li>
		<li><a href="' . $base_url . 'portland/oregon/97204" title="Link to Portland">Portland</a></li>
		<li><a href="' . $base_url . 'providence/rhode-island/02903" title="Link to Providence">Providence</a></li>
		<li><a href="' . $base_url . 'sacramento/california/95817" title="Link to Sacramento">Sacramento</a></li>
		<li><a href="' . $base_url . 'san-diego/california/92123" title="Link to San Diego">San Diego</a></li>
		<li><a href="' . $base_url . 'san-francisco/california/94117" title="Link to San Francisco">San Francisco</a></li>
		<li><a href="' . $base_url . 'seattle/ashington/98102" title="Link to Seattle">Seattle</a></li>
		<li><a href="' . $base_url . 'saint-louis/issouri/63105" title="Link to Saint Louis">Saint Louis</a></li>
		<li><a href="' . $base_url . 'tampa/florida/33604" title="Link to Tampa">Tampa</a></li>
		<li><a href="' . $base_url . 'raleigh/north-carolina/27608" title="Link to Raleigh">Raleigh</a></li>
		<li><a href="' . $base_url . 'washington/district-of-columbia/20005" title="Link to Washington">Washington</a></li>
		<li><a href="' . $base_url . '"><b>All United States</b></a></li>';
		
		return $html_footer;
	}
	
	public static function getZipSearchForm() 
	{
		$html_form = '<form method="get" id="searchform" action="' . URL::base() . 'search">'  .
			'<label for="zip" class="">Find babysitters, nannies near you</label>
			<input type="text" class="field" name="zip" id="zip" placeholder="in your ZIP code" />
			<input type="submit" class="submit" name="submit" id="searchsubmitzip" value="Search" />
		</form>';

		return $html_form;
	}
	
	public static function getMainMenu()
	{
		$base_url = self::getGlobal();

		$html_menu = '<div class="menu"><ul>
		<li class="current_page_item"><a href="' . $base_url . '" title="Home">Home</a></li>
		<li class="page_item page-item-2"><a href="' . $base_url . '?page_id=2" title="About">About</a></li>
		<li class="page_item page-item-26"><a href="' . $base_url . '?page_id=26" title="Babysitting">Babysitting</a>
			<ul class="children">
			<li class="page_item page-item-24"><a href="' . $base_url . '?page_id=24" title="Babysitter Rates">Babysitter Rates</a></li>
			</ul>
		</li>
		<li class="page_item page-item-105"><a href="' . $base_url . '?page_id=105" title="Site Maps">Site Maps</a></li>
		<li class="page_item page-item-7"><a href="' . $base_url . '?page_id=7" title="Sitter Search">Sitter Search</a></li>
		<li class="page_item page-item-12"><a href="' . $base_url . '?page_id=12" title="Sitters By States">Sitters By States</a></li>
		<li class="page_item page-item-135"><a href="' . $base_url . '?page_id=135" title="Sittercity">Sittercity</a></li>
		</ul></div><!-- menu -->';

		return $html_menu;
	}
	
}
?>