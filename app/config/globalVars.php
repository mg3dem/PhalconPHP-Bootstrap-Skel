<?php

$globalVars = array(
	'db' => array(
		'host'							=> 'localhost',
		'username'						=> 'dbuser',
		'password'						=> 'dbpass',
		'dbname'						=> 'table_name'
	),
	'cache' => array(
		'TTL'							=> 86400,
		'prefix'						=> 'RB'
	),
	'appBaseURI'						=> '/',
	'volt' => array(
		'path'							=> '../volt/cache/',
		'extension' 					=> '.compiled'
	)
);

$config = new \Phalcon\Config($globalVars);