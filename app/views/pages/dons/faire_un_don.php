<?php
Router::view('layouts/header');
?>
<div class="descContent">
    <p class="response">Indiquez ce que vous souhaitez donner:</p>
    <form action="/dons/choisir-une-agence" method="post">
        <textarea name="don" class="inputDon" rows="8" cols="40"></textarea>
        <br>
        <input type="submit" class="inputDon btnValid" value="Valider le don">
    </form>
</div>

<?php
Router::view('layouts/footer');
?>
