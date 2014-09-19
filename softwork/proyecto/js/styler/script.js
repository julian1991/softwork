
var setSectionHeights = function() {

	setTimeout( function() {
		var innerHeight = $(window).innerHeight();

		$('#middle').css({
			'min-height': innerHeight
		});
		
		$('#sidebar').css({
			'min-height': innerHeight
		});
	}, 500);
	
};

$(document).ready(function(){

	
	$('.navbar-toggle[data-toggle="side-menu"]').click( function() {
		var target = $(this).attr('data-target');

		if ($(target).hasClass('in')) {
			$('#middle').animate({
				left: 0
			}, 300);
			$(target).removeClass('in');
		}
		else {
			$('#middle').animate({
				left: 200
			}, 300);
			$(target).addClass('in');
		}
	});

	setSectionHeights();

	$(window).resize( function() {
		setSectionHeights();
	});


	// messages
	$('.message.old').click( function() {
		$(this).toggleClass('on').find('.body').toggle();
	});


	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();


	$('.code-preview li a').click( function() {
		var $parent = $(this).parents('.panel');
		var $task = $(this).attr('href').split('#')[1];

		// prevent action if the page is same with link clicked
		if ($parent.find('div.' + $task).is(':visible')) {
			return false;
		}

		$parent.find('.panel-utility li').removeClass('active');
		$parent.find('.panel-body > div').slideUp('fast', function() {
			$parent.find('div.' + $task).slideDown('fast');
		});
		$(this).parent('li').addClass('active');
		return false;
	});


	if ($('.error-page').length) {
		setInterval( function() {
			$('.error-page')
				.find('.code')
				.toggleClass('animated')
				.toggleClass('tada');
		}, 3000);
	}

	$('#flotTip').remove();
});


