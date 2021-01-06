<?php
/**
 * Demo Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'demo-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'demo demo-block';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$image = get_field('image_original');
$name = __('Original', 'brighter-ai');
$first_method = __('Blur', 'brighter-ai');
$autoplay_speed = get_field('autoplay_speed');
$is_autoplay = false;
if(is_front_page() && $autoplay_speed) $is_autoplay = true;
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
	<div class="demo-container<?php if($is_autoplay) echo ' is-autoplay'; ?>"<?php if($is_autoplay) echo ' data-speed="' . $autoplay_speed . '"'; ?>>
		<div class="demo-col">
			<div class="demo-image">
				<?php echo wp_get_attachment_image( $image, 'demo_image', false, array('alt' => $name, 'class' => 'demo-image demo-original' )); ?>
				<p class="no-margin demo-label"><?php echo $name; ?></p>
			</div>
		</div>

		<div class="demo-col">
			<?php if( have_rows('methods') ): $i = 0; ?>
				<div class="demo-methods">
					<?php
					while( have_rows('methods') ): the_row(); $i++;

						// Load values and assign defaults.
						$image = get_sub_field('m_image');
						$name = get_sub_field('m_name');
						if($i == 1) $first_method = $name;
						?>

						<div class="demo-image<?php if($i == 1) echo ' active'; ?>" data-image-id="<?php echo $i; ?>">
							<?php echo wp_get_attachment_image( $image, 'demo_image', false, array('alt' => $name, 'class' => 'demo-img' )); ?>
						</div>
					<?php endwhile; $i = 0; ?>

					<div class="demo-select">
						<ul class="demo-list">
							<?php
							while( have_rows('methods') ): the_row(); $i++;
								$name = get_sub_field('m_name');
								?>
								<li class="demo-item<?php if($i == 1) echo ' active'; ?>"><a href="#" data-id="<?php echo $i; ?>"><?php echo $name; ?></a></li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>

				<div class="demo-actions">
					<a href="#" class="demo-select-button demo-label">
						<span class="active-method"><?php echo $first_method; ?></span>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
