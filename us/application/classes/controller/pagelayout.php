<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Pagelayout extends Controller {

   
	/*
	 *
	 */
    public function before()
    {
        parent::before();

        // Make $page_title available to all views
        View::bind_global('page_title', $this->page_title);
        View::bind_global('footer_header', $this->footer_header);
        View::bind_global('footer_city_list', $this->footer_city_list);
        View::bind_global('footer_last_list', $this->footer_last_list);


		// set footer
		$this->footer_header = 'Find Caregivers in Your City';
		$this->footer_city_list = Model_Pagelayout::buildFooterCityHtml();
		$this->footer_last_list = Model_Pagelayout::buildFooterLastHtml();
    }

} // End Controller_Pagelayout
