<?php

require(CORE . DS . 'Database.php');
require(CORE . DS . 'Format.php');
require(CORE . DS . 'Router.php');

// CODE DEGOLASSE :
function isLogged()
{
    if (empty($_SESSION["compte"]))
        return false;
    return true;
}
