/*Voice.launch() to record,
Voice.stop() to stop record */
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
var recognition;
var Voice = {
    init: function(){
        console.log('init');
        recognition = new webkitSpeechRecognition();
        recognition.continuous = false;
        recognition.interimResults = false;
        recognition.onstart = function() {
          recognizing = true;
        };
        recognition.onerror = function(event) {

        };
        recognition.onend = function() {
          recognizing = false;
          if (ignore_onend) {
            return;
          }
          if (!final_transcript) {
            return;
          }

        };

        recognition.onresult = function(event) {
          var interim_transcript = '';
          for (var i = event.resultIndex; i < event.results.length; ++i) {
            if (event.results[i].isFinal) {
              final_transcript += event.results[i][0].transcript;
            } else {
              interim_transcript += event.results[i][0].transcript;
            }
          }

          if(!final_transcript){
              final_transcript = interim_transcript;
          }
          if(final_transcript){
              Voice.compareString(final_transcript);
          }

        /*final_transcript = capitalize(final_transcript);
        final_span.innerHTML = linebreak(final_transcript);
        interim_span.innerHTML = linebreak(interim_transcript);*/
      };
    },
    launch : function(){
        //launch the vocal record
        console.log('start recording');
        if (recognizing) {
          recognition.stop();
          console.log('stop recording');
          return;
        }
        final_transcript = '';
        recognition.lang = 'fr-FR';
        recognition.start();
        ignore_onend = false;

        start_timestamp = Math.floor(Date.now() / 1000);
    },
    stop : function(){
        console.log('stop recording');
        recognizing = false;
        recognition.stop();
    },
    compareString : function(input){
      Voice.stop();
        newinput = input.replace(/ /g,'');
        newinput = RemoveAccents(newinput);
        newinput = newinput.toLowerCase();
        console.log(newinput);
        switch(newinput) {
          case "home":
          case "homme":
              console.log("home");
             window.location.replace("/");
              break;
          case "login":
          case "loging":
          case "logging":
          case "logine":
          case "connection":
          case "connexion":
          case "connect":
          case "connecter":
              console.log("login");
              $('.contentLogin').fadeIn();
              $('body').css('overflow', "hidden");
              TweenMax.to(".contentLogin", 1 , {ease: Elastic.easeOut.config(1.2, 0.3), css:{scaleX:1, scaleY:1, opacity : 1}});
              Menu.test = true;
              break;
            case "don":
            case "dont":
                console.log("don");
                window.location.replace("/dons/faire-un-don");
                break;
            case "besoinmondial":
            case "besoinmondiale":
                console.log("besoinmondial");
                window.location.replace("/ndl3d/index.php");
                break;
            case "etsionjouait":
                console.log("etsionjouait");
                window.location.replace("/game");
                break;
            case "boiteaidee":
            case "boiteaidees":
                console.log("boiteaidee");
                window.location.replace("/ideabox");
                break;
            case "yoann":
            case "yoan":
            case "yohan":
            case "sournois":
                $('.ledivsournois').fadeIn();
                setTimeout(function(){
                  $('.ledivsournois').fadeOut();
                },3000);
                break;
            case "marc":
            case "marque":
            case "mark":
              $('.ledivpapa').fadeIn();
              setTimeout(function(){
                $('.ledivpapa').fadeOut();
              },3000);
                break;
            case "lapin":
                $('.contentGameZone').fadeIn();
                $('.contentGameZone').addClass('displayed');
                $('.blkLayout').on('click', function(){
                  $('.contentGameZone').fadeOut();
                  $('.contentGameZone').removeClass('displayed');
                })
                break;
  }
        setTimeout(function(){
          Voice.launch();
        },1000);
    }
}

function RemoveAccents(strAccents) {
       var strAccents = strAccents.split('');
       var strAccentsOut = new Array();
       var strAccentsLen = strAccents.length;
       var accents = 'ÀÁÂÃÄÅàáâãäåÒÓÔÕÕÖØòóôõöøÈÉÊËèéêëðÇçÐÌÍÎÏìíîïÙÚÛÜùúûüÑñŠšŸÿýŽž';
       var accentsOut = "AAAAAAaaaaaaOOOOOOOooooooEEEEeeeeeCcDIIIIiiiiUUUUuuuuNnSsYyyZz";
       for (var y = 0; y < strAccentsLen; y++) {
           if (accents.indexOf(strAccents[y]) != -1) {
               strAccentsOut[y] = accentsOut.substr(accents.indexOf(strAccents[y]), 1);
           } else
               strAccentsOut[y] = strAccents[y];
       }
       strAccentsOut = strAccentsOut.join('');
       return strAccentsOut;
   }
Voice.init();
Voice.launch();
