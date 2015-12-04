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
        <th>E-Mail</th>
    </tr>
    <?php
      foreach($list_agences as $key => $elem)
      {
        echo "<tr>"
            ."<td>".$elem['NOM_ASSOC']."</td>"
            ."<td>".$elem['ADRESSE']."</td>"
            ."<td>".$elem['AGENCE_VILLE']."</td>"
            ."<td>".$elem['AGENCE_E_MAIL']."</td>"
            ."<td><a href='/dons/prendre-un-rendez-vous/".$elem['AGENCE_ID']."'>Selectionner</td>"
            ."</tr>";
      }
    ?>
</table>

<?php
Router::view('layouts/footer');
?>
