<?php
/**
 * Team Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'team has-margin';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}
?>

<?php if( have_rows('team') ): $i = 0; ?>
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
		<div class="team-container">
			<?php
			while( have_rows('team') ): the_row(); $i++;

				// Load values and assign defaults.
				$image = get_sub_field('e_image');
				$name = get_sub_field('e_name') ?: 'Employee name here...';
				$role = get_sub_field('e_role') ?: 'Employee role here...';
				?>

				<div class="employee">
					<div class="employee-photo-wrapper">
						<div class="aspect-content">
							<?php echo wp_get_attachment_image( $image, 'medium', false, array('title' => $name, 'alt' => $name, 'class' => 'employee-photo' )); ?>
						</div>
					</div>

					<div class="employee-info">
						<h3 class="has-medium-font-size employee-name"><?php echo $name; ?></h3>
						<p class="employee-role"><?php echo $role; ?></p>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
