<?php

require('models/comments.php');

function affAllComm()
{
    $allComms=getAllComm();
    $template="comments";
    include('www/layout.phtml');
}



function addComm()
{
    if(isset($_POST['comm_msg']))
    {
        $text=htmlspecialchars($_POST['comm_msg']);
        $pseudo=htmlspecialchars($_POST['comm_pseudo']);
        $mail=htmlspecialchars($_POST['comm_mail']);
        
        toAddComm($text,$pseudo,$mail);
        header('Location:index.php?page=affComments');
    }
    else
    {
        $template="comments";
        include('www/layout.phtml');
    }
}

