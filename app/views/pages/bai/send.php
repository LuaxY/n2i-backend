<?php
Router::view('layouts/header');
?>
<div class="layout">
<form action="ideabox/create" method="post">
    <input class="inputObject" type="text" name="Object" placeholder="Object"/><br/>
    <br/><textarea class="inputIdea" name="Message" rows="10" cols="60" placeholder="Votre idée"></textarea>
    <br/><input type="submit" value="Lancer l'idée !">
</form>
<?php
Router::view('layouts/footer');
?>
