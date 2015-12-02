<?php
Router::view('layouts/header');
?>

<div class="layout">

    <div class="colLeft">
        <div class="bestLogo"></div>
        <div class="searchBlock">
            <input class="inputDon" type="text" name="donValue" placeholder="Somme à reverser :"/>
            <div class="searchButton"> Faire un don </div>
        </div>
        <!-- A mettre sous l'input -->
        <div class="tableData">
        </div>
        <div class="logoGive"></div>
    </div>
    <div class="colRight">
        <div class="logoSearch"></div>
        <div class="searchBlock2">
            <select class="inputRechercheType"/>
                <option disabled selected value="">Je veux aider en : </option>
                <option value="Afrique">Afrique</option>
                <option value="Amerique">Amerique</option>
                <option value="Asie">Asie</option>
                <option value="Europe">Europe</option>
                <option value="Océanie">Océanie</option>
            </select>
            <select class="inputRechercheQuoi"/>
                <option disabled selected value="">Je veux : </option>
                <option value="1">Offrir un kit scolaire</option>
                <option value="2">Planter des arbres</option>
                <option value="3">Construire une école</option>
                <option value="4">Acheter des médicaments</option>
                <option value="5">Servir des repas</option>
            </select>
            <div class="searchButton2"> Rechercher </div>
        </div>
    </div>
    <div class="parent">
        <div class="connecter">
            <div class="fermerOnglet"></div><div class="error"></div>
            <input type="text" class="login" name="login" placeholder="Votre login :"/>
            <input type="text" class="mdp" name="mdp" placeholder="Votre mot de passe :"/>
            <div class="envoyerConnexion">Je me connecte</div>
        </div>
        <div class="inscrire">
            <div class="fermerOnglet"></div><div class="error"></div>
            <input type="text" class="nom" name="nom" placeholder="Votre nom :"/>
            <input type="text" class="prenom" name="prenom" placeholder="Votre prénom :"/>
            <input type="text" class="mail" name="mail" placeholder="Votre email :"/>
            <input type="password" class="password" name="password" placeholder="Votre mot de passe :"/>
            <input type="text" class="adresse" name="adresse" placeholder="Votre adresse :"/>
            <input type="text" class="cp" name="cp" placeholder="Votre code Postal :"/>
            <div class="envoyerInscription">Je m'inscris</div>
        </div>
        <div class="menu-log">
            <div class="user"></div>
            <div class="button connexion">
                Se connecter
            </div>
            <div class="button inscription">
                S'inscrire
            </div>
        </div>
    </div>
</div>

<?php
Router::view('layouts/footer');
?>
