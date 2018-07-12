<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Fruitful theme
 * @since Fruitful theme 1.0
 */
?>
				</div>
			</div>
		</div><!-- .page-container-->

		<!--Add Custom Widget to Footer starts-->
		<div id="footer-sidebar">
			<div class="container secondary">
				<div id="footer-sidebar1">
					<?php
					if(is_active_sidebar('footer-sidebar-1')){
					dynamic_sidebar('footer-sidebar-1');
					}
					?>
				</div>
				<div id="footer-sidebar2">
					<?php
					if(is_active_sidebar('footer-sidebar-2')){
					dynamic_sidebar('footer-sidebar-2');
					}
					?>
				</div>
				<div id="footer-sidebar3">
					<?php
					if(is_active_sidebar('footer-sidebar-3')){
					dynamic_sidebar('footer-sidebar-3');
					}
					?>
				</div>
			</div>
			
			</div>
		</div>
		<div id="bocongthuonglogo">
				<a target="_blank" href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=33106">
				<img src="http://localhost/weblinh/wp-content/uploads/2018/07/dathongbaobocongthuong-e1530813053560.png" alt="Đã thông báo bộ công thương"></a>				
			</div>
<!--Add Custom Widget to Footer starts-->

		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<div class="sixteen columns">
					<div class="site-info">
						<?php fruitful_get_footer_text(); ?>
					</div><!-- .site-info -->
					<?php if (!fruitful_is_social_header()) { 	
							   fruitful_get_socials_icon(); 
						  } 
					?>
				</div>
			</div>
			<div id="back-top">
				<a rel="nofollow" href="#top" title="Back to top">&uarr;</a>
			</div>
		</footer><!-- #colophon .site-footer -->
	<!--WordPress Development by Fruitful Code-->
<?php wp_footer(); ?>
</body>
</html>