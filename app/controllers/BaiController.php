<?php

class BaiController
{
    public function index()
    {
        $ideas = Database::query("SELECT * FROM IDEE");

        return Router::view('pages/bai/ideas', ["ideas" => $ideas]);
    }

    public function nouvelle_idee()
    {
            return Router::view('pages/bai/send');
    }

    public function envoyer()
    {
        if (empty($_REQUEST['Object']) || empty($_REQUEST['Message']))
        {
            die("Object/Idée invalide");
        }

        $res = Database::save((object)array(
            "objet" => $_REQUEST['Object'],
            "message" => $_REQUEST['Message'],
        ), "IDEE");

        if($res){
          return Router::view('pages/bai/end');
        }
    }
}

?>
