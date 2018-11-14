<?php //affichage des fichiers

$racine="C:/xampp/htdocs/explorateur/"; // Adresse du dossier sur le disque dur
$base_url = "http://localhost/explorateur/"; // //Adresse du dossier en local

echo $_SERVER["DOCUMENT_ROOT"];

if(isset($_GET['dossier'])) {
  $chemin = $_GET['dossier']; // ouvre le dossier en renseignant son chemin entre les parenthèses et de mettre le pointeur dedans
}
else {
   $chemin = ".";
}

$dossier = opendir($chemin);

while ($fichier = readdir($dossier)) //Boucle qui affiche le fichier pour chaque dossier
{
     if ($fichier != "." && $fichier != "..") // Filtre anti-points ! 
     {
        echo '<a href="'.$base_url.'?dossier='.$chemin."/".$fichier.'">'.$fichier.'</a><br>';
     }//base url pour partir de ce dossier
     // ?dossier=  exprimé la variable get
     // on scan les dossier pa rapport à la base URL 
}
closedir($dossier); 
?> 
