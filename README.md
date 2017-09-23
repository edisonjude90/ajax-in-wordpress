# ajax-in-wordpress

How to include ajax in wordpress ?

I have created a simple plugin that makes a ajax call...

note : Please make sure if you have jquery included, as it uses jquery ajax to make the call


PHP Code in simple-ajax-plugin.php

* wp_ajax_nopriv_ is used for actions performed by users who are not logged-in 
* wp_ajax_ is used for actions performed by users who are logged-in

usage :
```
wp_ajax_nopriv_[name of the action]
wp_ajax_[name of the action]
```

```
add_action( 'wp_ajax_nopriv_simple_ajax_call', 'simple_ajax_call' );  
add_action( 'wp_ajax_simple_ajax_call', 'simple_ajax_call' );

function simple_ajax_call() {
	echo "The value passed is " . $_POST['id'];
	die();
}
```
js code in test_ajax.js we are making a call to the ajax function in the plugin.
where we pass the data value with the function to be actioned....
```
data : {
	action : 'simple_ajax_call',
	id : id
},
```

```
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
```






