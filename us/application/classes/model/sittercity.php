<?php defined('SYSPATH') or die('No direct script access.');

class Model_Sittercity {

	protected $base_url = "http://api.sittercity.com/childcare/caregiver";
	protected $zip = 0;
	protected $count = 25;
	
	const QUESTION_MARK = '?';
	const QS_ZIP = 'z=';
	const QS_COUNT = '&ps=';
	
	/*
	define('QUESTION_MARK', '?');
	define('QS_ZIP', 'z=');
	define('QS_COUNT', '&ps=');
	*/
	
	//    protected $curl_url;

	/**
	* __construct
	*
	*/
	function __construct() {

	}

	public function setZip($zip) {
		$this->zip = $zip;
	}

	public function getZip() {
		return $this->zip;
	}

	public function setCount($count) {
		$this->count = $count;
	}

	public function getCount() {
		return $this->count;
	}
	
	public function getBaseUrl() {
		return $this->base_url;
	}

	
	/*
	 *
	 */
	static public function getSittercityUrl($zip,$count=25) {
		self->setZip($zip);
		setCount($count);
		return getBuildUrl();
	}

	/*
	 *
	 */
	private function getBuildUrl() {
		return getBaseUrl() . getZip() .  getCount();
	}


	
	
	
} // End