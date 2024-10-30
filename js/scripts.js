$(document).ready(function() {
	$('#gt-loop-container').cycle({fx: 'fade'});
	
	$('.gt-delete-button').bind('click', function(){
		var link = $(this).attr('rel');
		
		$(this).parent().fadeOut(500, function(){
			$.ajax({
			  url: "/wp-content/plugins/looping_image/looping_image_delete_image.php?delete="+link,
			  cache: false
			});
			$(this).remove();
		});
	});
});