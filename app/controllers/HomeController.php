<?php

class HomeController
{
    public function __construct()
    {

    }

    public function index()
    {
        Router::view('pages/home');
    }
}
