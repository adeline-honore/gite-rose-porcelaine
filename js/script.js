'use strict';
/*---------CODE PRINCIPAL------*/

document.addEventListener('DOMContentLoaded', function(){
	
    // pour l'affichage de la photo agrandie dans le tableau
	window.onload = affUpImag;
	
	// effet toggle de l'affichage des formulaires
	showHide();
	
	
	// POUR LE SLIDER
	cpt = 0;
	timer = null;
	
    let prev = document.getElementById("slider-prev");
	let next = document.getElementById("slider-next");
	
	
	next.addEventListener('click', nextSlide);
	prev.addEventListener('click', prevSlide);

	figure = document.querySelector("figure img");
	header = document.querySelector("header");
	fig = document.querySelector("figure");
	div = document.querySelector("div");
	
	// Lecture au chargement de la page
	play();
	
	// ajustement des images su slide
	hauteurSlide();
	
});
