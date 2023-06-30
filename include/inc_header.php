<a href="index.php" title="Retour à l'accueil"><img src="img/logo.gif" width="100" alt="logo du site"></a>
<span class="titre"><?= APP_NAME ?></span><span class="soustitre"><?= APP_SLOGAN ?></span>

<?php
if ($_SESSION["debug"]) {
    echo "<pre id='debug'>";
    echo "\$_POST = ";
    print_r($_POST);

    echo "\$_GET = ";
    print_r($_GET);

    echo "\$_SESSION = ";
    print_r($_SESSION);
    echo "</pre>";
}