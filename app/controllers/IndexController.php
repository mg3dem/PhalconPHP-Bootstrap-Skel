<?php

class IndexController extends BaseController
{
	public function initialize()
	{
		
	}

	public function indexAction()
	{
		$this->view->setVars(array(
			'seoTitle' => 'Starter',
			'seoDescription' => '',
			'seoKeywords' => ''
		));
	}
}