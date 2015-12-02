<?php

define('DB_USER',     'imhuman');
define('DB_PASS',     'imhuman');
define('DB_SERVER',   'mysql:dbname=imhuman;host=localhost');

define('TOKEN',    'YoanCyrilYann');

define('URL',    'http://' .$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/');
//define('URL',    'http://' .$_SERVER['HTTP_HOST'] . '/');
define('VIEW',   APP . DS . '/views');
define('ASSETS', URL  . 'assets/');
