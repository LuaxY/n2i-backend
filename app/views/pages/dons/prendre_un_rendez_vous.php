<?php
Router::view('layouts/header');
$date = date("Y-m-d");
?>

<form action="/dons/valider-le-rendez-vous" method="post" class="descContent">
    Selectionnez une date de rendez-vous:
    <br>
    <br>
    <br>
    Date: <input type="date" class="inputDon" name="date" min="<?php echo $date ?>" value="">
    <br>
    Heure: <input type="time" class="inputDon" name="heure" value="">
    <br>
    <input type="hidden" name="agence_id" value="<?php echo $AGENCE_ID; ?>">
    <input type="submit" class="inputDon" value="Valider le rendez-vous">
</form>

<?php
Router::view('layouts/footer');
?>
