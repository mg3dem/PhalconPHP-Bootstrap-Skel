<?php

class GlobalRoutes extends \Phalcon\Mvc\Router\Group
{
	 public function initialize()
	 {
	 	// Default route so Phalcon doesn't complain
	 	$this->add('/', array('controller'=>'index', 'action'=>'index'));
	 }
}