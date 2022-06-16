<?php 

function viewSlider()
{
    $template='home';
    include('www/layout.phtml');
}

function viewGite(){
    $template='gite';
    include('www/layout.phtml');   
}

function viewLunch(){
    $template='lunch';
    include('www/layout.phtml');   
}

function viewHobbies(){
    $template='hobbies';
    include('www/layout.phtml');   
}

function viewContact(){
    $template='contact';
    include('www/layout.phtml');   
}


/*
function viewAdminControl(){
    if(isAdmin())
    {
        $template='adminFile/admin';
        include('www/layout.phtml');   
    }
    else
    {
        $template='home';
        include('www/layout.phtml');
    }
}

*/