(function($) {
	$(document).ready(function() {

		/*
		 * Masonry
		 */
		var $container = $( ".create-masonry #main" );

		$container.imagesLoaded( function(){
			$container.masonry ({
				itemSelector: '.hentry',
				isFitWidth: true,
				columnWidth: 261,
				gutter: 60,
			});

			$container.find( '.hentry' ).animate( {
				'opacity' : 1
			} );
		});

		$( document ).on( "post-load", function () {
			setTimeout( function() {
				$container.imagesLoaded( function() {
					$container.masonry( 'reloadItems' ).masonry( 'layout' );
					$container.find( '.hentry' ).animate( {
						'opacity' : 1
					} );
				});
			}, 1500 );
		});
		
		/*
		 * Comment placeholders
		 * (Localized via wp_localize_script in functions file)
		 */
		$( '#author' ).attr( 'placeholder','Your Name' );
		$( '#email' ).attr( 'placeholder','E-mail' );
		$( '#url' ).attr( 'placeholder','Website' );
		$( '#comment' ).attr( 'placeholder','Your Comment' );
	});
})(jQuery);