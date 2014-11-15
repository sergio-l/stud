<?php

namespace Framework;

use Framework\DI\Registry;
use Framework\Router\Router;
use Framework\Request\Request;

/* Main class Application
 *
 */

final class Application
{

    /*Installation configuration for application
     *@param string $config
     */
    public function __construct($config)
    {
        $config = include($config);
        Registry::set('config',$config);
        Registry::set('routes',$config['routes']);


    }

    /*
     * Run application
     * @return void
     */
    public function run()
    {

    }




}
