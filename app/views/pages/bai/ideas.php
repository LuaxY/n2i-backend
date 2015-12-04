<?php
Router::view('layouts/header');
?>
<div class="descContent">
  <h3>Liste des idées proposées par les internautes:</h3>
  <div class="scrollIdeas">
    <?php
      foreach($ideas as $value){
        echo("<hr>".$value["objet"]."<br/>");
        echo($value["message"]."<br/><br/>");
      }
    ?>
  </div>
  <hr>
  <div class="center"><a href="ideabox/nouvelle_idee">Soumettre une idée!</a></div>
</div>
<?php
Router::view('layouts/footer');
?>
