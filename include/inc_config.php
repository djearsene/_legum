<?php
session_start();
const APP_NAME="LeGUM";
const APP_SLOGAN="Le Gestionnaire Ultime MySql";

$_SESSION["debug"]=false;
//connexion à la base de données
$_SESSION["dbname"] = $_SESSION["dbname"] ?? "";
try {
	$link = mysqli_connect("localhost","root","",$_SESSION["dbname"]);
} catch(Exception $e) {
    $_SESSION["dbname"]="";
	$link = mysqli_connect("localhost","root","","");
}

mysqli_set_charset($link,"UTF8");

require "inc_fonction.php";
?>