<?php

class BaiController
{
  public function create()
  {
    $res = Database::save((object)array(
        "objet" => $_REQUEST['Object'],
        "message" => $_REQUEST['Message'],
    ), "IDEE");

    if($res){
      Router::view('pages/bai/idee_envoyee');
    }
  }
}

?>
