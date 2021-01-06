<?php
/**
 * Simple Banner Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'simple-banner-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

$banner_text = get_field('banner_text');
$color_scheme = get_field('color_scheme');
$color = 'bg-green-light';
if($color_scheme == 'dark') $color = 'bg-blue-dark';

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'simple-banner simple-banner-block fullscreen no-margin ' . $color;
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
	<?php echo $banner_text; ?>
</div>
