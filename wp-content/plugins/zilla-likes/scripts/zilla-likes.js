jQuery(document).ready(function($){

	$('.zilla-likes').live('click',
	    function() {
    		var link = $(this);
    		if(link.hasClass('active')) return false;
		
    		var id = $(this).attr('id'),
    			postfix = link.find('.zilla-likes-postfix').text();
			
    		$.post(zilla_likes.ajaxurl, { action:'zilla-likes', likes_id:id, postfix:postfix }, function(data){
				$('.counter-desc').html(data);
    			link.addClass('active').attr('title','You already like this').attr('disabled', 'disabled');
    		});
		
    		return false;
	});
	
	if( $('body.ajax-zilla-likes').length ) {
        $('.counter-desc').each(function(){
    		var array = $(this).attr('id').text().split('-');
            var id = 'zilla-likes-'+array[array.length - 1];
    		$(this).load(zilla_likes.ajaxurl, { action:'zilla-likes', post_id:id });
    	});
	}

});