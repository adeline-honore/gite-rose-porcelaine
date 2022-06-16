<?php

require('models/user.php');

//fonction qui retourne true si l'utilisateur est connecté et false s'il ne l'est pas
function isConnect(){
    if (isset($_SESSION['id_u'])){
        return true;
    }
    //sinon return false
    else{
        return false;
    }
}

function createUser(){
    
    // /vérifier si on a déjà validé le fomulaire, si oui:
    if (isset($_POST['u_nom'])) {
        
        $nom=htmlspecialchars($_POST['u_nom']);
        $prenom=htmlspecialchars($_POST['u_pnom']);
        $adresse=htmlspecialchars($_POST['u_adress']);
        $ville=htmlspecialchars($_POST['u_city']);
        $codeP=htmlspecialchars($_POST['u_cp']);
        $country=htmlspecialchars($_POST['u_country']);
        $tel=htmlspecialchars($_POST['u_tel']);
        $mail=htmlspecialchars($_POST['u_email']);
        $pass=password_hash($_POST['u_pass'],PASSWORD_DEFAULT);// cryptage du mot de passe
        
        
        // appel de la fonction du model addUser:
        addUser($nom,$prenom,$adresse,$country,$codeP,$mail,$tel,$pass);
        
        //si on l'a validé, on insère les données en bdd
        
        $template='booking';
        include ('www/layout.phtml');
        }
    //si non
    else{
        $template='booking';
        include ('www/layout.phtml');
    }
}


function connexion(){
    
    // /vérifier si on a déjà validé le fomulaire, si oui:
    if (isset($_POST['u_email'])) {
        
        // récupération de l'email du user
        $mail=htmlspecialchars($_POST['u_email']);
        
        //vérifier son existence de l'email dans bdd
        $tabU=verifUser($mail);
        
        if($tabU['user_email']==$mail){
            // le mail existe donc on compare maintenant le mot de passe
            $pass=htmlspecialchars($_POST['u_pass'],PASSWORD_DEFAULT);// cryptage du mot de passe
            $isPassCorrect = password_verify($pass, $tabU['user_password']);
            if($isPassCorrect)
            {
                $_SESSION['id_u']=$tabU['id_user'];
                $_SESSION['nom']=$tabU['user_name'];
                $_SESSION['pnom']=$tabU['user_prenom'];
                
                $template='booking';
                include ('www/layout.phtml');
            }
            // si password ok alorsdonc tout est ok on crée la session: l'U se connecte à son compte
            else{
                 echo 'Mauvais identifiant ou mot de passe !';
            }
        }
        // le mail n'existe pas, donc le compte n'existe pas
        else{
             // si password pas bon alors message "rentrer un password valide"
             echo "Ce compte n existe pas, vous pouvez en créer un avec cet email.";
        }
    }
     //si formulaire pas validé:
    else{
        $template='booking';
        include ('www/layout.phtml');
    }
}


function deconnect(){
    
    // Détruit toutes les variables de session
    unset($_SESSION);

    // Finalement, on détruit la session.
    session_destroy();
    
    //redirection vers l'accueil
    header('Location:index.php');
}

