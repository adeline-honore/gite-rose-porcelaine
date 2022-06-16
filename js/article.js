'use strict';   // Mode strict du JavaScript

/***********************************************************************************/
/* ******************************** FONCTIONS *********************************/
/***********************************************************************************/

function showHide(){
	
	let button = document.querySelectorAll('.toggleF');
	
	for (let i = 0 ; i < button.length ; ++i) {
		button[i].onclick = function() {
			let formT=button[i].nextElementSibling;
			formT.classList.toggle("show");
        };
    }
}
