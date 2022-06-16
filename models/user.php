<?php


function addUser($nom,$prenom,$adresse,$country,$codeP,$mail,$tel,$pass)
{
    //récupération de la bdd
    $bdd=db_connect();

    // préparation de la requete
    $query=$bdd->prepare("INSERT INTO users (user_name,user_prenom,user_adress,user_ville,user_codeP,user_email,user_tel,user_password) VALUES(?,?,?,?,?,?,?,?)");
        
    // execution de la requete
    $query->execute(array($nom,$prenom,$adresse,$country,$codeP,$mail,$tel,$pass));
}


function verifUser($mail){
    
    //récupération de la bdd
    $bdd=db_connect();
    
    // préparation de la requete
    $query=$bdd->prepare("SELECT * FROM users WHERE user_email =?");
    
    // execution de la requete
    $query->execute(array($mail));
    
    $tabU=$query->fetch();
    return $tabU;
}
