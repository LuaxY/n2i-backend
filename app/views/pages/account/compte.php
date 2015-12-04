

<?php foreach($infos as $nom => $value){
    echo("<div> ".str_replace("USER_","",$nom) . " = " . $value . "</div><br/>");

} ?>
