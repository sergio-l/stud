<?php

namespace Framework\DI;

/*
 * Registry.Global store property
 */
class Registry
{
    /*
     * @var array
     */
    protected static $_registry = array();

    /*
     * Installation method
     * @param string $name
     * @param string $value
     */
    public static function set($name, $value)
    {
        self::$_registry[$name] = $value;
    }

    /*
     * Getting object
     * @param string $name
     * @return null|mixed
     */
    public static function get($name)
    {
        return array_key_exists($name, self::$_registry) ? self::$_registry[$name] : null;
    }

    /*
     * Construct.Ban create object
     * @return void
     */
    private function __construct(){}

    /*
     * Clone.Ban cloning
     * @return void
     */
    private function __clone(){}
}