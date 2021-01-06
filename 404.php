<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Brighter_AI
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found container">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'That page can&rsquo;t be found.', 'brighter-ai' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p class="has-medium-font-size"><?php esc_html_e( 'This is a 404 error. Nothing was found at this location. Maybe the page was anonymized?', 'brighter-ai' ); ?> &#128515;</p>
					<p class="has-medium-font-size"><?php esc_html_e( 'Please choose a page from the main menu or go back to the start page by clicking on our logo.', 'brighter-ai' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
