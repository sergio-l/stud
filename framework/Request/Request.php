<?php

namespace Framework\Request;

/*
 * Request represents an HTTP request
 * @author Sergiy Lytvyn
 */
class Request {

    /*
     * Getting URI
     * @return string name uri
     */
    public static function getURI()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /*
     * Getting HTTP request method
     * @return sting http name
     */
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}