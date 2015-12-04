<?php

define('DB_USER',     'n2i_2015');
define('DB_PASS',     'n2i_2015');
define('DB_SERVER',   'mysql:dbname=n2i_2015;host=voidmx.net;charset=utf8');

define('TOKEN',    'YoanCyrilYann');

//define('URL',    'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/');

if ($_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
{
    define('URL',    'https://' .$_SERVER['HTTP_HOST'] . '/');
}
else
{
    define('URL',    'http://' .$_SERVER['HTTP_HOST'] . '/');
}

define('VIEW',   APP . DS . '/views');
define('ASSETS', URL  . 'assets/');
