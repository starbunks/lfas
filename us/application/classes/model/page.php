<?php

class Model_Page extends ORM
{
	
	protected $_table_name = 'page';
	
	public function rules()
	{
		return array(
		
			'title' => array(
						array('not_empty')
							)
		
		);
	}
	
}

?>