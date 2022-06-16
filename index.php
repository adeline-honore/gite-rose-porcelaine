<?php

// fonction pour créer des sessions
session_start();

// lien vers la base de donnéés
require('config/database.php');

//lien vers les controlleurs
require('controllers/home.php');
require('controllers/comments.php');
require('controllers/booking.php');
require('controllers/user.php');
require('controllers/admin.php');

// appel de la page
if(isset($_GET['page'])){
    switch($_GET['page']){
        case "home":
            viewSlider();
        break;
        case "gite":
            viewGite();
        break;
        case "affComments":
            affAllComm();
        break;
       case "addComment":
           addComm();
        break;
        case "hobbies":
            viewHobbies();
        break;
        case "lunch":
            viewLunch();
        break;
        case "contact":
            viewContact();
        break;
        case "createUser":
            createUser();
        break;
        case "loginUser":
            connexion();
        break;
        case "booking":
            addBooking();
        break;
        case "myBookings":
            viewMyBk();
        break;
        case "loginAdmin":
            connectAdmin();
        break;
        case "allBookings":
            viewBooking();
        break;
        case "admin":
            connectAdmin();
        break;
        case "editBooking":
            editBooking();
        break;
        case "delete":
            deleteBooking();
        break;
        case "deconnect":
            deconnect();
        break;
    }
}// si page n'existe pas ou on ne peut pas se connecter: retour à l'accueil
else{
    viewSlider();
}


