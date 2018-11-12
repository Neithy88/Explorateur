<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr-FR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>explorateur de fichiers minimaliste</title>
<link rel="stylesheet" rev="stylesheet" type="text/css" href="css/style.css" media="screen"/> 
</head>
<body>
<div id="fond">
<div id="centre">
<h1>Explorateur de fichier</h1>
<table cellspacing="2" cellpadding="5" style="width:100%;">
<tr>
<td colspan="2" class="infos">
<?php
// repertoire du fichier
$base = $_SERVER['DOCUMENT_ROOT'];
   if (isset($_GET['dossier'])) {
   	   $dossier = trim(strip_tags($_GET['dossier']));
   } else $dossier = '.';
   
   if (($dossier == '.') || ($dossier == '/') || ($dossier == '')) {
      echo '';
   } else echo $dossier;
?>
</td>
</tr>
<tr>
<td>
<?php
$chemin = $base.'/'.$dossier;
   unset($fichiers);
   $r = opendir($chemin);

   while($fichiers[] = readdir($r));
   closedir($r);
   chdir($chemin);
   foreach($fichiers as $fichier) {
      if(is_dir($chemin.'/'.$fichier) && $fichier != '')
         if($fichier != '.' && $fichier != '..')
            echo "<div class=\"dossier\"><a href=\"?dossier=$dossier/$fichier\" title=\"ouvrir le dossier $fichier\">$fichier</a></div>".chr(10);
         else if($dossier!="/" && $dossier!="." && $dossier!="" && $fichier=="..")
            echo "<div class=\"dossier\"><a href=\"?dossier=".substr($dossier,0,strrpos($dossier,"/"))."\" title=\"ouvrir le dossier $fichier\">$fichier</a></div>".chr(10);
   }
?>
</td>
<td>
<?php
$nb=0;
   $taille = 0;
   foreach($fichiers as $fichier)
      if(!is_dir($chemin.'/'.$fichier) && $fichier != ''){
         $nb++;
         $taille += filesize($fichier);
         $info = pathinfo($fichier);
         echo $fichier.'</div>'.chr(10);
      }
?>
</td>
</tr>
<tr>
<td colspan="2" class="infos">
<?php
printf("%d fichiers - %.0f ko - %.0f Mo libres",$nb,$taille/1024,(disk_free_space($chemin))/1048576);
?>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>