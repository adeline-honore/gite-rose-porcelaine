<?php

function toAddBooking($idU,$nameU,$firstnameU,$dateA,$dateB,$msg)
{
    //récupération de la bdd
    $bdd=db_connect();
    
    //préparation de la requête
    $query=$bdd->prepare("INSERT INTO booking (id_user,user_name,user_prenom,date_debut,date_fin,message) VALUES(?,?,?,?,?,?)");
    
    //execution de la requete
    $query->execute(array($idU,$nameU,$firstnameU,$dateA,$dateB,$msg));
}


function toViewMyBk($idU)
{
    $bdd=db_connect();
    //préparation de la requête
    $query=$bdd->prepare("SELECT * FROM booking WHERE id_user=? ORDER BY id_booking");
    
    //execution de la requete
    $query->execute(array($idU));
    
    //récupération des données
    $allMyBks=$query->fetchAll();
    return $allMyBks;
}


// XXXXXXXXXXXXX POUR L'ADMIN   XXXXXXXXXXXXXX */


function toViewAllB($today)
{
    //récupération de la bdd
    $bdd=db_connect();
    
    //préparation de la requête
    $query=$bdd->prepare("SELECT * FROM booking where date_debut>=? ORDER BY date_debut");
    
    //execution de la requete
    $query->execute(array($today));
    $allBookings=$query->fetchAll();
    return $allBookings;
}

function toAffBk($idB)
{
    $bdd=db_connect();
    //préparation de la requête
    $query=$bdd->prepare("SELECT * FROM booking WHERE id_booking=?");
    
    //execution de la requete
    $query->execute(array($idB));
    
    //récupération des données
    $affBk=$query->fetch();
    return $affBk;
}

function toEditBk($date1,$date2,$msg,$idB)
{
    $bdd=db_connect();
    
    $query=$bdd->prepare("UPDATE booking SET date_debut=?,date_fin=?,message=? WHERE id_booking=?");
    $query->execute(array($date1,$date2,$msg,$idB));
    var_dump($query->errorInfo());
}

function toDeleteB($idB)
{
     $bdd=db_connect();
    $query=$bdd->prepare("DELETE FROM booking WHERE id_booking=?");
    $query->execute(array($idB));
}