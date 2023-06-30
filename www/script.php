<?php
//permet d'exécuter en ensemble de requêtes SQL
require "../include/inc_config.php";
$_SESSION["menu"] = 3;
$message="";
$data=[];
$sql="";
extract($_POST);
if (isset($btSubmit)) {
    /* Exécution d'une requête multiple */
    $compteur=0;
    $sql_array=explode(";",$sql);
    if (mysqli_multi_query($link, $sql)) {
        $data=[];
        $compteur=0;
        do {
            /* Stockage du premier résultat */
            $data[$compteur]=[];
            if ($result = mysqli_store_result($link)) {
                $data[$compteur] = mysqli_fetch_all($result,MYSQLI_ASSOC);                
            }
            if (mysqli_more_results($link))
                $compteur++;            
        } while (@mysqli_next_result($link));
    }

    if (mysqli_errno($link))
        $message="sql : " . $sql_array[$compteur] . "<br>Erreur : " . utf8_encode(mysqli_error($link));        
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
        <h1>Requêtes SQL</h1>
        <form method="post">
            <textarea name="sql" id="sql" rows="10" cols="80"><?= htmlspecialchars($sql, ENT_QUOTES) ?></textarea>
            <input type="submit" value="Ok" name="btSubmit">
        </form>
        
        <?php
        //affiche les messages d'erreurs
        if ($message!="")
            echo "<div id='message'>$message</div>";

        foreach($data as $table)
            arrayToHTML($table);        
        ?>
    </div>
    <!-- pied de page -->
    <footer>
        <?php require "../include/inc_footer.php"; ?>
    </footer>
</body>

</html>