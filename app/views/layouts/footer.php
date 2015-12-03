    </div>
    <div class="contentLogin">
        <div id="filtre"></div>
        <div id="popUpLogin">
            <form method="post" id="connexion" action="/account/login">
                <input class="inputLogin" type="text" name="email" placeholder="Votre Email"><br>
                <input class="inputLogin" type="password" name="password" placeholder="Votre Mot de Passe"><br>
                <input class="inputLogin btnValid" type="submit" value="Valider">
            </form>
            <a class="txtPopUp">Pas encore inscrit ?</a>
        </div>
    </div>
    <footer id="footer">

    </footer>

    <script src="<?php Router::asset('js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php Router::asset('js/TweenMax.min.js'); ?>"></script>
    <script src="<?php Router::asset('js/coreJs.js'); ?>"></script>
    <script src="<?php Router::asset('js/menu.js'); ?>"></script>
</body>
</html>
