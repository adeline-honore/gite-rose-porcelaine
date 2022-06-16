<?php


function verifAdmin($mail){
    
    //récupération de la bdd
    $bdd=db_connect();
    
    // préparation de la requete
    $query=$bdd->prepare("SELECT * FROM admin WHERE admin_mail=?");
    
    // execution de la requete
    $query->execute(array($mail));
    //var_dump($query->errorInfo());
    // la requete nous renvoie un tableau 
    $tabA=$query->fetch();
    return $tabA;
}





