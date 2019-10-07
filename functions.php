<?php
/**
 * blog_and_blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blog_and_blog
 */


if ( ! function_exists( 'blog_and_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */

function blog_and_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on blog_and_blog, use a find and replace
		 * to change 'blog_and_blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'blog_and_blog', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 300 );

		add_image_size( 'blog_and_blog-grid', 350 , 230, true );
		add_image_size( 'blog_and_blog-slider', 850 );
		add_image_size( 'blog_and_blog-small', 300 , 180, true );


		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1'	=> esc_html__( 'Primary', 'blog_and_blog' ),
			) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
			) );
	}
	endif;
	add_action( 'after_setup_theme', 'blog_and_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blog_and_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blog_and_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'blog_and_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blog_and_blog_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'blog_and_blog' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blog_and_blog' ),
		'before_widget' => '<section id="%1$s" class="fbox swidgets-wrap widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="swidget"><div class="sidebar-title-border"><h3 class="widget-title">',
		'after_title'   => '</h3></div></div>',
		) );




}




add_action( 'widgets_init', 'blog_and_blog_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function blog_and_blog_scripts() {
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/css/aos.css' );
	wp_enqueue_style( 'blog_and_blog-style', get_stylesheet_uri() );
	//wp_enqueue_style( 'hover', get_template_directory_uri() . '/css/hover-min.css' );



	wp_enqueue_script( 'blog_and_blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20170823', true );
	wp_enqueue_script( 'blog_and_blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20170823', true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array('jquery'), '20150423', true );
	wp_enqueue_script( 'blog_and_blog-script', get_template_directory_uri() . '/js/script.js', array(), '20160720', true );
	wp_enqueue_script( 'aos-script', get_template_directory_uri() . '/js/aos.js', array(), null, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'blog_and_blog_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Google fonts, credits can be found in readme.
 */

function blog_and_blog_google_fonts() {

	wp_enqueue_style( 'blog_and_blog-google-fonts', 'https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Merriweather:400,700', false );
}

add_action( 'wp_enqueue_scripts', 'blog_and_blog_google_fonts' );


/**
 * Dots after excerpt
 */

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');



/**
 * Blog Pagination
 */
if ( !function_exists( 'blog_and_blog_numeric_posts_nav' ) ) {

	function blog_and_blog_numeric_posts_nav() {

		$prev_arrow = is_rtl() ? 'Previous' : 'Next';
		$next_arrow = is_rtl() ? 'Next' : 'Previous';

		global $wp_query;
		$total = $wp_query->max_num_pages;
		$big = 999999999; // need an unlikely integer
		if( $total > 1 )  {
			if( !$current_page = get_query_var('paged') )
				$current_page = 1;
			if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
			} else {
				$format = '&paged=%#%';
			}
			echo wp_kses_post(paginate_links(array(
				'base'			=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'		=> $format,
				'current'		=> max( 1, get_query_var('paged') ),
				'total' 		=> $total,
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> 'Previous',
				'next_text'		=> 'Next',
				) ));
		}
	}

}




/**
 *  Copyright and License for Upsell button by Justin Tadlock - 2016-2018 © Justin Tadlock. customizer button https://github.com/justintadlock/trt-customizer-pro
 */
require_once( trailingslashit( get_template_directory() ) . 'justinadlock-customizer-button/class-customize.php' );


/**
 * Compare page CSS
 */

function blog_and_blog_comparepage_css($hook) {
	if ( 'appearance_page_blog_and_blog-info' != $hook ) {
		return;
	}
	wp_enqueue_style( 'blog_and_blog-custom-style', get_template_directory_uri() . '/css/compare.css' );
}
add_action( 'admin_enqueue_scripts', 'blog_and_blog_comparepage_css' );

/**
 * Compare page content
 */

add_action('admin_menu', 'blog_and_blog_themepage');
function blog_and_blog_themepage(){
	$theme_info = add_theme_page( __('blog_and_blog','blog_and_blog'), __('blog_and_blog','blog_and_blog'), 'manage_options', 'blog_and_blog-info.php', 'blog_and_blog_info_page' );
}

function blog_and_blog_info_page() {
	$user = wp_get_current_user();
	?>
	<div class="wrap about-wrap blog_and_blog-add-css">
		<div>
			<h1>
				<?php echo __('Welcome to blog_and_blog!','blog_and_blog'); ?>
			</h1>

			<div class="feature-section three-col">
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo __("Contact Support", "blog_and_blog"); ?></h3>
						<p><?php echo __("Getting started with a new theme can be difficult, if you have issues with blog_and_blog then throw us an email.", "blog_and_blog"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/help-contact/', 'blog_and_blog'); ?>" class="button button-primary">
							<?php echo __("Contact Support", "blog_and_blog"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo __("View our other themes", "blog_and_blog"); ?></h3>
						<p><?php echo __("Do you like our concept but feel like the design doesn't fit your need? Then check out our website for more designs.", "blog_and_blog"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/wordpress-themes/', 'blog_and_blog'); ?>" class="button button-primary">
							<?php echo __("View All Themes", "blog_and_blog"); ?>
						</a></p>
					</div>
				</div>
				<div class="col">
					<div class="widgets-holder-wrap">
						<h3><?php echo __("Premium Edition", "blog_and_blog"); ?></h3>
						<p><?php echo __("If you enjoy blog_and_blog and want to take your website to the next step, then check out our premium edition here.", "blog_and_blog"); ?></p>
						<p><a target="blank" href="<?php echo esc_url('https://superbthemes.com/blog_and_blog/', 'blog_and_blog'); ?>" class="button button-primary">
							<?php echo __("Read More", "blog_and_blog"); ?>
						</a></p>
					</div>
				</div>
			</div>
		</div>
		<hr>

		<h2><?php echo __("Free Vs Premium","blog_and_blog"); ?></h2>
		<div class="blog_and_blog-button-container">
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/blog_and_blog/', 'blog_and_blog'); ?>" class="button button-primary">
				<?php echo __("Read Full Description", "blog_and_blog"); ?>
			</a>
			<a target="blank" href="<?php echo esc_url('https://superbthemes.com/demo/blog_and_blog/', 'blog_and_blog'); ?>" class="button button-primary">
				<?php echo __("View Theme Demo", "blog_and_blog"); ?>
			</a>
		</div>


		<table class="wp-list-table widefat">
			<thead>
				<tr>
					<th><strong><?php echo __("Theme Feature", "blog_and_blog"); ?></strong></th>
					<th><strong><?php echo __("Basic Version", "blog_and_blog"); ?></strong></th>
					<th><strong><?php echo __("Premium Version", "blog_and_blog"); ?></strong></th>
				</tr>
			</thead>

			<tbody>
				<tr>
					<td><?php echo __("Header Background Color", "blog_and_blog"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Header Logo Or Text	", "blog_and_blog"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Hide Logo Text", "blog_and_blog"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Customize Sidebar Color", "blog_and_blog"); ?></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Premium Support", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Recent Posts Widget", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Easy Google Fonts", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Pagespeed Plugin", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Recent Posts Widget", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Logo Container Background Image", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Only Show Header Image On Front Page", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Text On Header Image", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Custom Header Image Height", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Only Show Upper Widgets On Front Page", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Replace Copyright Text", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Customize Upper Widgets Colors", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Customize Navigation Color", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Customize Post/Page Color", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Customize Blog Feed Color", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Customize Footer Color", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Header Background Image", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
				<tr>
					<td><?php echo __("Customize Background Color", "blog_and_blog"); ?></td>
					<td><span class="cross"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/cross.png' ); ?>" alt="<?php echo __("Feature Is Not Available", "blog_and_blog"); ?>" /></span></td>
					<td><span class="checkmark"><img src="<?php echo esc_url( get_template_directory_uri() . '/icons/check.png' ); ?>" alt="<?php echo __("Feature Is Available", "blog_and_blog"); ?>" /></span></td>
				</tr>
			</tbody>
		</table>

	</div>
	<?php
}
// Add scripts to wp_footer()

function meks_time_ago() {
	return human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ).' '.__( 'ago' );
}