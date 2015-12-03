<?php
Router::view('layouts/header');
?>
<div class="layout">
  <p>Liste des idées proposées par les internautes :</p>
  <?php
    $res = Database::query("SELECT * FROM IDEE");
    $array = array();

    foreach($res as $value){
      echo($value["objet"]."<br/>");
      echo($value["message"]."<br/><br/>");
    }
  ?>
<?php
Router::view('layouts/footer');
?>
