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
    private static $_registry = array('Framework' => __DIR__);

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
        if (!self::getNamespacePath($namespace)) {
            self::$_registry[$namespace] = $paths;
        }
    }

    /*
    * Get namespace path
    * @param string $namespace
    */
    private static function getNamespacePath($namespace)
    {
        return array_key_exists($namespace,self::$_registry) ? self::$_registry : '';
    }

    /*
     * Method loading class
     * @param sting $className
     */
    public static function load($className)
    {
        $file = self::getPaths($className);
        if ($file !== false && file_exists($file)) {
            $included = include($file);

            if (!$included && (!class_exists($className, false) || !interface_exists($className, false))){
                throw new Exception(sprintf('Class "%s" doesn\'t exist in "%s', $className, $file));
            }
        } else {
            throw new Exception('File '.$file.'is not found');
        }
    }

    /*
     * Method returned path
     * @param string $className
     * @return bool | string
     */
    private function getPaths($className)
    {
        foreach (self::$_registry as $namespace => $path) {
            if (strpos($className, $namespace) == 0) {
                $className  = str_replace($namespace, '', $className);
                $paths      = explode('\\', $className);

                if ($paths) {
                    $file = $path. '/'. implode('/', $paths) .'.php';
                } else {
                    $file = $path . '/' . $className;
                }

                return $file;
            }
        }

        return false;
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
