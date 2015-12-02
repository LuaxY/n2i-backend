$(function() {

    var $menu = $('.menu-log')
    , $buttonMenu = $('.menu-log .button')
    , $colLeft = $('.colLeft')
    , $colRight = $('.colRight')
    , menuHeight = $buttonMenu.height()
    , $inputPrice = $('.inputDon')
    , $buttonSearch = $('.searchButton')
    , $tableData = $('.tableData')
    , $parent = $('.parent')
    , $searchButton = $('.searchButton')
    , $searchButton2 = $('.searchButton2')
    , $inputRechercheQuoi = $('.inputRechercheQuoi')
    , $inputRechercheType = $('.inputRechercheType')
    , $logoSearch = $('.logoSearch')
    , $logoGive = $('.logoGive')
    , $bestLogo = $('.bestLogo')
    , $nom = $('.nom')
    , $prenom = $('.prenom')
    , $mail = $('.mail')
    , $password = $('.password')
    , $adresse = $('.adresse')
    , $cp = $('.cp')
    , $login = $('.login')
    , $mdp = $('.mdp')
    , URL = 'http://n2i.voidmx.net/2014/';

    var passMenu = 0;
    var convertElToId = {
        repas: 1,
        arbre: 3,
        kit: 4,
        medicament: 5,
        ecole: 6
    };

     var setHandler = function() {
         /*switch panel*/
         $colRight.on('click',function() {
             if(!passMenu){
                $colLeft.animate({left : "-85%"});
                $colRight.animate({left : "15%"});
                $colLeft.css({'z-index' : "0"});
                $('.parent').animate({left : "15%"});
                $logoSearch.fadeOut();
                $logoGive.fadeIn();
            }
        });
        /*switch panel*/
        $colLeft.on('click', function() {
            if(!passMenu){
                $colLeft.animate({left : "-15%"});
                $colRight.animate({left : "85%"});
                $colLeft.css({'z-index' : "5"});
                $('.parent').animate({left : "0%"});
                $logoSearch.fadeIn();
                $logoGive.fadeOut();
            }
        });
         /*shown or hide button*/
        $inputPrice.on('keyup', function(){
            if($(this).val()){
                $('.searchButton').slideDown();
            }else{
                $('.searchButton').slideUp();
            }
        });

        /*listener on change for show button*/
        $('.inputRechercheQuoi').on('change', function(){
            if($inputRechercheType.val() && $inputRechercheQuoi.val()){
                $('.searchButton2').slideDown();
            }
        });
        $('.inputRechercheType').on('change', function(){
            if($inputRechercheType.val() && $inputRechercheQuoi.val()){
                $('.searchButton2').slideDown();
            }
        });

        /*show subMenu countries*/
        $(document).on('click', '.tableElem', function(){
            if($('#panel-'+$(this).attr('id')).is('.close')){
                $('#panel-'+$(this).attr('id')).slideDown();
                $('#panel-'+$(this).attr('id')).addClass('open');
                $('#panel-'+$(this).attr('id')).removeClass('close');
            }else{
                $('#panel-'+$(this).attr('id')).slideUp();
                $('#panel-'+$(this).attr('id')).addClass('close');
            }
        });

        /*REQUETE GIVE*/
        $searchButton.on('click', function(){
            $.ajax({
                type: "POST",
                url: URL+'mission/search',
                data: { 'value': $inputPrice.val()},
                success: function(msg){
                    var result = new Array();
                    try{
                        result = $.parseJSON(msg);
                    }catch(e){}
                    passMenu = 1;
                    closeMenu();
                    $bestLogo.fadeOut();
                    $('.searchBlock').animate({'margin-top' : '3%'}, 400, function(){
                        $colLeft.animate({left : "0"});
                        $('.searchBlock').animate({'left' : '37.5%'});
                        $('.searchButton').fadeOut(400, function(){
                            $('.tableData').slideDown(400, function(){
                                $(this).animate({'width' : '55%'});
                                $tableData.empty();
                                if(result.hasOwnProperty('error')){
                                    $tableData.append('<div class="tableElem"><div class="logo"></div><span>Une erreur est survenue ...</span></div>');
                                }else{
                                    $.each(result, function(i,e){
                                        $tableData.append('<div class="tableElem '+i+'" id="'+i+'"><div class="logo"></div><span>'+e+'</span></div>'
                                                        +'<div class="continent close" id="panel-'+i+'">'
                                                            +'<div class="details Afrique-'+i+'">Afrique</div>'
                                                            +'<div class="details Amerique-'+i+'">Amerique</div>'
                                                            +'<div class="details Asie-'+i+'">Asie</div>'
                                                            +'<div class="details Europe-'+i+'">Europe</div>'
                                                            +'<div class="details Oceanie-'+i+'">Oceanie</div>'
                                                        +'</div>');
                                    });
                                }
                            });
                        });
                    });
                }
            });
        });

        $(document).on('click', '.details', function() {
            var myClass = $(this).attr('class');
            var split = myClass.split(' ');
            var dataEl = split[1];
            dataEl = dataEl.split('-');
            var continent = dataEl[0];
            var element = dataEl[1];
            $.ajax({
                type: "POST",
                url: URL+"association/read",
                data: { continent: continent, element: convertElToId[element]},
                success: function(msg){
                    var result = new Array();
                    try{
                        result = $.parseJSON(msg);
                    }catch(e){}

                    if(!result.hasOwnProperty('error')){
                        $tableData.slideUp(400, function(){
                            console.log(result);
                            $(this).empty().append('<div class="tableElemInfos"><p>'+result.Nom+'</p><p><a href="http://'+result.Site_web+'">'+result.Site_web+'</a></p><p><a href="mailto:'+result.Email_siege+'">'+result.Email_siege+'</a></p></div>').slideDown();
                        });
                    }else{
                        $tableData.slideUp(400, function(){
                            console.log(result);
                            $(this).empty().append('<div class="tableElem"><span>'+result.error+'</span></div>').slideDown();
                        });
                    }

                }
            });
        })

        /*AJAX INSCRIPTION*/
        $('.envoyerInscription').on('click', function() {
            $.ajax({
                type: "POST",
                url: URL+"account/create",
                data: { nom: $nom.val(), prenom: $prenom.val(), adresse: $adresse.val(), email: $mail.val(), password: $password.val(), code_postal: $cp.val(), pays: "France"},
                success: function(msg){
                    msg = JSON.parse(msg);
                    if(msg.hasOwnProperty('error')) {
                        $('.inscrire .error').html(msg.error);
                    }
                    else {
                        $('.inscrire').animate({'bottom' : '-300px'});
                        $('.user').css({'display' : 'block'});
                        $('.menu-log').animate({'height' : '62px'});
                        $('.user').html($prenom.val() +' '+ $nom.val());
                    }
                }
            });
        });

        /*LOGIN*/
        $('.envoyerConnexion').on('click', function() {
            $.ajax({
                type: "POST",
                url: URL+"account/login",
                data: { email: $login.val(), password: $mdp.val()},
                success: function(msg){
                    msg = JSON.parse(msg);
                    if(msg.hasOwnProperty('error')) {
                        $('.connecter .error').html(msg.error);
                    }
                    else {
                        $('.connecter').animate({'bottom' : '-300px'});
                        $('.user').css({'display' : 'block'});
                        $('.menu-log').animate({'height' : '62px'});
                        $('.user').html(msg.Prenom +' '+ msg.Nom);
                    }
                }
            });
        });

        /*REQUETE DON SIMPLE*/
        $searchButton2.on('click', function(){
            $.ajax({
                type: "POST",
                url: URL+'mission/search/',
                data: { 'quoi': $inputRechercheQuoi.val(), 'type' : $inputRechercheType.val()},
                success: function(msg){
                   //TODO :(
                }
            });
        });
    }

    /*CLOSE MENU*/
    var closeMenu = function(){
        $menu.animate({height : "0"});
    }

    /*OPEN MENU*/
    var openMenu = function(){
        $menu.animate({height : menuHeight + 40 + 'px'});
    }

    /*MODE FULLSCREEN*/
    var openTab = function() {
        $(document).on('click' , '.searchButton2', function() {
            passMenu = 1;
            closeMenu();
            $bestLogo.fadeOut();
            $('.searchBlock2').animate({'margin-top' : '3%'}, 400, function(){
                $colRight.animate({left : "0"});
                $('.searchBlock2').animate({'left' : '37.5%'});
                $('.searchButton2').fadeOut();
            });
        });
    }

    /*SHOW INSCRIPTION*/
    var inscription = function() {
        $(document).on('click', '.inscription', function() {
            closeMenu();
            $('.inscrire').animate({'bottom' : '0'});
        })
    }

    /*SHOW CONNEXION*/
    var connexion = function() {
        $(document).on('click', '.connexion', function() {
            closeMenu();
            $('.connecter').animate({'bottom': '0'});
        })
    }

    /*CLOSE CONNEX OR INSCRIPTION*/
    var closeOnglet = function() {
        $(document).on('click', '.fermerOnglet', function() {
            if($('.inscrire').css('bottom') == "0px") {
                $('.inscrire').animate({'bottom' : '-300px'});
            } else if($('.connecter').css('bottom') == "0px") {
                $('.connecter').animate({'bottom': '-300px'});
            }
            openMenu();
        })
    }


    /***************** VERIF INSCRIPTION ********************/
    $nom.on('keyup', function(){
        if(!!$nom.val() && !!$prenom.val() && !!$mail.val() && !!$cp.val() && !!$adresse.val() && !!$password.val()){
            $('.envoyerInscription').slideDown();
        }else{
            $('.envoyerInscription').slideUp();
        }
    });

    $prenom.on('keyup', function(){
        if(!!$nom.val() && !!$prenom.val() && !!$mail.val() && !!$cp.val() && !!$adresse.val() && !!$password.val()){
            $('.envoyerInscription').slideDown();
        }else{
            $('.envoyerInscription').slideUp();
        }
    });

    $adresse.on('keyup', function(){
        if(!!$nom.val() && !!$prenom.val() && !!$mail.val() && !!$cp.val() && !!$adresse.val() && !!$password.val()){
            $('.envoyerInscription').slideDown();
        }else{
            $('.envoyerInscription').slideUp();
        }
    });

    $cp.on('keyup', function(){
        if(!!$nom.val() && !!$prenom.val() && !!$mail.val() && !!$cp.val() && !!$adresse.val() && !!$password.val()){
            $('.envoyerInscription').slideDown();
        }else{
            $('.envoyerInscription').slideUp();
        }
    });

    $mail.on('keyup', function(){
        if(!!$nom.val() && !!$prenom.val() && !!$mail.val() && !!$cp.val() && !!$adresse.val() && !!$password.val()){
            $('.envoyerInscription').slideDown();
        }else{
            $('.envoyerInscription').slideUp();
        }
    });

    $password.on('keyup', function(){
        if(!!$nom.val() && !!$prenom.val() && !!$mail.val() && !!$cp.val() && !!$adresse.val() && !!$password.val()){
            $('.envoyerInscription').slideDown();
        }else{
            $('.envoyerInscription').slideUp();
        }
    });
    /***************************************************************/

    /***************** VERIF CONNEXION ********************/
    $login.on('keyup', function(){
        if(!!$login.val() && !!$mdp.val()){
            $('.envoyerConnexion').slideDown();
        }else{
            $('.envoyerConnexion').slideUp();
        }
    });

    $mdp.on('keyup', function(){
        if(!!$login.val() && !!$mdp.val()){
            $('.envoyerConnexion').slideDown();
        }else{
            $('.envoyerConnexion').slideUp();
        }
    });


    /*CALL FUNCTIONS*/
    inscription();
    connexion();
    setHandler();
    openTab();
    closeOnglet();
});
