<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Brighter_AI
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer bg-blue-dark">
		<div class="container">
			<p class="site-title text-hide">
				<?php
				$brighter_ai_description = get_bloginfo( 'description', 'display' );
				if ( $brighter_ai_description == '' ) $brighter_ai_description = __('Deep Natural Anonymization', 'brighter-ai');
				bloginfo( 'name' ); ?> - <?php echo $brighter_ai_description; /* WPCS: xss ok. */
				?>
			</p>

			<div class="footer-widgets">
				<div class="widget-area footer-1">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div>

				<div class="widget-area footer-2">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div>
			</div>

			<div class="site-info">
				<p class="copyright"><span class="copyright-icon">&copy;</span> <?php echo date('Y') . ' ' . __( 'Brighter AI', 'brighter-ai' ); ?></p>

				<nav id="footer-navigation" class="footer-navigation">
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-footer',
						'menu_id' => 'footer-menu',
						'menu_class' => 'footer-menu menu',
						'item_spacing' => 'discard',
					) );
					?>
				</nav><!-- #site-navigation -->
			</div><!-- .site-info -->

			<div class="to-top">
				<a class="to-top-button" href="#" title="<?php _e('Back to top', 'brighter-ai'); ?>"></a>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
