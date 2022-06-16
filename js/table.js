'use strict';

/***********************************************************************************/
/* ********************************** FONCTIONS ************************************/
/***********************************************************************************/

function affUpImag(){
    
    let photo = document.getElementById('galerie_m') ;
    let lien = photo.getElementsByTagName('a') ;
    let big_photo = document.getElementById('upImag') ;
    
    for (let i = 0 ; i < lien.length ; ++i) {
        lien[i].onmouseover = function() {
            big_photo.src = this.href; 
            return false; // on inhibe l'action réelle du lien
        };
    }
}
