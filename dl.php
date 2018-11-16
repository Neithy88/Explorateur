<?php


// header ("Location:'.$chemin.'/'.$file.'")
$file ="Images/Illustrations/bag2.png";

header('Content-Type: application/octet-stream');

header('Content-Transfert-Encoding: Binary');

header ('Content-Disposition: attachment; filename="'.$file.'"');

echo readfile($file);






// if(!empty($_GET['zip']))
//     {
//         $fichier = $_GET['zip'];
//         $fichier_taille = filesize($fichier);
 
//         header("Content-disposition: attachment; filename=$fichier");
//         header("Content-Type: application/force-download");
//         header("Content-Transfer-Encoding: application/octet-stream");
//         header("Content-Length: $fichier_taille");
//         header("Pragma: no-cache");
//         header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
//         header("Expires: 0");
//         readfile($fichier);
//     }
?>