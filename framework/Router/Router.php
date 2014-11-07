<?php

namespace Framework\Router;
use Framework\DI\Registry;

class Router
{
    private $registry;
    private $path;
    private $args = array();

    function __construct($registry)
    {
        $this->registry = $registry;
    }


    public function findRoute()
    {
        var_dump(Registry::get('routers'));
    }



}