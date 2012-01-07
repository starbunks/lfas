<?php defined('SYSPATH') OR die('No Direct Script Access');
 
Class Controller_welcome extends Controller_Template
{
	public $template = 'site';
	
    public function action_index()
    {
        $this->template->message = 'mother do you think they will drop the bomb';
    }
}