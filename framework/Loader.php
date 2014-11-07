<?php

/*
 * Loader class. Including classname for Framework
 * @author Sergiy Lytvyn
 */

final class Loader
{
    /*
     * @var Array
     */
    private static $_registry = array(0 => 'Framework');

    /*
     * Loader instance
     */
    private static $_instance = null;


    /*
     * Constructor autoloading
     * @return void
     */
    private function __construct()
    {
        spl_autoload_register(array(__CLASS__, 'load'));
    }

    /*
     * Clone.Ban cloning
     * @return void
     */
    private function __clone(){ }

    /*
     * Add namespace path
     * @param string $namespace
     * @param string $paths
     */
    public static function addNamespacePath($namespace,$paths)
    {
        self::$_registry[$namespace] = $paths;
    }

    /*
    * Get namespace path
    * @param string $namespace
    */
    public static function getNamespacePath($namespace)
    {
        return array_key_exists($namespace,self::$_registry) ? self::$_registry : '';
    }

    //TODO: подержка нейм.
    /*
     * Method loading class
     * @param sting $className
     */
    public static function load($className)
    {
        if (strpos($className, self::$_registry[0]) === 0)
        {
            include_once(__DIR__.'/Application.php');
            //require_once(__DIR__ . "\\" . ucfirst(str_replace(self::$_registry[0], "", $className)) . ".php");
        }
    }

    /*
    * Return singleton instance
    * @static
    * @return  self
    */
    public static function getInstance()
    {
        if (!(self::$_instance instanceOf self))
            self::$_instance = new self();
        return self::$_instance;
    }

}

Loader::getInstance();