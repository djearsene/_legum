<?php
//permet d'exéxuter une requête SQL
require "../include/inc_config.php";
$data = [];
extract($_GET);
if (isset($nom)) {
    if ($datatype == "data")
        $sql = "select * from $nom";
    else
        $sql = "desc $nom";
    $result = mysqli_query($link, $sql);
    $data = $result->fetch_all(MYSQLI_ASSOC);
    arrayToHTML($data);
} else {
    return "Erreur...";
}
