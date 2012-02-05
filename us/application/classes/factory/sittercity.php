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
		
//	const HOMEURL = 'http://localhost:8888';
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
                    <a href="http://www.shareasale.com/r.cfm?b=65638&u=283736&m=10994&urllink=" class="avtar_cont">
                      <div class="img_cont">
                        <img src="' . $caregiver->PhotoUrl . '" />
                      </div>
                    </a>
                  </div>
                  <div class="result_detail">
                    <div class="result_detail_middle">
                      <div class="result_detail_cont">
                        <a href="http://www.shareasale.com/r.cfm?b=65638&u=283736&m=10994&urllink=" class="result_name">' . $caregiver->Name . '</a>
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
	
	
	public static function getTestData()
	{
$xml	 = <<< XML
<?xml version="1.0" encoding="UTF-8"?>
<SearchResults version="1.0"><TotalResults>28304</TotalResults><Caregivers>
<Caregiver><Name><![CDATA[Tierra N.]]></Name><Comment><![CDATA[I have over 6 years of experience in working as a nanny and baysitter. I absolutely love what I do because I adore children. This is one job that I can truely walk into with a smile on my face and go home feeling the same way every day. I have lots of fun working with...]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/2470347.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Chicago, IL 60645]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/24/29/26/3_m.png]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2011-10-14]]></LastLogin></Caregiver>
<Caregiver><Name><![CDATA[Jennifer S.]]></Name><Comment><![CDATA[I have years of nannying, babysitting, and tutoring experience. I was&nbsp;a 2nd grade classroom teacher for 4 years before I decided to do private lessons and nannying. I am really looking forward to working with your family!]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/1993546.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Chicago, IL 60645]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/20/32/54/6_m.png]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2011-10-07]]></LastLogin></Caregiver>
<Caregiver><Name><![CDATA[Erin F.]]></Name><Comment><![CDATA[About Erin…
I am a recent graduate from Nursing  School.  I love spending time with children and animals and am hoping that through nursing, I can combine both passions to serve the community. 
I have over 400+ hours of experience in the hospital setting, ranging...]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/2277200.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Chicago, IL 60645]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/22/12/47/5_m.png]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[2]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2011-10-15]]></LastLogin></Caregiver>
<Caregiver><Name><![CDATA[Lucia S.]]></Name><Comment><![CDATA[Hi! My name is Lucia Scottino. I recently graduated from DePaul  Universtiy in June, 2011 with a degree in Elementary Education. I am  currently student teaching first grade at Ogden Elementary, and will be  finished early November, 2011. Being an educator provides me...]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/870112.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Chicago, IL 60659]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/3/62/22/70_m.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2011-10-10]]></LastLogin></Caregiver>
<Caregiver><Name><![CDATA[susan f.]]></Name><Comment><![CDATA[I am looking for a part-time position on Thursdays &amp; Fridays and "Date Nights" as I am currently with a 9 month old baby-girl on Mondays, Tuesdays, &amp; Wednesdays. I have had experience with a now, 2 year old and he has started day-care . I am hoping to find a...]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/1641294.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Chicago, IL 60645]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/20/82/34/9_m.png]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2011-10-06]]></LastLogin></Caregiver>
<Caregiver><Name><![CDATA[Jennifer W.]]></Name><Comment><![CDATA[I am the oldest of 5 kids, and have worked with children for as long as I can remember - babysitting, helping with VBS and nursery at church, etc, and loved it. I completed a couple of classes in Early Childhood education (The Exceptional Child, and Play &amp; Creative...]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/1141153.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Evanston, IL 60202]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/1/10/21/24/5_m.jpg]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2011-10-14]]></LastLogin></Caregiver>
<Caregiver><Name><![CDATA[Kara M.]]></Name><Comment><![CDATA[Dear Future Family,
I wanted to share with you a few little&nbsp;pieces about me. I have lived in West Roger's Park for the last ten years. I have been working recently with children in very challenging situations and I am so excited to be going back to Nanny work. I...]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/1521903.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Chicago, IL 60645]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/1/13/21/24/9_m.jpg]]></PhotoUrl><FeedbackScore><![CDATA[0.0]]></FeedbackScore><FeedbackCount><![CDATA[0]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2011-10-07]]></LastLogin></Caregiver>
<Caregiver><Name><![CDATA[Ellen H.]]></Name><Comment><![CDATA[I am a warm, caring and responsible woman and babysitter.  I treat children with respect.  I have experience providing after school care for 2 different families, working with one family for 2 months and the other for a school year.  I also worked as a Special...]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/2276014.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Chicago, IL 60659]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/22/66/60/1_m.png]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[1]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2011-10-10]]></LastLogin></Caregiver>
<Caregiver><Name><![CDATA[rena h.]]></Name><Comment><![CDATA[Hi my name is Rena Herzfeld and I have loved babysitting for many many years. I started out as a mother's helper and now I am babysit/nanny for long hours. I am starting college on Aug. 19th, however I will only be in school until 11 on mondays and wednesdays and 12:30...]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/2404629.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Chicago, IL 60645]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/23/88/22/8_m.png]]></PhotoUrl><FeedbackScore><![CDATA[0.0]]></FeedbackScore><FeedbackCount><![CDATA[0]]></FeedbackCount><Distance><![CDATA[0]]></Distance><LastLogin><![CDATA[2011-10-15]]></LastLogin></Caregiver>
<Caregiver><Name><![CDATA[Melanie T.]]></Name><Comment><![CDATA[I am a college student looking to do what I love, which is work with children. I have about 8 years of experience and have babysat for many different people in my life. For example, I have babysat for a teacher of mine to people that I have found on websites just like...]]></Comment><ProfileUrl><![CDATA[http://www.sittercity.com/babysitters/zz/cityname/2025837.html]]></ProfileUrl><Subtitle><![CDATA[A Babysitter in Chicago, IL 60626]]></Subtitle><HasBackgroundCheck/><PhotoUrl><![CDATA[http://sittercity.cachefly.net/img/userphoto/20/50/05/1_m.png]]></PhotoUrl><FeedbackScore><![CDATA[5.0]]></FeedbackScore><FeedbackCount><![CDATA[2]]></FeedbackCount><Distance><![CDATA[2]]></Distance><LastLogin><![CDATA[2011-10-15]]></LastLogin></Caregiver>
</Caregivers>
</SearchResults>
XML;
		return $xml;
	}
	
} // End