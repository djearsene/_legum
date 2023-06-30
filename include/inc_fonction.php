<?php
/*
affiche un tableau PHP à 2 dimension dans un tableau HTML
- $tab : tableau php à 2 dimension, clé1 : index numérique, clé2:nom des champs
*/
function arrayToHTML(array $tab)
{
    //Si $tab n'est pas vide alors on récupère le nom des champs à partir de la 1ere ligne
    if (count($tab) > 0)
        $entete = array_keys($tab[0]);
    else
        $entete = [];

    echo "<table border='1'>";
    echo "<caption> Nombre d'enregistrement : " . count($tab) . "</caption>";
    //entete du tableau HTML
    echo "<thead>";
    echo "<tr>";
    foreach ($entete as $valeur)
        echo "<th>$valeur</th>";
    echo "</tr>";
    echo "</thead>";
    //corps du tableau HTML
    echo "<tbody>";
    foreach ($tab as $cle => $ligne) {
        echo "<tr>";
        foreach ($ligne as $valeur) {
            //la fonction htmlspecialchars permet de se protéger contre l'injection de code HTML/javascript
            echo "<td>" . nl2br(htmlspecialchars($valeur, ENT_QUOTES,"UTF-8")) . "</td>";
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}

//lit un fichier CSV et le retourne sous la forme d'un array2D
function lireData(string $nomFichier): array
{
    $tab = file($nomFichier);
    foreach ($tab as $ligne) {
        $data[] = explode(";", trim($ligne));
    }
    return $data;
}

//Retourne la liste des bases de données (non système) du serveur mysql
function getDatabases($link): array
{
    $exclure = ["information_schema", "mysql", "performance_schema", "sys"];
    $db = [];
    $result = mysqli_query($link, "show databases;");
    while ($row = $result->fetch_assoc())
        if (!in_array($row["Database"], $exclure))
            $db[] = $row["Database"];

    return $db;
}

//affiche la liste des bases de données sous forme de liste déroulante
function HTML_SELECT_Databases($link, $selDbname)
{
    $db = getDatabases($link);
    foreach ($db as $nom) {
        $sel = ($nom == $selDbname ? " selected " : "");
        echo "<option $sel>$nom</option>";
    }
}

//récupère la liste des tables de la base de données courante
function getTables($link):array {
    $data = [];
    if ($_SESSION["dbname"] != "") {
        $result = mysqli_query($link, "show tables;");
        while ($row = $result->fetch_array())
            $data[] = $row[0];
    }

    return $data;
}
