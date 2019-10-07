<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blog_and_blog
 */

?>
</div>
</div><!-- #content -->
<hr>
<footer id="colophon" class="site-footer clearfix">

	<div class="content-wrap">


<div class="site-info">
	<?php echo __('&copy;', 'Blog and Blog') ?> <?php echo esc_html(date('Y')); ?> <?php bloginfo( 'name' ); ?>
	<!-- Delete below lines to remove copyright from footer -->
	<span class="footer-info-right">
		<?php echo __(' | WordPress Theme by', 'Blog and Blog') ?> <a href="<?php echo esc_url('https://wp-sultan.com/', 'Blog and Blog'); ?>"><?php echo __(' Blog and Blog', 'Blog and Blog') ?></a>
	</span>
	<!-- Delete above lines to remove copyright from footer -->

</div><!-- .site-info -->
</div>



</footer>
<hr>
</div>
<!-- Off canvas menu overlay, delete to remove dark shadow -->
<div id="smobile-menu" class="mobile-only"></div>
<div id="mobile-menu-overlay"></div>

<?php wp_footer(); ?>
</div>
<a href="javascript:" id="return-to-top"><i class="dashicons dashicons-arrow-up-alt2"></i></a>

<script>
    AOS.init();
</script>
<script>
    jQuery(document).ready(function( $ ) {
        $(window).scroll(function() {

            var st = $(this).scrollTop();
            if( st > 100 ) {
                $("#primary-site-navigation").addClass("stickynew");
                $("#menuid").addClass("stickemobile");
                $("#remove").removeClass("pmenu");
            } else {
                $("#primary-site-navigation").removeClass("stickynew");
                $("#menuid").removeClass("stickemobile");
                $("#remove").addClass("pmenu");

            }
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200);    // Fade in the arrow
            } else {
                $('#return-to-top').fadeOut(200);   // Else fade out the arrow
            }
        });
        $('#return-to-top').click(function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });

        $(document).keypress(function(e) {
            if (e.keyCode == 27) {
                $("#myOverlay").fadeOut(200);
                $('#MyIcon').css('display', 'block');
                $('#SearchF').val("");
//or
            }
        });
        $("#MyIcon").click(function(e) {
            $('#myOverlay').css('display', 'block');
            $('#MyIcon').css('display', 'none');
            $('#SearchF').focus();
        });
        $("#XXX").click(function(e) {
            $('#myOverlay').css('display', 'none');
            $('#MyIcon').css('display', 'block');
            $('#SearchF').val("");
        });

    });


    // ===== Scroll to Top ====

</script>


</body>
</html>
