// On document ready:

( function( $ ) {

	// Instantiate MixItUp:

	$('#portfolio-items').mixItUp();

    $("#project-indicators").owlCarousel({
      items : 3,
        navigation : true, // Show next and prev buttons
        autoPlay: 3000, //Set AutoPlay to 3 seconds
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:false

        // "singleItem:true" is a shortcut for:
        // items : 1, 
        // itemsDesktop : false,
        // itemsDesktopSmall : false,
        // itemsTablet: false,
        // itemsMobile : false
      });

} )( jQuery );