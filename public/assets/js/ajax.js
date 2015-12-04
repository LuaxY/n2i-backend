$(function(){
var AJAX = {
        init: function (){
            console.log('JS AJAX INIT');

            /* Manage all .xhrForm with button /!\ need class active in case of                   // multiple form in same page */
            $(document).on('submit','#don, #connexion, #inscription', function(e){
                e.preventDefault();
                AJAX.request($(this));
            });
        },
        request: function(form){
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: form.serialize(),
                beforeSend: function(){
                    //remove errors
                },
                success: function(response) {
                    var data = false;
                    try {
                        data = $.parseJSON(response);
                    }catch (e){}
                    if(data){
                        console.log(data);
                        setTimeout(function(){

                            message = data;
                            /*objet de retour*/
                            /*
                            * JSON : type -> success, error...
                                     msg -> html ou message d'erreur
                                     field -> champ a remplir ou modifier
                            */

                            if(message.status == 'error'){
                                $(message.field).html(message.msg).fadeIn(1000);
                                console.log(message.msg);
                            }

                            if(message.status == 'redirect'){
                                $(message.field).fadeOut(150, function(){
                                    $(this).html(message.msg);
                                    $(this).fadeIn(500);
                                });
                            }

                            if(message.status == 'reload'){
                                window.location.replace(message.msg);
                            }
                                /*
                                if(message.type == 'logout'){
                                    window.location = message.msg;
                                }*/
                                /*setTimeout(function(){
                                    $('.formbutton').removeClass('loading').html(btnText);
                                },150);*/

                        },1000);
                    }
                }
            });
        }
    }
    return AJAX.init();
});
