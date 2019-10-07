( function( api ) {

	// Extends our custom "blog_and_blog" section.
	api.sectionConstructor['blog_and_blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
