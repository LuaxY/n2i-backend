<?php
Router::view('layouts/header');
?>

<div class="layout">
    <form id="LogIn" action="/account/create" method="POST">
    nom : <input type="text" id="nom" name="nom">
    prenom: <input type="text" id="prenom" name="prenom">
    cp: <input type="text" id="cp" name="cp">
    E-mail : <input type="text" id="email" name="email">
    Mot de passe : <input type="password" id="password" name="password">
    <button type="submit" id="Inscription" name="Inscription" value="go">go</button></form>
    <?php
    if(isset($error))
        echo($error); ?>
</div>

<?php

Router::view('layouts/footer');
?>
