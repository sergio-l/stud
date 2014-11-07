<?php

namespace Framework;

use Framework\DI\Registry;
use Framework\Router\Router;
use Framework\Request\Request;

final class Application
{

    public function __construct($config)
    {
       $config = include($config);
       Registry::set('config',$config);
       Registry::set('routes',$config['routes']);


    }

    public function run()
    {
        $r = new Router(Request::getURI());
        $r->findRoute();

    }

    public function getController($controller, $action, $params)
    {

    }




}