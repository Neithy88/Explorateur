

var nombre = nombre_aleatoire(0, 100);
var score = 0;


function nombre_aleatoire(min, max) {
    var nb = min + (max - min + 1) * Math.random();
    return Math.floor(nb);
}


// function jouer() {
//     document.getElementById("jouer");
//     document.getElementById("nombrejouer");
//     var saisie;

// }


function rejouer() {
    nombre = nombre_aleatoire(0, 100);// nb a deviner
    score = 0;// nb de coups pour le trouver
    document.getElementById("bravoimage").style = "display:none;";
    document.getElementById("nombrejouer").value = "";
    document.getElementById("nombrejouer").style = "display:inline;";
    document.getElementById("information").innerHTML = "Saisir un nombre";
    document.getElementById("jouer").style = "display:inline;";
    document.getElementById("rejouer").style = "display:none;";

}


function bravo() {
    document.getElementById("bravoimage").style = "display:inline;";
    document.getElementById("information").innerHTML = "Bravo ! Tu as trouvé " + nombre + " en " + score + " coups !";
    document.getElementById("nombrejouer").style = "display:none;";
    document.getElementById("jouer").style = "display:none;";
    document.getElementById("rejouer").style = "display:inline;";
}


function jouer() {
    
    
    var saisie;     // nb tape par le joueur
    

    do {
        saisie=document.getElementById("nombrejouer").value;

        // si "Annuler"


        if (saisie > 100){
            document.getElementById("information").innerHTML = "Saisir un nombre entre 0 et 100 !";
            return null
        }

        else if (saisie < 0){
            document.getElementById("information").innerHTML = "Saisir un nombre entre 0 et 100 !";
            return null
        }

        else if (saisie == ""){
           document.getElementById("information").innerHTML = "Saisir un nombre entre 0 et 100 !";
            return null
        }

        else if(isNaN(saisie)){
            alert ("Ceci n'est pas un nombre !");
             return null
         }
 

        score++;
        if (saisie > nombre){
            document.getElementById("information").innerHTML = "C'est moins !";
            return null
        }
        if (saisie < nombre)
        {
            document.getElementById("information").innerHTML = "C'est plus !";
            return null
        }
        // if (saisie = 10){
        //     alert ("You lose ! Try again ^^");
        // }
    }
    while (saisie != nombre);
    bravo();

}




