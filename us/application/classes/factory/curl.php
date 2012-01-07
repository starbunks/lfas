<?php defined('SYSPATH') or die('No direct script access.');

class Factory_Curl {

	//protected $curl_url = "http://api.sittercity.com/childcare/caregiver?z=60610&ps=25";
	protected $curl_url;


	public function setCurlUrl($url) 
	{
		$this->curl_url = $url;
	}

	public function getCurlUrl() 
	{
		return $this->curl_url;
	}


	/*
	* @return false if errors else xml
	*/
	public function getCurlData() 
	{
		libxml_use_internal_errors(true);
		$xml = new SimpleXmlElement($this->getCurl($this->getCurlUrl()), LIBXML_NOCDATA);
		$a_xml_errors = libxml_get_errors();

		if (count($a_xml_errors) == 0) 
		{
			return $xml;
		}
		else 
		{
			libxml_clear_errors();
			return 'false';
		}
	}


	/**
	* getCurl
	*
	* @param String $curl_url
	* @return curl output
	*/
	public function getCurl($curl_url) 
	{
		// create a new cURL resource
		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, $curl_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_TIMEOUT, 5); 
		curl_setopt($ch, CURLOPT_HEADER, 0);

		// grab URL and pass it to the browser
		curl_exec($ch);
		$server_output = curl_exec($ch);

		// close cURL resource, and free up system resources
		curl_close($ch);
		return $server_output;
	}

	
	
	
} // End