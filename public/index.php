<?php 
use Phalcon\Loader,
    Phalcon\DI\FactoryDefault,
    Phalcon\Db\Adapter\Pdo\Mysql,
    Phalcon\Mvc\Model\MetaData\Apc as appCache,
    Phalcon\Session\Adapter\Files,
    Phalcon\Mvc\Url,
    Phalcon\Mvc\Router,
    Phalcon\Mvc\View,
    Phalcon\Mvc\View\Engine\Volt,
    Phalcon\Mvc\Application;

try {
    //Register an autoloader
    $loader = new Loader();
    $loader->registerDirs(array(
        '../app/controllers/',
        '../app/models/',
        '../app/config/'
    ))->register();

    //Create a DI
    $di = new FactoryDefault();
    require_once '../app/config/globalVars.php';
    
    //Setup the database service
    $di->set('db', function(){
        $db = new Mysql(array(
            'host'      => $config->db->host,
            'username'  => $config->db->username,
            'password'  => $config->db->password,
            'dbname'    => $config->db->dbname
        ));
        return $db;
    });

    // Setup Metadata
    $di['modelsMetadata'] = function() {
        $metaData = new appCache(array(
            "lifetime" => $config->cache->TTL,
            "prefix"   => $config->cache->prefix
        ));
        return $metaData;
    };

    // Setup Sessions
    $di['session'] = function() {
        $session = new Files();
        $session->start();
        return $session;
    };

    //Setup a base URI so that all generated URIs include the "tutorial" folder
    $di['url'] = function(){
        $url = new Url();
        $url->setBaseUri($config->appBaseURI);
        return $url;
    };

    $di['router'] = function(){
        $router = new Router();
        $router->mount(new GlobalRoutes());
        return $router;
    };

    //Setup the view component & VOLT
    $di['voltService'] = function($view, $di) {
        global $config;
        $volt = new Volt($view, $di);
        $volt->setOptions(array(
            'compiledPath'      => $config->volt->path,
            'compiledExtension' => $config->volt->extension
        ));
        return $volt;
    };

    $di['view'] = function(){
        $view = new View();
        $view->setViewsDir('../app/views/');
        $view->registerEngines(array('.volt' => 'voltService'));
        return $view;
    };

    //Handle the request
    $application = new Application($di);

    echo $application->handle()->getContent();

} catch(\Phalcon\Exception $e) {
     echo "PhalconException: ", $e->getMessage();
}