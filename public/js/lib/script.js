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

$(window).load(function() {
	// Animate loader off screen
	$(".se-pre-con").fadeOut("slow");;
});