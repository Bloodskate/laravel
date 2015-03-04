<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */

	
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
$GLOBALS['groups'] = array(
		'group1' => 'Apple',
		'group2' => 'Ball',
		'group3' => 'Cat',
		'group4' => 'Dog',
		'group5' => 'Elephant'
);