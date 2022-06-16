<?php

require('models/booking.php');

function addBooking()
{
    if(isConnect()){
        if(isset($_POST['b_msg']))
        {
            $idU=$_SESSION['id_u'];
            $nameU=$_SESSION['nom'];
            $firstnameU=$_SESSION['pnom'];
            $dateA=htmlspecialchars($_POST["b_dateA"]);
            $dateB=htmlspecialchars($_POST["b_dateB"]);
            $msg=htmlspecialchars($_POST['b_msg']);
            
            if($dateB<$dateA){
                echo "La date de fin de séjour est inférieure à la date de début de séjour.";
            }
            else{
            // enregistrement dans la bdd
            toAddBooking($idU,$nameU,$firstnameU,$dateA,$dateB,$msg);
            
            $template="booking";
            include('www/layout.phtml');
            }
        }
        else
        {
            $template="booking";
            include('www/layout.phtml');
        }
    }
    else
    {
        $template="booking";
        include('www/layout.phtml');
    }
}

function viewMyBk()
{
    if(isConnect())
    {
        $idU=$_SESSION['id_u'];
        $allMyBks=toViewMyBk($idU);
        
        $template='myBookings';
        include ('www/layout.phtml');
    }
    else
    {
        $template='home';
        include ('www/layout.phtml');
    }
}


// XXXXXXXXXX   POUR L'ADMINISTRATEUR   XXXXXXXXXX*/

// liste de toutes les réservations à partir de la date du jour
function viewBooking()
{
    if(isAdmin())
    {
        $today=date('Y-m-d');
        
        $allBookings=toViewAllB($today);
        
        $template='adminFile/allBookings';
        include('www/layout.phtml');
    }
    else
    {
        $template='home';
        include ('www/layout.phtml');
    }
}

// modification d'une réservation
function editBooking(){
    if(isAdmin())
    {
        // affichage d'une réservation
        $idB=$_GET['idB'];
        $affBk=toAffBk($idB);
       
        // récupération des données pour UPDATE dans bdd
        if(isset($_POST['dateA_e']))
        {
        $date1=$_POST['dateA_e'];
        $date2=$_POST['dateB_e'];
        $msg="msg du client: ".$_POST['msgC_e']."\r Ajout admin : ".$_POST['msg_e'];
        
        toEditBk($date1,$date2,$msg,$idB);
        
        header('Location:index.php?page=admin');
        }
        else{
            // indication du template (nom)
            $template='adminFile/editBooking';
            
            //chargement de ma vue
            include('www/layout.phtml');
        }
    }
    else
    {
        $template='home';
        include ('www/layout.phtml');
    }
}


// suppression d'une réservation
function deleteBooking()
{
    $idB=$_GET['idB'];
    toDeleteB($idB);
    header('Location:index.php?page=admin');
}
