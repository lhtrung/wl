<?php
/**
 * The template for displaying Home Page.
 *
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */

get_header(); ?>

<?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
		include( get_home_template() );
	} else {
		include( get_page_template() );
	}
	/*fruitful_get_content_with_custom_sidebar('homepage'); */
?>
		
<?php get_footer(); ?>