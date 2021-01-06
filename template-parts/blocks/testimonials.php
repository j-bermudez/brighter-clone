<?php
/**
 * Testimonials Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonials bg-green-light has-margin not-fullscreen';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$headline = get_field('headline');
$columns = get_field('columns');
?>


<?php if( have_rows('testimonials') ): ?>
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>" data-columns="<?php echo $columns; ?>">
		<?php if( $headline != '' ) : ?>
			<h2 class="has-large-font-size has-text-align-center"><?php echo $headline; ?></h2>
		<?php endif; ?>

		<div class="testimonials-slider">
			<?php while( have_rows('testimonials') ): the_row();

				// Load values and assign defaults.
				$image = get_sub_field('t_image') ?: 32;
				$text = get_sub_field('t_quote') ?: 'Your testimonial here...';
				$author = get_sub_field('t_author');
				$link = get_sub_field('t_link');
				?>
				<div class="testimonials-slide testimonial-container<?php if($link) { echo ' js-open-url'; } ?>"<?php if($link) { echo ' data-url="' . esc_url($link) . '"'; } ?>>
					<div class="testimonial-image" style="background-image: url('<?php echo wp_get_attachment_image_url( $image, 'medium' ); ?>');"></div>

					<blockquote class="testimonial-blockquote">
						<span class="testimonial-text has-medium-font-size"><?php echo $text; ?></span>
						<?php if( $author != '' ) : ?>
							<span class="testimonial-author"><?php echo $author; ?></span>
						<?php endif; ?>
					</blockquote>
				</div>

			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
