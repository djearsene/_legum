<?php
//liste des tables de la base de données courante
require "../include/inc_config.php";
$_SESSION["menu"] = 2;
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
        inc_head.php
inc_header.php
inc_menu.php
inc_config.php
inc_fonctions.php
inc_footer.php    </header>
    <!-- liens de navigation -->
    <nav>
        <?php require "../include/inc_nav.php"; ?>
    </nav>
    <!-- contenu principal -->
    <div id="main">
    <?php require "../include/inc_dbname.php"; ?>
        <h1>Tables</h1>
        <ul>
            <?php
            $tables = getTables($link);
            foreach ($tables as $nom) { ?>
                <li><?= $nom ?> - <a href="javascript:void(0)" onclick="action('<?= $nom ?>','data')">données</a> - <a href="javascript:void(0)" onclick="action('<?= $nom ?>','struct')">structure</a></li>
            <?php }
            ?>
        </ul>
        <hr>
        <div id="resultat"></div>
    </div>

    <!-- pied de page -->
    <footer>
        <?php require "../include/inc_footer.php"; ?>
    </footer>
    <script>        

        function action(nom, datatype) {                        
            //création d'un objet pour faire une requete HTTP
            let xmlhttp = new XMLHttpRequest();
            //url : adresse de la requete
            let url = `requete.php?nom=${nom}&datatype=${datatype}`;
            //configuration de la requete HTTP :
            //type GET ou POST, adresse, asynchrone=true, voir doc : https://developer.mozilla.org/fr/docs/Web/API/XMLHttpRequest/open
            xmlhttp.open("GET", url, true);
            //fonction javascript qui sera déclenchée lorsque la réponse HTTP arrive
            xmlhttp.onreadystatechange = mafonction;
            //ENVOI de la requete HTTP
            xmlhttp.send();

            function mafonction() {
                //Si le requete s'est bien passé
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    //actualisation de la div resultat
                    resultat.innerHTML = xmlhttp.responseText;
                    //document.location.href="#resultat";
                }
            }
        }
    </script>
</body>

</html>