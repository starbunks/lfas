<?php defined('SYSPATH') or die('No direct script access.');

class Factory_Sittercity {

	/**
	* <<caretype>> may be one of: (childcare, petcare, seniorcare, homecare, tutoring)
	* 
	* z 	= zip
	* ps 	= page size (default is 10. max is 25)
	* p		= page number (default is first page)
	* so	= sort order (1 default highly ranked, 3 closest ASC, 4 furthest DESC)
	*
	* 	Facets
	* has_car 		= 'Y' 
	* pet_friendly 	= 'Y' 
	* non_smoker 	= 'Y' 
	* bgc 			= 'Y' 
	* photo 		= 'Y' 
	* reviews 		= 'Y' 
	* r 			= 3, 4, 5 (number of stars) 
	* exp 			= 1, 3, 5 (years of experience) 
	* rate 			= <X>-<Y>/Hour where X = Y - 10 and Y is in (10, 20, 30, 40, 50) 
	* edu 			= 'h', 'c', 'g' for 'highschool', 'college', and 'graduate' respectively.
	* 
	* search_distance	= 50 (default/max)
	*
	*/
	
	private static $sittercity;
	private static $a_location = array();
	private static $a_valid_qs = array();
	private static $base_url;
		
	const AMPERSAND = '&';
	
	protected $a_valid_query_strings = array('z', 				// zip code
											'ps', 				//page size
											'p', 				//page number
											'so', 	//sort order 1 (caregiver rank desc), 3 (sort by distance, asc),  4 (sort by distance, desc)
											'has_car', 			//Y, N
											'pet_friendly', 	//Y, N
											'non_smoker',		//Y, N
											'bgc',				//Y, N
											'reviews',			//Y, N
											);

	protected $a_facet_query_strings = array(
											'has_car', 			//Y, N
											'pet_friendly', 	//Y, N
											'non_smoker',		//Y, N
											'bgc',				//Y, N
											'reviews',			//Y, N
											);

	protected $a_query_strings_stars = array('r' => array(3, 4, 5));
	
	protected $a_query_strings_experience = array('exp' => array(1, 3, 5));

	protected $a_query_strings_education = array('edu' => array('h', 'c', 'g'));

	protected $a_query_strings_name = array(
											'z'				=> 'Zip Code',
											'ps'			=> 'Page Size',
											'p' 			=> 'Page Number',
											'so' 			=> 'Sort Order',
											'p' 			=> 'Page Number',
											'has_car' 		=> 'Has Car',
											'pet_friendly'	=> 'Pet Friendly',
											'non_smoker'	=> 'Non Smoker',
											'bgc'			=> 'Background Checked',
											'reviews'		=> 'Has Reviews',
											'r'				=> 'Rate',
											'exp'			=> 'Years Experience',
											'rate'			=> 'Rate Range',
											'edu'			=> 'Education',
											'r'				=> 'Number of Stars',
											'exp'			=> 'Years of Experience',
											'edu'			=> 'Education',
											);


	/**
	* factory
	*
	**/
	public static function factory()
	{
		if (self::$sittercity == NULL)
		{
			self::$sittercity = new Factory_Sittercity;
		}

		return self::$sittercity;
	}


	/**
	* setLocation
	*
	**/
	public function setLocation($a_location)
	{
		self::$a_location = $a_location;
		self::$base_url = Service_Pageutility::getApplicationUrl() 
										. $a_location['city'] . '/' 
										. $a_location['state'] . '/' 
										. $a_location['zip'];
	}
	
	
	/**
	* getValidQueryString
	*
	**/
	public function getValidQueryString()
	{
		return $this->a_valid_query_strings;
	}


	/**
	* validateQueryString
	*
	*	@param array of query strings
	**/
	public function validateQueryString($a_query_strings)
	{	
		$a_flip_valid_query_strings = array_flip($this->a_valid_query_strings);
		$array_intersect_key = array_intersect_key($a_query_strings, $a_flip_valid_query_strings);
		self::$a_valid_qs = $array_intersect_key;
//		$this->a_valid_qs = $array_intersect_key;
		
		return $array_intersect_key;
	}


