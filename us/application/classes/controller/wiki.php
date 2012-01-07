<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Wiki extends Controller {

	//public $template = 'site';
	
    public function action_index()
    {
       // $this->template->message = 'Wiki mother do you think they will drop the bomb';

        $message = 'STATE mother do you think they will drop the bomb';
	
		
		$v = View::factory('site');
		//$v->state = $state;
		$v->message = $message;
		
		
		$this->response->body($v);
    }
		

} // End Welcome
