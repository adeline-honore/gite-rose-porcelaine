<?php

function getAllComm()
{
    //récupération de la bdd
    $bdd=db_connect();
    
    //préparation de la requête
    $query=$bdd->prepare("SELECT * FROM comments ORDER BY id_comm");
    
    //execution de la requete
    $query->execute();
    $allComms=$query->fetchAll();
    return $allComms;
}

function toAddComm($text,$pseudo,$mail){
    
    //récupération de la bdd
    $bdd=db_connect();

    // préparation de la requete
    $query=$bdd->prepare("INSERT INTO comments (comm_text,pseudo,comm_mail,comm_date) VALUES(?,?,?,NOW())");
        
    // execution de la requete
    $query->execute(array($text,$pseudo,$mail));
}




