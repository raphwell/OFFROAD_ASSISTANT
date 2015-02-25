<header>
    <nav>
        <ul>
            <?php
            // Sommes-nous sur l'index ?
            $scriptName = filter_input(INPUT_SERVER, "SCRIPT_NAME");
            $pageActuelle = substr($scriptName, strrpos($scriptName, "/") + 1);
            if ($pageActuelle === "index.php") {
                $dirIndex = "./";
                $dirPages = "./pages/";
            } else {
                $dirIndex = "../";
                $dirPages = "./";
            }
            // Construction d'un tableau associatif contenant les correspondances
            // noms de pages / liens de la barre de navigation
            $pages = array(
                "Accueil" => $dirIndex . "index.php",
                "Suivre un randonneur" => $dirPages . "visuRando.php",
                "Preparer une rando" => $dirPages . "prepaParcours.php",
            );
            // Affichage des liens de la barre de navigation
            foreach ($pages as $nom => $url) {
                echo "\n", '<li><a href="', $url, '">', $nom, '</a></li>';
            }
            ?>
            
        </ul>
        
    </nav>
</header>