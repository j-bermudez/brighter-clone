<?php
/**
 * (No) Cookie Notice Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cookie-notice-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'cookie-notice cookie-notice-block bg-blue-dark has-large-font-size';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$notice_text = get_field('notice_text');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
	<div class="container">
		<div class="cookie-notice-wrapper">
			<button class="cookie-notice-close">&times;</button>
			<span class="cookie-notice-text"><?php echo $notice_text; ?></span>
		</div>
	</div>
</div>
<div class="no-margin cookie-notice-offset"></div>
