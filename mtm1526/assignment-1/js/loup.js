var timberLoup = function() {
	var character;
	
	while (!character) {
		character = prompt('Please type a character');
		for(var i=0; i<10; i++)
		document.write(character, '<br>');
		}
};

timberLoup ();