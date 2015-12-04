<?php
Router::view('layouts/header');
?>
<div class="descContent">
  <h3>Liste des idées proposées par les internautes:</h3>
  <div class="scrollIdeas">
    <?php
      foreach($ideas as $value){
        $validate = $value["valide"];
        if($validate == 0){$color='#ccc';}
        else if($validate == 1){$color='forestgreen';}
        else{$color='firebrick';}

        echo("<div style=\"background-color:".$color."; margin-bottom : 5px;\"");
        echo("<hr>".$value["objet"]."<br/>");
        echo($value["message"]."<br/><br/>");
        echo("</div>");
      }
    ?>
  </div>
  <hr>
  <div class="center"><a class="inputDon btnValid" href="ideabox/nouvelle_idee">Soumettre une idée!</a></div>
<div class="center">Vert: Validé</div>
<div class="center">Rouge: Refusé</div>
<div class="center" style="margin-bottom : 10px;">Gris: En attente</div>
</div>
<?php
Router::view('layouts/footer');
?>
