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

$args = array(
	'post_type' => 'job',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'suppress_filters' => false,
);
$jobs_loop = new WP_Query( $args );
?>

<?php if( !empty( $jobs_loop )) : ?>
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
		<?php if( $headline != '' ) : ?>
			<h2 class="has-large-font-size has-text-align-center"><?php echo $headline; ?></h2>
		<?php endif; ?>

		<div class="jobs-list">
			<?php while ( $jobs_loop->have_posts() ) : $jobs_loop->the_post();

				// Load values and assign defaults.
				$job_id = get_the_ID();
				$job_url = get_field('job_url', $job_id) ?: '#';
				?>

				<?php if( is_admin() ) : ?>
					<div class="job-container">
				<?php else : ?>
					<a class="job-container" href="<?php echo $job_url; ?>" target="_blank" title="<?php the_title(); ?>">
				<?php endif; ?>

					<?php
					$departments_list = get_the_terms( $job_id, 'department' );
					$departments_array = [];
					if ( ! empty( $departments_list ) ) {
						foreach( $departments_list as $dept) {
							$departments_array[] = $dept->name;
						}
						$departments_array = implode(', ', $departments_array);
						echo '<span class="job-department">' . $departments_array . '</span>';
					}
					?>

					<h3 class="job-title has-medium-font-size"><?php the_title(); ?></h3>

					<?php
					$locations_list = get_the_terms( $job_id, 'location' );
					$locations_array = [];
					if ( ! empty( $locations_list ) ) {
						foreach( $locations_list as $loc) {
							$locations_array[] = $loc->name;
						}
						$locations_array = implode(', ', $locations_array);
						echo '<span class="job-location">' . __('Location', 'brighter-ai') . ': ' . $locations_array . '</span>';
					}
					?>

				<?php if( is_admin() ) : ?>
					</div>
				<?php else : ?>
					</a>
				<?php endif; ?>

			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
