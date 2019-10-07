<?php
/**
 * blog_and_blog Theme Customizer
 *
 * @package blog_and_blog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function blog_and_blog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'blog_and_blog_customize_partial_blogname',
			) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'blog_and_blog_customize_partial_blogdescription',
			) );
	}
	$wp_customize->add_setting( 'website_background_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'website_background_color', array(
		'label'       => __( 'Background Color', 'blog_and_blog' ),
		'section'     => 'colors',
		'priority'   => 1,
		'settings'    => 'website_background_color',
		) ) );
	$wp_customize->add_setting( 'header_background_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
		'transport'         => 'postMessage',
		) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_background_color', array(
		'label'       => __( 'Header Background Color', 'blog_and_blog' ),
		'section'     => 'colors',
		'priority'   => 1,
		'settings'    => 'header_background_color',
		) ) );
}
add_action( 'customize_register', 'blog_and_blog_customize_register' );




if(! function_exists('blog_and_blog_customizer_css_final_output' ) ):
	function blog_and_blog_customizer_css_final_output(){
		?>

		<style type="text/css">
		body, 
		.site, 
		.swidgets-wrap h3, 
		.post-data-text { background: <?php echo esc_attr(get_theme_mod( 'website_background_color')); ?>; }
		
		.site-title a, 
		.site-description { color: <?php echo esc_attr(get_theme_mod( 'header_logo_color')); ?>; }
		
		.sheader { background: <?php echo esc_attr(get_theme_mod( 'header_background_color')); ?> }
		</style>
		<?php }
		add_action( 'wp_head', 'blog_and_blog_customizer_css_final_output' );
		endif;

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function blog_and_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function blog_and_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function blog_and_blog_customize_preview_js() {
	wp_enqueue_script( 'blog_and_blog-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'blog_and_blog_customize_preview_js' );
