<?php
/**
 * Chart Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'chart-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'chart chart-block has-margin';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$headline = get_field('headline');
$quote = get_field('quote');
$quote_source = get_field('quote_source');
$text = get_field('text_above_chart');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
	<?php if( $headline != '' ) : ?>
		<h2 class="has-large-font-size has-text-align-center"><?php echo $headline; ?></h2>
	<?php endif; ?>

	<div class="wp-block-columns thirds-1-2">
		<div class="wp-block-column chart-quote" style="flex-basis:33.33%">
			<p class="has-medium-font-size"><?php echo $quote; ?></p>
			<p><?php echo $quote_source; ?></p>
		</div>

		<div class="wp-block-column" style="flex-basis:66.66%">
			<div class="chart-container" id="chart">
				<p><?php echo $text; ?></p>

				<div class="chart-bars">
					<div class="bar bar-1">
						<span class="bar-legend"><?php _e('Original', 'brighter-ai'); ?></span>
						<span class="bar-value has-large-font-size"><?php _e('0.307', 'brighter-ai'); ?></span>
					</div>

					<div class="bar bar-2">
						<span class="bar-legend"><?php _e('DNAT', 'brighter-ai'); ?></span>
						<span class="bar-value has-large-font-size"><?php _e('0.307', 'brighter-ai'); ?></span>
					</div>

					<div class="chart-legend-wrapper">
						<span class="chart-scale chart-scale-0"><?php _e('0', 'brighter-ai'); ?></span>
						<span class="chart-scale chart-scale-1"><?php _e('0.1', 'brighter-ai'); ?></span>
						<span class="chart-scale chart-scale-2"><?php _e('0.2', 'brighter-ai'); ?></span>
						<span class="chart-scale chart-scale-3"><?php _e('0.3', 'brighter-ai'); ?></span>

						<p class="chart-legend">
							<?php _e('Precision', 'brighter-ai'); ?> <br>
							<small><?php _e('Mean Average Precision (IoU = 0.50 : 0.95)', 'brighter-ai'); ?></small>
						</p>

						<p class="chart-description"><?php _e('Instance Segmentation with Mask-RCNN', 'brighter-ai'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
