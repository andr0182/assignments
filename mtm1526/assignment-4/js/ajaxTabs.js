// JavaScript Document
$(document).ready(function(){ 	//Do I need the e?
	$('.earth').on('click', function(){ //'.earth' is getting the <li> with the class earth in the html, (this is the same way we target the li in css).  .on is... that reads "on click execute this function...
		$('article').load('earth.html') 	// $('article') get the <article> (div) in the html, (this is the same way we target the article in css).  '.load' loads the contents of earth html to the article.
	});
	
	$('.mars').on('click', function(){		//.on and .load are jQuery functions?
		$('article').load('mars.html')
	});
	
	$('.jupiter').on('click', function(){
		$('article').load('jupiter.html')
	});
	
	$('.venus').on('click', function(){
		$('article').load('venus.html')
	});
	
});


