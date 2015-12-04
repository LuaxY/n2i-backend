<?php
Router::view('layouts/header');
?>

<?php if (!empty($_SESSION['flash'])) { echo "<div class='descContent successmsg' align='center'>{$_SESSION['flash']}</div>"; unset($_SESSION['flash']); } ?>

<h2>La sécurité civile</h2>
<div class="descContent">
    <p>Parmi les acteurs de la sécurité civile figurent les sapeurs-pompiers, les militaires des unités d'instruction et d'intervention, les pilotes d'avions et d'hélicoptères ainsi que les démineurs. Tous ensemble, ils luttent au quotidien pour porter secours et assistance, en France comme à l'étranger. Pour eux, une seule vocation : la sauvegarde des personnes et des biens.</p>
    <p>En France, le terme sécurité civile n'est pas un synonyme exact de protection civile : la sécurité civile est une fonction régalienne de l'État, tandis que la protection civile désigne à la fois :</p>
    <p>En France, La Sécurité civile en tant qu'administration a été créée le 17 novembre 1951.</p>
    <p>L'article 1 de la loi n°2004-811 du 13 août 2004 de modernisation de la sécurité civile définit que :</p>
    <p style="text-indent : 30px; margin-bottom:30px;">"la sécurité civile a pour objet la prévention des risques de toute nature, l'information et l'alerte des populations ainsi que la protection des personnes, des biens et de l'environnement par la préparation et la mise en œuvre de mesures et de moyens appropriés relevant de l'État, des collectivités territoriales et les personnes publiques ou privées."</p>
</div>

<?php
Router::view('layouts/footer');
?>
