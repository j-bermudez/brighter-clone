<?php
/**
 * Images Loop Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'images-loop-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'images-loop';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$images = get_field('images');
$size = 'large';
$i = 0;
?>

<?php if( $images ): ?>
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
		<div class="images-loop-container">
			<div class="images-loop-slider">

			<?php
			foreach( $images as $image_id ) {
				echo wp_get_attachment_image( $image_id, $size );
				$i++;
			}
			?>

			</div>
		</div>
	</div>
<?php endif; ?>
