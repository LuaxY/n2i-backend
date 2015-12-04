<?php
Router::view('layouts/header');
?>
<div class="descContent">
  <form action="/ideabox/envoyer" method="post">
      <br/><input class="inputDon" type="text" name="Object" placeholder="Objet"/>
      <br/><textarea class="inputDon" name="Message" rows="20" cols="60" placeholder="Votre idée"></textarea>
      <br/><input class="inputDon btnValid" type="submit" value="Lancer l'idée !">
  </form>
</div>
<?php
Router::view('layouts/footer');
?>
