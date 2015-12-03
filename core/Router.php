<?php

class Router
{
    private static $instance;
    public static $routes;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if(is_null( self::$instance ))
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public static function route($slug, $controller)
    {
        self::$routes[$slug] = $controller;
    }

    public static function get($slug)
    {
        if (isset(self::$routes[$slug]))
        {
            return APP. DS . 'Controllers' . DS . self::$routes[$slug] . '.php';
        }
        else
        {
            return false;
        }
    }

    public static function load($params)
    {
        $slug   = @$params[0];
        $method = @$params[1];

        $controllerName = @self::$routes[$slug];
        if (isset($controllerName))
        {
            require_once APP. DS . 'controllers' . DS . $controllerName . '.php';

            if (!class_exists($controllerName))
            {
                // Log("Controller $controllerName not found");
                return false;
            }

            $controller = new $controllerName();

            if (!empty($method))
            {
                $method = str_replace("-","_",$method);
                if (!method_exists($controller, $method))
                {
                    // Log("Method $controllerName::$method not found");
                    return false;
                }

                $controller->$method();
            }
            else
            {
                $controller->index();
            }
        }
        else
        {
            // Log("Invalid $slug slug");
            return false;
        }

        return true;
    }

    public static function error($code, $reason)
    {
        header("Status: $code $reason");
        header("HTTP/1.0 $code $reason");
    }

    public static function view($view, $data = [])
    {
        $v = VIEW . DS . $view . '.php';

        if (file_exists($v))
        {
            extract($data, EXTR_OVERWRITE);
            include $v;
        }
        else
        {
            die("View $view not found");
        }
    }

    public static function url($url)
    {

    }

    public static function asset($asset)
    {
        echo ASSETS . $asset;
    }
}
