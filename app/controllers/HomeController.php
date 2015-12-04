<?php

class HomeController
{
    public function index()
    {
        return Router::view('pages/home');
    }
}
