<!DOCTYPE html>
<html lang="FR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bear Grylls l'explorateur de fichiers</title>

    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
    @import url('https://fonts.googleapis.com/css?family=Kanit');
    </style>
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   
</head>
<body>

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <img src="Images/Illustrations/mini_ACS.jpg" alt=""> 
            </div>

            <div class ="col-lg-4">
                <h1>Bear Grylls l'explorateur</h1>
            </div>
        </div>
    </div>
</header>
<h2>Partez à l'aventure & explorer les fylls de Bear !</h2>

<section id="contenu">
   <div class="container">
        <div class="row">
           <div class="col-lg-4">
               
                <?php
                    $racine= $_SERVER["DOCUMENT_ROOT"]; // Adresse du dossier sur le disque dur
                    $base_url = "http://localhost/"; // //Adresse du dossier en local
                    $chemin_reel = realpath("index.php"); //On récupère le chemin réel d'index.php, par exemple c:/wamp64/www/explorateur/index.php
                    $chemin_reel = str_replace("index.php","",$chemin_reel); //On enlève "index.php" pour ob


                    if(isset($_GET['dossier']) && !empty($_GET['dossier'])) 
                        {
                            $chemin = $_GET['dossier']; //Si on a une info dans $_GET['dossier'], c'est le chemin qu'on va scanner
                        }
                        if(isset($chemin) && $chemin != "")
                        {
                            $retour = strrpos($chemin, "/");  
                            $retour = substr($chemin, 0, $retour);    
                            echo '<p><a href="?dossier='.$retour.'"><i class="fas fa-chevron-circle-left"></i></a></p>';   
                            
                        }
                    else 
                        {
                            $chemin = "."; //Sinon, si il n'y a rien dans $_GET, c'est la première visite de l'explorateur : on scan le dossier courant
                            // echo '<p><a href="./">Retour</a></p>';
                        }

                    $dossier = scandir($chemin); //On scan le chemin demandé


                    foreach ($dossier as $key => $file) 
                    { //la boucle qui passe sur chaque fichier du dossier courant
                        if ($file != "." && $file != "..") 
                        { 
                            if ($file != ".git" && $chemin.'/'.$file != './index.php' && $chemin.'/'.$file != './dl.php'&& $file != "README.md" && $chemin.'/'.$file !=  "./style.css" && $file != "Bear-Grylls.jpeg" ){
                                if(is_dir($chemin.'/'.$file)) 
                                {
                                    echo  '<a href="?dossier='.$chemin.'/'.$file.'"> <img class ="boussole" src="Images/Illustrations/compass2.png"/>'.$file.'</a><br><br>'; //Si c'est un dossier, on fait un lien vers notre fichier php d'explorateur avec l'info du chemin à scanner en GET (le href commence par ? donc il n'y a pas d'URL, juste des variables GET, ça rapelle le même fichier)
                                }
                                else
                                {
                                    echo '<a href="'.$chemin.'/'.$file.'"><img class="bag" src="Images/Illustrations/bag2.png"/>'.$file.'</a><a class="dl" href="dl.php" class="btn btn-info">Télécharger</a><br> <br>'; //Sinon, ce n'est pas un dossier : on fait un lien direct vers le fichier (avec target="_blank" pour ouvrir dans un nouvel onglet)
                                }
                            }
                            
                        }

                    }

                    // $(location).attr('href', 'dl.php?zip=' + data);

                    /******* Il est utile de connaitre le chemin réel des fichiers (/var/www/html/... ou C:/wamp64/www/....) *******/

                    // $chemin_reel = realpath("index.php"); //On récupère le chemin réel d'index.php, par exemple c:/wamp64/www/explorateur/index.php
                    // $chemin_reel = str_replace("index.php","",$chemin_reel); //On enlève "index.php" pour obtenir un chemin du type c:/wamp64/www/explorateur/
                    // echo $chemin_reel;

                
                    // <a href="dl.php" class="btn btn-info">Télécharger
                ?>
            </div>
        

            <div class="col-lg-8"id="bear">
                
            </div>
        </div>



     
    </div>


    
</div>



</body>
</html>