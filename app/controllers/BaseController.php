<?php

class BaseController extends \Phalcon\Mvc\Controller
{
	public function onConstruct()
	{
		$this->assets
			->collection('remoteStyles')
			->addCss('https://fonts.googleapis.com/css?family=Open+Sans:400,700,300', false)
			->addCss('https://fonts.googleapis.com/css?family=Roboto:400,300,700', false)
			->addCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', false)
			->addCss('https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css', false);
		$this->assets
			->collection('localStyles')
			->addCss('css/style.css')
			->setTargetPath('css/production.css')
			->setTargetUri('css/production.css')
			->join(true)
			->addFilter(new \Phalcon\Assets\Filters\Cssmin());

        $this->assets
        	->collection('remoteJs')
        	->addJs('https://code.jquery.com/jquery-1.11.0.min.js', false)
        	->addJs('https://code.jquery.com/jquery-migrate-1.2.1.min.js', false)
        	->addJs('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', false);
        $this->assets
        	->collection('localJs')
        	->addJs('js/app.js')
         	->setTargetPath('js/production.js')
			->setTargetUri('js/production.js')
			->join(true)
			->addFilter(new \Phalcon\Assets\Filters\Jsmin());
	}
}