<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package blog_and_blog
 */

get_header(); ?>

	<div id="primary" class="<?php
	if ( is_active_sidebar( 'sidebar-1' ) ) {
		$val = 'featured-content';
	} else {
		$val = 'featured-content-fullpage';
	}
	echo $val;
	?> content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

			// the_post_navigation();

			// blog_and_blog_related_posts();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
