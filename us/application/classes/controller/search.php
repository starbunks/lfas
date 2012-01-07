<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Search extends Controller {

	
    public function action_index()
    {
		$zip_code = $this->request->param('zip');
//		echo '<br />Zip Code [' . $zip_code . ']';
		$this->handle_zip($zip_code);
    }

	public function action_query()
	{
		$zip_code = $this->request->query('zip');
//		echo '<br />Zip Code [' . $zip_code . ']';
		$this->handle_zip($zip_code);
	}

	public function handle_zip($zip_code)
	{
		if (Factory_Zip::isZip($zip_code))
		{
			$query = Factory_Zip::getZipByZipCode($zip_code);
			$results = $query->execute();
			

			foreach($results as $zip)
			{
				$zip_code = $zip['zip_code'];
				$city_name = $zip['city_name'] ;
				$state_name = $zip['state_name'];
				//echo '<br /> Zip [' . $zip['zip_code'] . '] City ['. $zip['city_name'] . '] state [' . $zip['state_name'] .']';
			}

			
			$path = str_replace(' ', '-', strtolower($city_name . '/' . $state_name . '/' . $zip_code));
//			echo '<br />path [' . $path . ']';
			Request::current()->redirect('/' . $path);
		}
		else
		{
//			echo '<br />Redirect';
			Request::current()->redirect('/');
		}
	}

} // End Controller_Search