	/**
	*	getBuildUrl - Build the API URL
	*	
	*	@param array of query strings, int page sizes
	*/
	public function getBuildUrl($a_query_strings, $page_size=10) 
	{
		$qs = '';

//		foreach ($a_query_strings as $x => $y)
		foreach (self::$a_valid_qs as $x => $y)
		{
			$qs .= self::AMPERSAND . $x . '=' . $y;
		}
		
		// has photo, page size is 10 and searh order is closet
		$qs .= self::AMPERSAND . 'photo=Y' . self::AMPERSAND . 'ps=' . $page_size . self::AMPERSAND . 'so=3';
		
		$qs_trimmed = substr($qs,1);
		return 'http://api.sittercity.com/childcare/caregiver?' . $qs_trimmed;
	}

	

	public function buildSearchOptionsFacets($a_location, $a_query_strings)
	{
		//Create Selected Query Strings
		$selected_qs = '';
		$a_query_strings_flipped = array();
		$i = 0;
		
		foreach ($a_query_strings as $x => $y)
		{
			if ($x != 'z')
			{
				$selected_qs .= '&' . $x . '=' . $y;
				//Flip Query String
				$a_query_strings_flipped[$i] =$x;
				$i++;
			}
		}
		
		$base_url = self::$base_url;
		
		$qs = '';
		$a_facet_url = array();
	
		// Build html for the view
		$html_facet = array();
		$html_facet_on = '';
		$html_facet_off = '';
		
		foreach ($this->a_facet_query_strings as $x => $y)
		{
			$url_on = $base_url . '?' .  $y . '=y' . $selected_qs;
			
			if (!in_array($y, $a_query_strings_flipped))
			{
				$html_facet_on .= '<li><a href="' . $url_on . '" rel="nofollow">' . $this->a_query_strings_name[$y] . '</a></li>';			
			}
			else
			{
				if ($y != 'z')
				{
					$url_off = $base_url . $this->buildQueryString($y, $a_query_strings);
					$html_facet_off .= '<li><a href="' . $url_off . '" rel="nofollow" class="facet-off">' . $this->a_query_strings_name[$y] . '</a></li>';
				}
			}
		}
		
		$html_facet['on'] = $html_facet_on;
		$html_facet['off'] = $html_facet_off;
		
		return $html_facet;
	}



	public function buildQueryString($key_to_remove, $a_selected)
	{	
		$return = '';
		$connector = '?';
		
		foreach ($a_selected as $x => $y)
		{
//			echo '<br />'.$x;
			if ($x != $key_to_remove)
			{
				if (in_array($x, $this->a_facet_query_strings))
				{	
//					echo '   ---> added [' . $x . ']<br />';
					$return .= $connector . $x . '=' . $y;
				}
				$connector = ($connector == '?') ? '&': '&';
			}			
		}
//					echo '<br /> '. $return. '<hr>';
		return $return;
	}
	

