<?php
Router::view('layouts/header');
?>

<div class="descContent" align="center">
    <br>
    <br>
    <br>
    <br>
    Indiquez ce que vous souhaitez donner:
    <br>
    <br>
    <form action="/dons/choisir-une-agence" method="post">
        <textarea name="don" class="inputDon" rows="8" cols="40"></textarea>
        <br>
        <input type="submit" value="Valider le dons et prend rendez-vous">
    </form>
</div>

<?php
Router::view('layouts/footer');
?>
