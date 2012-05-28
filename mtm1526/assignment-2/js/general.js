// JavaScript Document
//This is T's code from to-do.js
/*var todo = document.getElementById('todo');
var myitem = document.getElementById('myitem');
document.getElementsByTagName('form')[0].addEventListener('submit', function (e) {
	e.preventDefault();

			if (item.value != '') {
		var newItem = document.createElement('li');

		newItem.innerHTML = item.value;
		todo.appendChild(newItem);
	}
	
	item.value = '';
}, false);

todo.addEventListener('click', function (e) {
	if (e.target.className == 'deleted') {
		e.target.className = '';
	} else {
		e.target.className = 'deleted';
	}
}, false);*/


$(document).ready(function () {
	$('form').on('submit', function (ev) {
		ev.preventDefault();
		//console.log('form submitted');
		//how do I access the console.log info in MAMP?
		
		//get the thing from jquery??
		var myitem = $('#myitem').val();
		//.prepend(), .before(), .after(), .html()
		$('.todo').append('<li>' + myitem + '</li>');
		$('.todo li:last-child').hide().fadeIn(1000);//change to 300 for a more snappy fade.
		$('#myitem').val(''); 
});
	
	$('.todo').on('click', 'li', function () {	//we are listening for any li that is inside the todos
		$(this).toggleClass('done');
	});
	
	// .style.backgroundColor = '#f00';
	//$('elem').css('background-color', '#f00')
});