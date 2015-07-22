jQuery(document).ready(function($){

	$('.zilla-likes').live('click',
		function() {
			var link = $(this);
			if(link.hasClass('active')) return false;

			var array = $(this).attr('id').split('-');
			var id = 'counter-desc-' + array[array.length - 1];
			var postfix = link.find('.zilla-likes-postfix').text();

			$.post(zilla_likes.ajaxurl, { action:'zilla-likes', likes_id:link.attr('id'), postfix:postfix }, function(data){
				$(document.getElementById(id)).html(data);
				link.addClass('active').attr('title','You already like this').attr('disabled', 'disabled');
			});

			return false;
		});

	if( $('body.ajax-zilla-likes').length ) {
		$('.counter-desc').each(function(){
			var array = $(this).attr('id').split('-');
			var id = 'zilla-likes-'+array[array.length - 1];
			$(this).load(zilla_likes.ajaxurl, { action:'zilla-likes', post_id:id });
		});
	}

});