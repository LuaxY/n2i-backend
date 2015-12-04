<?php

define('HOME', '');

Router::route(HOME,   'HomeController');
Router::route('home', 'HomeController');

Router::route('account', 'AccountController');
Router::route('dons',    'DonateController');
Router::route('ideabox', 'BaiController');
Router::route('game', 'GameController');
