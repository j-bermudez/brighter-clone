<?php
/**
 * Video Header Block Template.
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
$class_name = 'video-header';
if( !empty($block['className']) ) {
	$class_name .= ' ' . $block['className'];
}

$video_desktop = get_field('h_video_desktop');
$video_mobile = get_field('h_video_mobile');
$poster_desktop = get_field('h_poster_desktop');
$poster_mobile = get_field('h_poster_mobile');
$headline = get_field('h_headline');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?>">
	<div class="video-header-container">

		<?php if( !is_admin() ) : ?>
			<amp-video class="video-intro mobile" width="720" height="720"
			src="<?php echo $video_mobile['url']; ?>"
			layout="responsive"<?php if(!empty($poster_mobile)) { echo ' poster="' . $poster_mobile['sizes']['large'] . '"'; } ?>
			autoplay loop noaudio disableremoteplayback>
				<div fallback>
					<p>Your browser doesn't support HTML5 video.</p>
				</div>
				<source type="video/mp4" src="<?php echo $video_mobile['url']; ?>">
			</amp-video>

			<amp-video class="video-intro desktop" width="1280" height="720"
			src="<?php echo $video_desktop['url']; ?>"
			layout="responsive"<?php if(!empty($poster_desktop)) { echo ' poster="' . $poster_desktop['sizes']['large'] . '"'; } ?>
			autoplay loop noaudio disableremoteplayback>
				<div fallback>
					<p>Your browser doesn't support HTML5 video.</p>
				</div>
				<source type="video/mp4" src="<?php echo $video_desktop['url']; ?>">
			</amp-video>
		<?php else : ?>
			<img src="<?php echo $poster_desktop['sizes']['large']; ?>" alt="Video Poster">
		<?php endif; ?>

		<div class="container">
			<h2 class="video-headline has-huge-font-size"><?php echo $headline; ?></h2>
		</div>
	</div>
</div>
