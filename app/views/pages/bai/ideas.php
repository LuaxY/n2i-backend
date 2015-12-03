<?php
Router::view('layouts/header');
?>
<div class="layout">
  <p>Liste des idées proposées par les internautes :</p>
  <?php
    foreach($ideas as $value){
      echo("<hr>".$value["objet"]."<br/>");
      echo($value["message"]."<br/><br/>");
    }
  ?>
  <hr>
<?php
Router::view('layouts/footer');
?>