	/**
	 * getPaginationList
	 *
	 * @param int $current_page
	 * @param int $results_count
	 * @param String $zip_code
	 * @return String html
	 */
	public function getPaginationList($a_location, $a_query_strings, $current_page=1, $results_count,  $results_per_page=25, $page_set_size=5) 
	{
		//Create Base URL and Query Strings
		$query_strings = '';
		foreach ($a_query_strings as $x => $y)
		{
			if ($x != 'p')
			{
				$query_strings .= '&' . $x . '=' . $y;
			}
		}
		
		$base_url = self::$base_url . '?next=Y' . $query_strings;
		 
	    $total_number_of_pages = floor($results_count / $results_per_page);

	    $set = floor($current_page / $page_set_size);

	    $set_begin = $set * $page_set_size;
	    $set_end   = $set * $page_set_size + $page_set_size;

	    if ($set==0) {
	      $set_begin = 1;
	    }

	//    echo '<p> Set [' . $set . ']</p>';
	//    echo '<p> Page Set Size [' . $page_set_size . ']</p>';
	//    echo '<p> Set Begin [' . $set_begin . ']</p>';
	//    echo '<p> Set End [' . $set_end . ']</p>';
	//    echo '<p> Total_number_of_pages [' . $total_number_of_pages . ']</p>';

	    // page query string
	    $page_query_string = '&p=';    
		$pagination = '';
		$a_page_list = Array();
		
	    if ($current_page == $total_number_of_pages) 
		{
			$set_end = $total_number_of_pages - 1;
	      	$pagination .= '<a href="' . $base_url . $page_query_string . $set_end . '">&#060; Previous </a>';
	    }
	    else 
		{
			for ($i=$set_begin; $i<=$set_end; $i++) 
			{
	        	if ($i <= $total_number_of_pages) 
				{
		          $a_page_list[] = $i;
		        }
			}

			$last = count($a_page_list);

	      	foreach ($a_page_list as $key => $value) 
			{

		        if ($value == $current_page) 
				{
					$pagination .= '<a href="" class="current_page">' . $value . '</a>';
		        }
		        elseif (($last == $key + 1 ) && ($total_number_of_pages > $set_end)) 
				{
		          $pagination .= '<a href="' . $base_url . $page_query_string . $value . '">  Next &#062;</a>';
		        }
		        else 
				{
		          $pagination .= '<a href="' . $base_url . $page_query_string . $value . '">' . $value . '</a>';
		          $pagination .= '&#124';
		        }

			} // End foreach

			if ($set > 0) 
			{
				$value = $set_begin - 1;
		        $pagination = '<a href="' . $base_url . $page_query_string . $value . '">&#060; Previous </a>' . $pagination;
			}

	    } // End else

	    $html_return = '<div id="pagination">' . $pagination . '</div>';

	    return $html_return;
	  }


	/**
 	* getHtml
	*
	* @param XML DOM $dom
	* @return String HTML
	*/
	public function getHtml($dom) 
	{
    	$count = 1;
		$html = '';
		$node_total = count($dom->Caregivers->Caregiver);

	    foreach ( $dom->Caregivers->Caregiver as $caregiver ) 
		{

			// cgpu - CareGiver Profile URL
			$cgpu_wo_http = str_replace('http://', '', $caregiver->ProfileUrl);
			// used for nanny
			$cgpu = str_replace('babysitters', 'nanny', $cgpu_wo_http);

			// If comment is empty than do not display
			// Comment is description
			$test_copy = $caregiver->Comment;
			
			// Remove separtor if item is last
			$hr = ($count == $node_total) ? '' : '<hr>';


			if (strlen($test_copy) == 0) 
			{
			continue;
			}

			$html .= '<li class="sitterlist">
                <div class="result_item">
                  <div class="avtar">
                    <a href="http://www.shareasale.com/r.cfm?b=65638&u=283736&m=10994&urllink=' .
					$cgpu_wo_http . '&afftrack=" class="avtar_cont">
                      <div class="img_cont">
                        <img src="' . $caregiver->PhotoUrl . '" />
                      </div>
                    </a>
                  </div>
                  <div class="result_detail">
                    <div class="result_detail_middle">
                      <div class="result_detail_cont">
                        <a href="http://www.shareasale.com/r.cfm?b=65638&u=283736&m=10994&urllink=' .
						$cgpu_wo_http . '&afftrack="  
 						class="result_name">' . $caregiver->Name . '</a>
                        <p>' . $test_copy . '</p>
                      </div>
                    </div>
                    <div class="result_detail_right"></div>
                  </div>
                </div> <!--avtar-->'
				. $hr . 
              '</li>  <!--result_item-->';
			$count++;
			
		} // END foreach
		
		return $html;
	}

} // End