<?php

define('HOME', '');

Router::route(HOME,   'HomeController');
Router::route('home', 'HomeController');

// API
Router::route('account',        'AccountController');
Router::route('association',    'AssociationController');
Router::route('mission',        'MissionController');

// Dons

Router::route('dons', 'DonateController');
