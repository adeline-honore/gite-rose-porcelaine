<?php

function db_connect(){
    try{
        // script de connection à la base de donnnées
        $bdd=new PDO('mysql:host=localhost;dbname=adelinehonore_projet;charset=utf8','adelinehonore','ZmM2NzdiNzkxMTE1ZDMxYjJjYzBiNmUz3Wa!');
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
    
    //return de la variable qui contient la bdd
    return $bdd;
}


