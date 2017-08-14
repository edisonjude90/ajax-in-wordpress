(function($){

	console.log($);
	var id = 1000;
	$(document).ready(function(){
		$( document ).on( 'click', 'body', function() {
			id++;
			$.ajax({
				url : jsLocal.ajax_url, 
				type : 'post',
				data : {
					action : 'simple_ajax_call',
					id : id
				},
				success : function( response ) {
					console.log(response);
				}
			});
		});

	});

})(jQuery);	