<?php
Router::view('layouts/header');
?>

<?php foreach($infos as $nom => $value){
    echo("<div> ".str_replace("USER_","",$nom) . " = " . $value . "</div><br/>");

} ?>

<?php

Router::view('layouts/footer');
?>
