<script src="js/jquery.js"></script>
<link rel="stylesheet" href="../public/css/bootstrap-5.0.0-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../public/css/styles.css">
<script src="../public/css/bootstrap-5.0.0-dist/js/bootstrap.min.js"></script>
<script src="../public/js/fonctions.js"></script>

<?php
    $categLivre=$_POST['categLivre'];
    define("FICHIER","donnees/livres.txt"); 
    if(!$fic=fopen(FICHIER,"r")) { 
        echo "Problème pour ouvrir le fichier"; 
        exit; 
    }

    $rep="<h1>Question 2</h1>";
    $rep.="<table border=1>";
    $rep.="<tr><th>Titre</th><th>Auteur</th><th>Année</th><th>Pages</th><th>Catégorie</th></tr>";
    $ligne=fgets($fic);

    while (!feof($fic)) {
        $tab=explode(";",$ligne);
        $ligne=$ligne.";";
        if ($tab[0]!="titre"){
            if ($categLivre."\n"===$tab[4]) {
                $rep.="<tr><td>".$tab[0]."</td><td>".$tab[1]."</td><td>".$tab[2]."</td><td>".$tab[3]."</td><td>".$tab[4]."</td></tr>";
            }   
        }
        $ligne=fgets($fic);
    }
    $rep.="</table>";
    fclose($fic);
    echo $rep;
?>
<br><br><p  class="text-center"><a href="../index.html">Revenir en arrière</a></p>