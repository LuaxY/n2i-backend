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
    </form>
    <div class="center"><a id="insToCo" class="txtPopUp">Déjà inscrit ?</a></div>
  </div>
</div>

<div class="contentDon">
  <h2>titleHpContent</h2>
  <div id="descContent">
    <p>testDon</p>
  </div>
</div>
<div class="contentMap">
  <div id="descContent">
    <p>testMap</p>
  </div>
</div>

<div class="contentSeriousGame">
  <div id="descContent">
    <p>testSeriousGame</p>
  </div>
</div>
    <footer id="footer">

    </footer>

    <script src="<?php Router::asset('js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php Router::asset('js/TweenMax.min.js'); ?>"></script>
    <script src="<?php Router::asset('js/coreJs.js'); ?>"></script>
    <script src="<?php Router::asset('js/menu.js'); ?>"></script>
    <script src="<?php Router::asset('js/ajax.js'); ?>"></script>
</body>
</html>
