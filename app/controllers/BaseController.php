<?php

class BaseController extends \Phalcon\Mvc\Controller
{
	public function onConstruct()
	{
		$this->assets
			->addCss('//fonts.googleapis.com/css?family=Open+Sans:400,700,300', false)
			->addCss('//fonts.googleapis.com/css?family=Roboto:400,300,700', false)
			->addCss('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', false)
			->addCss('//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', false)
			->addCss('css/style.css');
        $this->assets
        	->addJs('//code.jquery.com/jquery-1.11.0.min.js', false)
        	->addJs('//code.jquery.com/jquery-migrate-1.2.1.min.js', false)
        	->addJs('//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', false)
        	->addJs('js/app.js');
	}
}