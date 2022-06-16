<?php

require('models/admin.php');

function isAdmin()
{
    //si la session existe return true
    if (isset($_SESSION['id_a'])){
        return true;
    }
    //sinon return false
    else{
        return false;
    }
}

// connexion de l'admin
function connectAdmin(){
    
    // /vérifier si on a déjà validé le fomulaire, si oui:
    if (isset($_POST['a_email'])) {
        
        $mail=htmlspecialchars($_POST['a_email']);
        // appel de la fonction pour vérifier son existence
        $tabA=verifAdmin($mail); 
        
        if($tabA['admin_mail']==$mail){
            // le mail existe donc on compare maintenant le mot de passe
            $pass=htmlspecialchars($_POST['a_pass'],PASSWORD_DEFAULT);// cryptage du mot de passe
            $isPassCorrect = password_verify($pass, $tabA['admin_password']);
            if($isPassCorrect)
            {
                $_SESSION['id_a']=$tabA['id_admin'];
                $_SESSION['a_nom']=$tabA['admin_name'];
                $_SESSION['a_pnom']=$tabA['admin_prenom'];
               
                $template='adminFile/admin';
                include ('www/layout.phtml');
            }
            // si password ok  donc tout est ok on crée la session: l'U se connecte à son compte
            // sinon: le password est faux alors
            else{
                 echo 'Mauvais  identifiant ou mot de passe !';
            }
        }
        // le mail n'existe pas, donc le compte n'existe pas
        else{
             // si password pas 
             echo 'Mauvais identifiant ou mot de passe !';
        }
    }
     //si formulaire pas validé:
    else{
        //définit le template
        $template='adminFile/admin';
        //et on appelle le layout
        include ('www/layout.phtml');
    }
}



