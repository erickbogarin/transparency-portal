$(window).on('beforeprint load resize', function(){
	var win = $(this);
	if (win.width() < 970) { 

		$('#sidebar').addClass('collapse');

	}
	else
	{
		$('#sidebar').removeClass('collapse');
	}

});

