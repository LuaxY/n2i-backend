<?php
Router::view('layouts/header');
?>

Prise de rendez-vous pour le don de : <?php echo $don; ?>
<br>
<br>
Agences local :
<br>
<br>
<table border="1">
    <tr>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Action</th>
    </tr>
    <tr>
        <td>MonAssoc</td>
        <td>42 LifeStree 13 666 Nullpart</td>
        <td><a href="/dons/prendre-un-rendez-vous/1">Selectionner</td>
    </tr>
    <tr>
        <td>MonAssoc</td>
        <td>42 LifeStree 13 666 Nullpart</td>
        <td><a href="">Selectionner</td>
    </tr>
    <tr>
        <td>MonAssoc</td>
        <td>42 LifeStree 13 666 Nullpart</td>
        <td><a href="">Selectionner</td>
    </tr>
    <tr>
        <td>MonAssoc</td>
        <td>42 LifeStree 13 666 Nullpart</td>
        <td><a href="">Selectionner</td>
    </tr>
</table>

<?php
Router::view('layouts/footer');
?>
