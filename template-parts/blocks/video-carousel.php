<?php
/**
 * Video Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'video-header-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'video-header video-carousel';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}
?>

<?php if( have_rows('video_slides') ): ?>
	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
		<div class="video-header-slider">
			<?php
			while( have_rows('video_slides') ): the_row();
				$video_desktop = get_sub_field('h_video_desktop');
				$video_mobile = get_sub_field('h_video_mobile');
				$poster_desktop = get_sub_field('h_poster_desktop');
				$poster_mobile = get_sub_field('h_poster_mobile');
				$headline = get_sub_field('h_headline');
			?>
				<div class="video-header-slide">
					<?php if( !is_admin() ) : ?>
						<div class="video-intro mobile">
							<video class="aspect-content" width="720" height="720"
							src="<?php echo $video_mobile['url']; ?>"<?php if(!empty($poster_mobile)) { echo ' poster="' . $poster_mobile['sizes']['large'] . '"'; } ?>
							noaudio muted disableremoteplayback playsinline autoplay>
								<div fallback>
									<p>Your browser doesn't support HTML5 video.</p>
								</div>
								<source type="video/mp4" src="<?php echo $video_mobile['url']; ?>">
							</video>
						</div>

						<div class="video-intro desktop">
							<video class="aspect-content" width="1280" height="720"
							src="<?php echo $video_desktop['url']; ?>"<?php if(!empty($poster_desktop)) { echo ' poster="' . $poster_desktop['sizes']['large'] . '"'; } ?>
							noaudio muted disableremoteplayback playsinline autoplay>
								<div fallback>
									<p>Your browser doesn't support HTML5 video.</p>
								</div>
								<source type="video/mp4" src="<?php echo $video_desktop['url']; ?>">
							</video>
						</div>
					<?php else : ?>
						<img src="<?php echo $poster_desktop['sizes']['large']; ?>" alt="Video Poster">
					<?php endif; ?>

					<div class="container">
						<h2 class="video-headline has-huge-font-size"><?php echo $headline; ?></h2>
					</div>
				</div>

			<?php endwhile; ?>
		</div>
	</div>
<?php endif; ?>
