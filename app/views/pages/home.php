<?php
Router::view('layouts/header');
?>

<h2>I'm Human</h2>
<?php if (!empty($_SESSION['flash'])) { echo "<div class='descContent successmsg' align='center'>{$_SESSION['flash']}</div>"; unset($_SESSION['flash']); } ?>

<?php
Router::view('layouts/footer');
?>
