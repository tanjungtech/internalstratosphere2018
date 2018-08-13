/*
** Default functions of Instrat New Layout
*/

( function( $ ) {

	$( document ).ready( function() {
		$('#page').fadeIn(1000);
		$(window).on( 'scroll', function(){
	        $('.fadeIn').each( function(i){	            
	            var bottom_of_element = $(this).prev().offset().top + $(this).prev().outerHeight() + 100;
	            var bottom_of_window = $(window).scrollTop() + $(window).height();
	            if( bottom_of_window > bottom_of_element ){
	                $(this).animate({'opacity':'1'},1000);
	            }
	            
	        }); 
	    });
	} );
} )( jQuery );