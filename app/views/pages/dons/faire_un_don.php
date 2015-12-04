<?php
Router::view('layouts/header');
?>

<form action="/dons/choisir-une-agence" method="post">
    <textarea name="don" class="inputDon" rows="8" cols="40"></textarea>
    <br>
    <input type="submit" value="Valider le dons et prend rendez-vous">
</form>

<?php
Router::view('layouts/footer');
?>
