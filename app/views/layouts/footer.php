    </div>
    <div class="contentLogin">
      <div id="filtre"></div>
      <div id="popUpLogin1">
        <!-- http://n2i.voidmx.net/2015 -->
          <!-- -->
        <form method="post" id="connexion" action="/account/login">
          <input class="inputLogin" type="text" name="email" placeholder="Votre Email"><br>
          <input class="inputLogin" type="password" name="password" placeholder="Votre Mot de Passe"><br>
          <input class="inputLogin btnValid" type="submit" value="Valider">
          <p class="error"></p>
          <p class="successmsg"></p>
        </form>
        <div class="center"><a id="coToIns" class="txtPopUp">Pas encore inscrit ?</a></div>
      </div>
      <div id="popUpLogin2">
        <form method="post" id="inscription" action="">
          <input class="inputLogin" type="text" name="prenom" placeholder="Nom"><br>
          <input class="inputLogin" type="text" name="nom" placeholder="Prénom"><br>
          <input class="inputLogin" type="text" name="Email" placeholder="Votre Email"><br>
          <input class="inputLogin" type="password" name="Pswd" placeholder="Votre Mot de Passe"><br>
          <input class="inputLogin btnValid" type="submit" value="Inscription">
          <p class="error"></p>
          <p class="successmsg"></p>
        </form>
        <div class="center"><a id="insToCo" class="txtPopUp">Déjà inscrit ?</a></div>
      </div>
    </div>

    <div class="contentDon">
      <h2>Faire un don !</h2>
      <div class="descContent">
        <form method="post" id="don" action="127.0.0.1/">
          <input class="inputDon" type="text" name="don" placeholder="De combien / quoi ?"><br>
          <input class="inputDon" type="text" name="qui" placeholder="Pour qui / organisme ?"><br>
          <input class="inputDon" type="text" name="ou" placeholder="Où voulez-vous l'envoyer ?"><br>
          <input class="inputDon btnValid" type="submit" value="Envoyer">
          <p class="error"></p>
          <p class="successmsg"></p>
        </form>
      </div>
    </div>

    <div class="contentSeriousGame">
      <div class="descContent">

      </div>
    </div>
    <footer id="footer">

    </footer>

    <script src="<?php Router::asset('js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php Router::asset('js/TweenMax.min.js'); ?>"></script>
    <script src="<?php Router::asset('js/coreJs.js'); ?>"></script>
    <script src="<?php Router::asset('js/menu.js'); ?>"></script>
    <script src="<?php Router::asset('js/ajax.js'); ?>"></script>
    <script src="<?php Router::asset('js/voice.js'); ?>"></script>
</body>
</html>
