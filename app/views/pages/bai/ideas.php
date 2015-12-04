<?php
Router::view('layouts/header');
?>
<div class="descContent">
  <h3>Liste des idées proposées par les internautes:</h3>
  <div class="scrollIdeas">
    <?php
      foreach($ideas as $value){
        $validate = $value["valide"];
        if($validate == 0){$color='grey';}
        else if($validate == 1){$color='green';}
        else{$color='red';}

        echo("<div style=\"background-color:".$color.";\"");
        echo("<hr>".$value["objet"]."<br/>");
        echo($value["message"]."<br/><br/><hr>");
        echo("</div>");
      }
    ?>
  </div>
  <hr>
  <div class="center"><a href="ideabox/nouvelle_idee">Soumettre une idée!</a></div>
</div>
<?php
Router::view('layouts/footer');
?>
