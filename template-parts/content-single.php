<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog_and_blog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('posts-entry ffbox'); ?>>
		<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-thumbnail hovereffect-single animated fadeIn">
			<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('blog_and_blog-slider'); ?></a>
		</div>
	<?php endif; ?>
	<header class="entry-header ">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta ">
			<div class="blog-data-wrapper">
				<div class="post-data-divider"></div>
				<div class="post-data-positioning">
					<div class="post-data-text">
						<?php blog_and_blog_posted_on(); ?>
					</div>
				</div>
			</div>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content animated fadeIn">
		<?php the_content(); ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'blog_and_blog' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
