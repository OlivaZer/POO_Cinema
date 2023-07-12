<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Introduction POO - Exo - Cinema - Exo 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    </style>
</head>

<body>
    <h1>POO cinéma :</h1>
    <p>
    Vous avez en charge de gérer différentes entités autour de la thématique du 
cinéma.
Les films seront caractérisés par leur titre, leur date de sortie en France, leur durée (en minutes)
ainsi que leur réalisateur (unique, avec nom, prénom, sexe et date de naissance). Un résumé du film 
(synopsis) pourra éventuellement être renseigné. Chaque film est caractérisé par un seul genre 
cinématographique (science-fiction, aventure, action, ...).
Votre application devra recenser également les acteurs de chacun des films. On désire connaître le 
nom, le prénom, le sexe et la date de naissance de l’acteur ainsi que le rôle (nom du personnage) 
joué par l’acteur dans le(s) film(s) concerné(s).
Il serait intéressant d'utiliser la notion d'héritage entre classes dans cet exercice. A vous de le mettre 
en place correctement !
Attention, le rôle (par exemple James Bond) ne doit être instancié qu'une seule fois (dans la mesure 
où ce rôle a été incarné par plusieurs acteurs.)
On doit pouvoir :
Lister la liste des acteurs ayant incarné un rôle précis (ex: les acteurs ayant joué le rôle de 
Batman : Michael Keaton, Val Kilmer, George Clooney, …)
Lister le casting d'un film (dans le film Star Wars Episode IV, Han Solo a été incarné par 
Harrison Ford, Luke Skywalker a été incarné par Mark Hamill, ...)
Lister les films par genre (exemple : le genre SF est associé à X films : Star Wars, Blade 
Runner, ...)
Lister la filmographie d'un acteur (dans quels films a-t-il joué ?)
Lister la filmographie d'un réalisateur (quels sont les films qu'a réalisé ce réalisateur ?)

    </p>
    <h2>Résultat :</h2>

    <?php

    spl_autoload_register(function ($class_name) {
        require $class_name . '.php';
    });
    
    
    
    //Mes genres**************************************
    $drame = new Genre("drame");
    $comedie = new Genre("comedie");
    $action = new Genre("action");
    $historique = new Genre("historique");
    
    //Mes réalisateurs**************************************************************
    $realisateur1 = new Realisateur("Besson", "Luc", "Homme", "1959-03-18");
    $realisateur2 = new Realisateur ("Campbell","Martin","Homme","1943-09-24");
    $realisateur3 = new Realisateur ("Fukunaga","Cary Joji","Homme", "1970-07-10");
    $realisateur4 = new Realisateur ("Spielberg", "Steven", "Homme", "1946-12-18");
    

    //Mes acteurs*****************************************************************
    $acteur1 = new Acteur("Reno", "Jean", "Homme", "1948-07-30");
    $acteur2 = new Acteur ("Brosnan","Pierce","Homme","1953-04-16");
    $acteur3 = new Acteur ("Craig","Daniel","Homme", "1968-03-02");
    $acteur4 = new Acteur ("Hanks", "Tom", "Homme", "1956-07-09");
    $acteur5 = new Acteur ("Neeson", "Liam", "Homme", "1952-06-07");
    $acteur6 = new Acteur ("Willis", "Bruce", "Homme","1955-03-19");
    $acteur7 = new Acteur ("Portman", "Natalie", "Femme","1981-06-09");

    //Mes role$****************************************************
    $role1 = new Role ("Léon : The Professional");
    $role2 = new Role ("James Bond");
    $role3 = new Role ("Capitaine John H.Miller");
    $role4 = new Role ("Korben Dallas");
    $role5 = new Role ("Matilda");


    //Mes films

    $film1 = new Film("Léon", "1994", $realisateur1, 125 , "La rencontre entre Jean Reno (Léon) et Natalie Portman ( Mathilda ) ", $drame);
    //Acteur:Jean Reno //Role: Leon

    $film2 = new Film("James Bond Goldeneyes", "1995", $realisateur2 , 86 , "Première apparition de Pierces Brosnan dans un James Bond", $comedie);
    //Acteur: Pierce Brosnan //Role: James Bond

    $film3 = new Film("James Bond No time to die", "2021", $realisateur3 , 106 , "Le dernier James Bond avec Daniel Craig comme acteur", $action);
    //Acteur: Daniel Craig //Role: James Bond

    $film4 = new Film("Il faut sauver le soldat Ryan", "1998", $realisateur4, 95 , "Mais où est passé le soldat James Francis Ryan ?", $historique );
    //Acteur:Tom Kanks //Role: Capitaine John H.Miller

    $film5 = new Film("Le cinquième Elément","1997", $realisateur1, 126 , "De l'Egype au taxi de Bruce Willis", $drame);
    //Acteur: Bruce Willis //Role: Korben Dallas

    $film6 = new Film("La liste de Schindler's","1993", $realisateur4, 187 , "Liam Neeson pouurat-il tous les sauver ?", $drame);
    //Acteur: Liam Neeson  //Role: Oskar Schindler

    //Casting************************************************

    $casting1 = new Casting ($acteur1, $film1, $role1);
    $casting2 = new Casting ($acteur3, $film3, $role2);
    $casting4 = new Casting ($acteur2, $film2, $role2);
    $casting3 = new Casting ($acteur4, $film4, $role3);
    $casting5 = new Casting ($acteur6, $film5, $role4);
    $casting6 = new Casting ($acteur4, $film6, $role2);

    


    //**Methode d'affichage ****************************************

    //Variables
    $afficherFilms = [ $film1, $film2, $film3, $film4, $film5, $film6 ];

    //functions
    function afficherTousFilms($afficherFilms) {
        foreach ($afficherFilms as $afficherFilm) {
            echo '<div>'. $afficherFilm. '<hr></div>' ;
        }
    }

    //**Affichage *******************************************

    echo '<h2> Liste des films :</h2>';
    afficherTousFilms($afficherFilms);
    //Liste de la filmographie d'un réalisateur
    echo '<h2> Les films par réalisateurs : </h2><br>';
    echo $realisateur1 -> afficherFilmReal();

    //Liste des films par genre
    echo '<h2> Les films par genres :</h2><br>';
    echo $drame -> filmsParGenres();

    //Liste du casting d'un film
    echo '<h2> Casting par films :</h2><br>';
    echo $film1-> afficherCasting();
    echo '<br>';
    echo $film2-> afficherCasting();

    //Liste de la filmographie d'un acteur
    echo '<h2> Films par acteurs : </h2>';
    echo $acteur1 ->afficherFilmographie();
    

  

    ?>

</body>

</html>