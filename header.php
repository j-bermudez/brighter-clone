<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Brighter_AI
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<script async src="<?php echo get_stylesheet_directory_uri() . '/public/js/vendor/amp-v0.js'; ?>"></script>
	<script async custom-element="amp-video" src="<?php echo get_stylesheet_directory_uri() . '/public/js/vendor/amp-video-0.1.js'; ?>"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'brighter-ai' ); ?></a>

	<header id="masthead" class="site-header nav-down">
		<div class="container">
			<div class="site-branding">
				<?php
				$brighter_ai_description = get_bloginfo( 'description', 'display' );
				if ( $brighter_ai_description == '' ) $brighter_ai_description = __('Deep Natural Anonymization', 'brighter-ai');
				?>
				<p class="site-title">
					<a class="text-hide" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php bloginfo( 'name' ); ?> - <?php echo $brighter_ai_description; /* WPCS: xss ok. */ ?>
					</a>
				</p>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle text-hide" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'brighter-ai' ); ?><span></span></button>

				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'item_spacing' => 'discard',
				) );
				brighter_ai_languages_list();
				?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
