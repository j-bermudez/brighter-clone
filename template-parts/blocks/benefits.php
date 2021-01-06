<?php
/**
 * Benefits Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'benefits-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'benefits bg-green-light has-margin not-fullscreen';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$headline = get_field('headline');
?>

<?php if( have_rows('benefits') ): $i = 0; ?>
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
		<?php if( $headline != '' ) : ?>
			<h2 class="has-large-font-size has-text-align-center"><?php echo $headline; ?></h2>
		<?php endif; ?>

		<div class="benefit-container">
			<?php while( have_rows('benefits') ): the_row(); $i++;

				// Load values and assign defaults.
				$image = get_sub_field('b_image');
				$text = get_sub_field('b_text') ?: 'Benefit here...';
				?>
				<div class="benefit">
					<div class="benefit-image">
						<?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?>
					</div>
					<p class="benefit-text has-medium-font-size"><?php echo $text; ?></p>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
