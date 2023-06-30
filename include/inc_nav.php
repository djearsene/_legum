    <?php
    function affiche_menu() {
        $menu=[
            ["id" => 1, "url" => "index.php", "label" => "Base de données"],
            ["id" => 2, "url" => "table.php", "label" => "Tables"],
            ["id" => 3, "url" => "script.php", "label" => "Requêtes SQL"]
        ];
    
        foreach($menu as $tab) {
            extract($tab);
            $classe=($_SESSION["menu"]==$id) ? " class='actif'" : "";
            echo "<a href='$url' $classe>$label</a>";
        }
    }

    affiche_menu();
    ?>
    