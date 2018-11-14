<?php //affichage des fichiers

$racine="C:/wamp64/www/Explorateur/"; // Adresse du dossier sur le disque dur
$base_url = "http://localhost/Explorateur/"; // //Adresse du dossier en local
$dossier=Opendir($_GET['dossier']); // ouvre le dossier en renseignant son chemin entre les parenthèses et de mettre le pointeur dedans
while ($fichier = readdir($dossier)) //Boucle qui affiche le fichier pour chaque dossier
{
     if ($fichier != "." && $fichier != "..") // Filtre anti-points ! 
     {
        echo '<a href="http://localhost/Explorateur/explorateur-php?dossier='.$racine.$fichier.'">'.$fichier.'</a><br>';
     }//base url pour partir de ce dossier
     // ?dossier=  exprimé la variable get
     // on scan les dossier pa rapport à la base URL 
}
closedir($dossier); 
?> 
