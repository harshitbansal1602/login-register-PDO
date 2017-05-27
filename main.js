$(document).ready(function(){
	$('#signup').hide();

	$('#registerClick').click(function(){
		$('#signup').show();
		$('#login').hide();
	});

	$('#loginClick').click(function(){
		$('#signup').hide();
		$('#login').show();
	});


});