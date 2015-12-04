<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>I'm Human</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="<?php Router::asset('css/normalize.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="<?php Router::asset('css/style.css'); ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/plugins/CSSPlugin.min.js"></script>
</head>
<body>
    <div id="header">
        <h2>I'm Human</h2>
    </div>
    <div class="contentMenu">
        <button id="btnMenu5" class="btnMenu"><i class="material-icons">home</i><a href="/" class="pMenu">Home</a></button>
        <?php if (isLogged()) { ?>
        <button id="btnMenu1" class="btnMenu btnLogout"><i class="material-icons">account_circle</i><a href="/account/out" class="pMenu">Deconnexion</a></button>
        <?php } else { ?>
        <button id="btnMenu1" class="btnMenu btnLogin"><i class="material-icons">account_circle</i><p class="pMenu">Connexion</p></button>
        <?php } ?>
        <button id="btnMenu2" class="btnMenu"><i class="material-icons">card_giftcard</i><p class="pMenu">Don</p></button>
        <button id="btnMenu3" class="btnMenu"><i class="material-icons">map</i><a href="./ndl3d/index.php" class="pMenu">Besoin mondial</a></button>
        <button id="btnMenu4" class="btnMenu"><i class="material-icons">games</i><p class="pMenu">Et si on jouait ?</p></button>
        <button id="btnMenu6" class="btnMenu"><i class="material-icons">help</i><a href="/ideabox" class="pMenu">Boite à idées</a></button>
    </div>
    <div class="content">
