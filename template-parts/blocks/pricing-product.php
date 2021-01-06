<?php
/**
 * Pricing Product
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'pricing-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'container-pricing ';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}


?>

<?php ?>

<div id="positions">

</div>

<script>

</script>

