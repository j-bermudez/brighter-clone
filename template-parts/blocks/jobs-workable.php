<?php
/**
 * Jobs Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'jobs-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'jobs has-margin';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$headline = get_field('headline');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
	<?php if( $headline != '' ) : ?>
		<h2 class="has-large-font-size has-text-align-center"><?php echo $headline; ?></h2>
	<?php endif; ?>

	<?php if( is_admin() ) : ?>
		<p class="jobs-notice"><?php _e('Automatic Workable integration.', 'brighter-ai'); ?>
	<?php else : ?>
		<script src='https://www.workable.com/assets/embed.js' type='text/javascript'></script>
		<script type='text/javascript' charset='utf-8'>
			whr(document).ready(function(){
				whr_embed(288057, {detail: 'titles', base: 'jobs', zoom: 'city', grouping: 'none'});
			});

			jQuery(document).on('click', 'li.whr-item', function(e) {
				e.preventDefault();
				var url = jQuery(this).find('h3 a').attr('href');
				window.open(url, '_blank');
			});

			jQuery(document).on('click', 'li.whr-item a', function(e) {
				e.preventDefault();
				window.open(this.href, '_blank');
			});
		</script>
		<div id="whr_embed_hook"></div>
	<?php endif; ?>
</div>
