<?php defined('SYSPATH') or die('No direct script access.');

class Controller_State extends Controller {

	
    public function action_index()
    {
		$state_name = $this->request->param('state');
		
		$html_city_list = '<ul id="citylist">';
		$found_state_name = Factory_State::isState($state_name);
		if ($found_state_name)
		{
			$query = Factory_State::getZipByState($found_state_name, 'zip_code');
			$results = $query->execute();
			
			foreach($results as $zip)
			{
				$html_city_list .= '<li>' .
									Service_Breadcrumb::getPageBreadCrumbCity($zip['city_name'], 
																			$state_name, 
																			$zip['zip_code'], TRUE) .
									'</li>';										
			}
		}
		else
		{
			Request::current()->redirect('/');
		}
		
		$html_city_list .= '</ul>';
		
		$v = View::factory('default');
		//$v->page_name = "Conrollor:State->action_index";
		$v->tagline = Service_Pageutility::getTageline('', $found_state_name);
		$v->page_h1 = Service_Breadcrumb::getPageBreadCrumbState($found_state_name);
		$v->page_breadcrumb = Service_Breadcrumb::buildState($found_state_name);
		$v->state_list = $html_city_list;
		
		$this->response->body($v);
		
    }

	
	/**
	*	action_city
	*	
	*	URL: /us/state
	*	@param state_name
	*   @return list of cities for the given state
	*
	*/
	public function action_city()
	{
		$page_number = 1;
		
		$city_name = $this->request->param('city');
		$state_name = $this->request->param('state');
		$zip_code = $this->request->param('zip');
		
		$a_location['city'] = $city_name;
		$a_location['state'] = $state_name;
		$a_location['zip'] = $zip_code;
			
		if (Factory_Zip::isZip($zip_code))
		{
			// get the query strings
			$a_qs = Kohana_Request::current()->query();

			// add the zip_code to the query string
			$a_qs['z'] = $zip_code;

			// set the page number
			if (array_key_exists("p", $a_qs))
			{
				$page_number = $a_qs['p'];
			}
			
			// set location
			Factory_Sittercity::factory()->setLocation($a_location);
			
			// validate the query string
			$a_valid_qs = Factory_Sittercity::factory()->validateQueryString($a_qs);
			
			// build the curl url
			$valid_url = Factory_Sittercity::factory()->getBuildUrl($a_valid_qs, 3);

//			$xml = simplexml_load_string(Factory_Sittercity::factory()->getTestData());

			$curl = new Factory_Curl();
			$curl->setCurlUrl($valid_url);
			$xml = $curl->getCurlData();

			
			// Sitter Data
			$html_sitter_data = Factory_Sittercity::factory()->getHtml($xml);

			// Pagination
			$sitter_count = $xml->TotalResults;
			$html_pagination = Factory_Sittercity::factory()->getPaginationList($a_location, $a_valid_qs, $page_number, $sitter_count);
			
			//echo $html_pagination;
			
			//Search facets
			$html_facet = Factory_Sittercity::factory()->buildSearchOptionsFacets($a_location, $a_valid_qs);
			
			//View
			$v = View::factory('sitter_results');
			$v->page_name = "Conrollor:State->action_list_city_page";

			$v->tagline = Service_Pageutility::getTageline($city_name, $state_name);
			$v->page_count = Service_Pageutility::getSitterCount($xml, $city_name, $state_name, $zip_code);
			$v->page_h1 = Service_Pageutility::getSitterPageTitle($city_name, $state_name, $zip_code);
			$v->page_breadcrumb = Service_Breadcrumb::build($city_name, $state_name, $zip_code);
			$v->html_facet_on = $html_facet['on'];
			$v->html_facet_off = $html_facet['off'];
			$v->state_list = $html_sitter_data;
			$v->pagination = $html_pagination;

			$this->response->body($v);
		}
		else
		{
			Request::current()->redirect('/' . $state_name);
		}
	}



	/**
	*	action_list
	*	
	*	URL: /us/
	*   @return list of states
	*
	*/
	public function action_list()
	{	
		$query = Factory_State::getStates();
		$results = $query->execute();
		$state_list = '';
		
		$results_count = count($results);
		$set = 0;
		$n = 0;
		$column_count = $results_count / 3;
		
		foreach($results as $state)
		{
			$state_list .= '<li><a href="' . url::base() . $state['state_url'] . '">' . $state['state_name'] . '</a></li>';
			
		    $a_state_list[$set][$state['id']]['state_name'] = $state['state_name'];
		    $a_state_list[$set][$state['id']]['state_url'] = url::base() . $state['state_url'];
			
			$n++;
			if ($n > $column_count)
			{
				$n = 0;
				$set++;
			}
		}

		
		$state_list = '<ul>' . $state_list . '</ul>';
		
		$v = View::factory('state');
		$v->page_name = "Conrollor:State->action_list";
		$v->page_body = $a_state_list;
		$v->tagline = "Helping Parents Find Child Care";
		$v->page_h1 = 'Babysitters Across the U.S.';
		$v->page_breadcrumb = Service_Breadcrumb::getHomePageLink() . ' &gt ' . Service_Breadcrumb::getPageBreadCrumbUs();
		$this->response->body($v);
	}

} // End State
