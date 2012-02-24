<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Website extends Controller_Template {

    public $page_title;

    public function before()
    {
        parent::before();

        // Make $page_title available to all views
        View::bind_global('page_title', $this->page_title);

    }

}

} // End Controller_Website
