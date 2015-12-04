<?php

class GameController
{

    public function index()
    {
        $res = Database::query("SELECT * FROM QUESTION");

        var_dump($res); die();


        Router::json('redirect', '#popUpGame', 'pages/game/index',["infos" => $res[0]]);
    }

}
