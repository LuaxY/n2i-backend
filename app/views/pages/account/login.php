
<div class="layout">
    <form id="LogIn" action="/account/login" method="POST">
    id nom prenom mdp mail cp
    E-mail : <input type="text" id="email" name="email">
    Mot de passe : <input type="password" id="password" name="password">
    <button type="submit" id="Inscription" value="go">go</button></form>
    <?php
    if(isset($error))
        echo($error); ?>
</div>

