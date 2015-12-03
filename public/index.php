<?php
session_start();

define('ROOT', __DIR__ . '/..');
define('DS', DIRECTORY_SEPARATOR);

define('CORE',      ROOT . DS . 'core');
define('APP',       ROOT . DS . 'app');
define('CONFIG',    ROOT . DS . 'config');

require(CORE   . DS . 'autoload.php');
require(CONFIG . DS . 'config.php');
require(CONFIG . DS . 'routes.php');

Database::connect();

if (isset($_GET['params']))
{
    $params = explode('/', $_GET['params']);
}
else
{
    $params = array(0 => '');
}

if (!Router::load($params))
{
    Router::error(404, "not found");
    Router::view('errors/404');
}
