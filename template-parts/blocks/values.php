<?php
/**
 * Values Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'values-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'values has-margin';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$headline = get_field('headline');
$headline_size = get_field('headline_size');
?>

<?php if( have_rows('values') ): $i = 0; ?>
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
		<?php if( $headline != '' ) : ?>
			<h2 class="has-<?php echo $headline_size; ?>-font-size has-text-align-center"><?php echo $headline; ?></h2>
		<?php endif; ?>

		<?php while( have_rows('values') ): the_row(); $i++;

			// Load values and assign defaults.
			$text = get_sub_field('v_text') ?: 'One of your values here...';
			$heading = get_sub_field('v_heading') ?: 'Heading';
			?>
			<div class="value-container">
				<span class="value-number"><?php echo $i; ?></span>
				<h3 class="value-heading has-large-font-size"><?php echo $heading; ?></h3>
				<p class="value-text"><?php echo $text; ?></p>
			</div>

		<?php endwhile; ?>
	</div>
<?php endif; ?>
