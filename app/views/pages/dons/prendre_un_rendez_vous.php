<?php
Router::view('layouts/header');
?>

<form action="/dons/valider-le-rendez-vous" method="post">
    Date: <input type="text" name="date" value="">
    <br>
    Heure: <input type="text" name="heure" value="">
    <br>
    <input type="submit" value="Valider le rendez-vous">
</form>

<?php
Router::view('layouts/footer');
?>
