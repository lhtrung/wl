<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */

get_header(); ?>
	
	<?php fruitful_get_content_with_custom_sidebar('blogright'); ?>

	
	<?php
	$params = array(
		'post_type' => 'product',
		'post_status'=>'publish'
		); // (1)
	$wc_query = new WP_Query($params); // (2)
	?>
	<?php if ($wc_query->have_posts()) : // (3) ?>
		<?php $wc_query->the_post(); // (4.1) ?>
	<?php echo '<table>'?>
	<?php echo '<tr><th>'?>
	<?php global $post, $product; $cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) ); echo $product->get_categories( ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', $cat_count, 'woocommerce' ) . ' ', '</span>' ); ?> 
	<?php echo '</th></tr>'?>

	<?php
	echo
    '<tr>
        <td>' ?>
		<?php the_title();
		echo '</td>' ?>

		<?php echo '<td>' ?> 
		<?php echo get_post_meta( get_the_ID(), '_regular_price', true ); ?>
		<?php echo '</td>
		</tr>';
		?>

	<?php while ($wc_query->have_posts()) : // (4)
					$wc_query->the_post(); // (4.1) ?>
	
	
	
	
	<?php
	echo
    '<tr>'
         ?>
		
		<?php echo '<td>'
		?>		 
		<?php the_title();
		echo '</td>' ?>

		<?php echo '<td>' ?> 
		<?php echo get_post_meta( get_the_ID(), '_regular_price', true ); ?>
		<?php echo '</td>
		</tr>';
		?>
	<?php endwhile; ?>


    


<?php echo '
</table>';
?>

	<?php wp_reset_postdata(); // (5) ?>
	<?php else:  ?>
	<p>
		 <?php _e( 'No Products' ); // (6) ?>
	</p>
	<?php endif; ?>

	

<?php get_footer(); ?>