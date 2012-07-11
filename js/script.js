$(document).ready(function() {
	var x = 0;

	$.fn.wait = function(time, type) {
	    time = time || 3000;
	    type = type || "fx";
	    return this.queue(type, function() {
	        var self = this;
	        setTimeout(function() {
	            $(self).dequeue();
	        }, time);
	    });
	};

	if( $('body').hasClass('mobile') ) {
		console.log('mobile');
	    function slide() {
	      	$("#slide1_images")
	      	.wait()
	      	.animate({left: '-=186px'}, 500, 
	      		function() {
	              	x++;
	              	if(x>4) {
	              		$("#slide1_images").css('left', '0px');
	              		x = 0;
	              	}
	              	slide();
	              });
	    }
	    slide();
	} else  {
		console.log('emarketing & eshop');
		var last = 'slide1';
		
		$('.slider .point').click(function() {
			console.log('click');
			$('#'+last).fadeOut('slow');
			var id = $(this).attr('id');
			$('#'+id).fadeIn('slow');
			$(this).addClass('active');
			$('#'+last+'.point').removeClass('active');
			last = id;
			return false;
		});
	}
});