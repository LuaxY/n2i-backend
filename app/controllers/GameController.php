<?php

class GameController
{

    public function index()
    {
        if(isset($_REQUEST["limit"])){
            $limit = $_REQUEST["limit"];
        }
        else{
            $limit = 0;
        }
        if(isset($_REQUEST["wins"])){
        $wins = $_REQUEST["wins"];
    }
        else{
        $wins = 0;
    }
        $res = Database::query("SELECT * FROM QUESTION LIMIT ".$limit.",1");
        if($res)
            Router::view( 'pages/game/index',["infos" => $res[0],"wins" => $wins]);
        else
            Router::view( 'pages/game/end',["wins" => $wins]);
    }

}
