<?php
/**
 * Clients Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'clients-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'clients bg-green-light fullscreen has-margin';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$headline = get_field('headline');
if( $headline != '' ) $class_name .= ' has-headline';
?>

<?php if( have_rows('clients') ): $i = 0; ?>
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
		<?php if( $headline != '' ) : ?>
			<h2 class="has-large-font-size has-text-align-center"><?php echo $headline; ?></h2>
		<?php endif; ?>

		<div class="clients-container">
			<?php
			while( have_rows('clients') ): the_row(); $i++;

				// Load values and assign defaults.
				$image = get_sub_field('c_image');
				$name = get_sub_field('c_name') ?: 'Client name here...';
				?>

				<div class="client">
					<?php echo wp_get_attachment_image( $image, 'thumbnail', false, array('title' => $name, 'alt' => $name, 'class' => 'client-logo' )); ?>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
