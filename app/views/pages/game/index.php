<?php
Router::view('layouts/header');
?>


<div class="descContent">

    <br>
    <br>
    <br>
<script type="text/javascript" src="<?php Router::asset('js/jquery-2.1.4.min.js'); ?>"></script>

<?php
    $reps = explode(";",$infos["REPONSES"]);
// JAVASCRIPT TODO: if reponse selected = bonnerep.text : affiche button et dit good (+incremente wins). Sinon affiche next button et show hint


?>
    <form method="post" action="/game/index" id="seriousgame">
        <div id="firstpart">
    <div id="question">
        <?php echo($infos["QUESTION"]) ?>
    </div>
    <div class="input-group">
        <input type="radio" name="step-1" id="step-1-radio-1"  value="1" />
        <label for="step-1-radio-1" ><?php echo($reps[0]) ?></label>
    </div>
    <div class="input-group">
        <input type="radio" name="step-1" id="step-1-radio-2"  value="2" />
        <label for="step-1-radio-2" ><?php echo($reps[1]) ?></label>
    </div>
    <div class="input-group">
            <input type="radio" name="step-1" id="step-1-radio-3"  value="3" />
            <label for="step-1-radio-3"><?php echo($reps[2]) ?></label>
        </div>
        <div class="input-group">
            <input type="radio" name="step-1" id="step-1-radio-4"  value="4" />
            <label for="step-1-radio-4"><?php echo($reps[3]) ?></label>
        </div>
        <input type="text" name="limit" hidden="hidden"  value="<?php echo($infos["QUESTION_ID"]) ?>" />
        <label id="hint" hidden="hidden"><?php echo($infos["EXPLICATION"]) ?></label>
        <label id="bonnerep" hidden="hidden"><?php echo($infos["RANG"]) ?></label>
        <input type="text" id="wins" name="wins" hidden="hidden"  value="<?php echo($wins) ?>" />
    <div id="reponse"></div>
    <input type="submit" id="submitSerious" value="Valider"/>
        </div>
        <input type="submit" id="goodsubmit" value="Question suivante" style="display:none;">
</form>

<!-- div question, radiobutton reponseS , div empty, button validate (next caché) -->
<script type="text/javascript">
    $('#submitSerious').on('click', function (e) {
        e.preventDefault();
        var rep = $('input[name=step-1]:checked', '#seriousgame').val();
        if(rep == $('#bonnerep').text()){
            alert("Bien joué :D");
            $("#firstpart").css("display","none");
            $("#goodsubmit").css("display","block");
            var wins = <?php echo($wins); ?> ;
            wins++;
            $("#wins").val(wins);
        }
        else{
            alert("Faux! La réponse était : " + $('#hint').text() );
            $("#firstpart").css("display","none");
            $("#goodsubmit").css("display","block");

        }
    });


</script>

</div>

<?php
Router::view('layouts/footer');
?>
