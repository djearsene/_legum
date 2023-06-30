<?php
//Permet de sélectionner une base de données et redirige sur la page des tables
require "../include/inc_config.php";
$_SESSION["menu"] = 1;
if (isset($_POST["btSubmit"])) {
    $_SESSION["dbname"] = $_POST["dbname"];
    header("location:table.php");
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php require "../include/inc_head.php"; ?>
</head>

<body>
    <!-- entete de page -->
    <header>
        <?php require "../include/inc_header.php"; ?>
    </header>
    <!-- liens de navigation -->
    <nav>
        <?php require "../include/inc_nav.php"; ?>
    </nav>
    <!-- contenu principal -->
    <div id="main">
        <?php require "../include/inc_dbname.php"; ?>
        <h1>Base de données</h1>
        <form method="post">
            <strong>Sélectionnez une base de données :</strong>
            <select name="dbname">
                <?php HTML_SELECT_Databases($link, $_SESSION["dbname"]); ?>
            </select>
            <input type="submit" value="Ok" name="btSubmit">
        </form>
        <br>
    </div>
    <!-- pied de page -->
    <footer>
        <?php require "../include/inc_footer.php"; ?>
    </footer>
</body>

</html>