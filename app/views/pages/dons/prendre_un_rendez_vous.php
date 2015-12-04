<?php
Router::view('layouts/header');
$date = date("Y-m-d");
?>

<form action="/dons/valider-le-rendez-vous" method="post">
    Date: <input type="date" name="date" min="<?php echo $date ?>" value="">
    <br>
    Heure: <input type="time" name="heure" value="">
    <br>
    <input type="hidden" name="agence_id" value="<?php echo $AGENCE_ID; ?>">
    <input type="submit" value="Valider le rendez-vous">
</form>

<?php
Router::view('layouts/footer');
?>
