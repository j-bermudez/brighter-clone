<?php
/**
 * Demo Page Menu Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'demo-menu' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'demo-menu demo-menu-block';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$upload_enabled = get_field('enable_upload');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
	<?php if( is_admin() ) : ?>
		<p class="simple-notice"><?php _e('Demo Page Menu.', 'brighter-ai'); ?>
	<?php else : ?>
		<ul class="demo-menu-list">
			<?php if($upload_enabled) : ?>
				<li class="demo-menu-list-item custom-upload">
					<a href="#" class="aspect-content">
						<span><?php _e('Upload your image', 'brighter-ai'); ?></span>
					</a>
				</li>
			<?php endif; ?>
		</ul>
	<?php endif; ?>
</div>
