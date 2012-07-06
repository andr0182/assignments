// JavaScript Document
$(document).ready(function(){ 	//Do I need the e? No not here because we do not need to capture the event object.
	$('#earth a').on('click', function(ev){	//with ev we capture the event object that is being passed by the function. By giving it a nae wi are then able to capture it
		 //'.earth' is getting the <li> with the class earth in the html, (this is the same way we target the li in css).  .on is... that reads "on click execute this function...
		 	//We changed this from #earth to '#earth a' to capture the  a href link rather than the <li> becasue then we can apply ev.preventDefault(); to that event.  This will prevent the default action which is to activate the php code. 
		ev.preventDefault();
		$('article').load('includes/earth.php') 	// $('article') get the <article> (div) in the html, (this is the same way we target the article in css).  '.load' loads the contents of earth html to the article.
	});
	
	$('#mars a').on('click', function(eventObject){		//.on and .load are jQuery functions?
		eventObject.preventDefault();
		$('article').load('includes/mars.php')
	});
	
	$('#jupiter a').on('click', function(ev){
		ev.preventDefault();
		$('article').load('includes/jupiter.php')
	});
	
	$('#venus a').on('click', function(ev){
		ev.preventDefault();
		$('article').load('includes/venus.php')
	});
	
});