<?php
/**
 * Register custom blocks with the Advanced Custom Fields plugin
 *
 * https://www.advancedcustomfields.com/resources/blocks/
 * https://developer.wordpress.org/resource/dashicons/
 *
 * @package Brighter_AI
 */

function register_acf_block_types() {

	// register a testimonials block.
	acf_register_block_type(array(
		'name'              => 'testimonials',
		'title'             => __('Testimonials Slider'),
		'description'       => __('A custom testimonials block.'),
		'render_template'   => 'template-parts/blocks/testimonials.php',
		// 'category'       => 'formatting',
		'category'          => 'brighter-ai',
		// 'icon'           => 'admin-comments',
		'icon'              => 'megaphone',
		'keywords'          => array( 'testimonial', 'quote' ),
		'supports'          => array( 'align' => false ),
	));

	// register a block for company values.
	acf_register_block_type(array(
		'name'              => 'values',
		'title'             => __('Values'),
		'description'       => __('A custom block for company values.'),
		'render_template'   => 'template-parts/blocks/values.php',
		'category'          => 'brighter-ai',
		'icon'              => 'heart',
		'keywords'          => array( 'values', 'company' ),
		'supports'          => array( 'align' => false, 'anchor' => true ),
	));

	// register a block for job openings.
	/*
	acf_register_block_type(array(
		'name'              => 'jobs',
		'title'             => __('Job Openings'),
		'description'       => __('A custom block for job openings.'),
		'render_template'   => 'template-parts/blocks/jobs.php',
		'category'          => 'brighter-ai',
		'icon'              => 'nametag',
		'keywords'          => array( 'jobs', 'company', 'openings' ),
		'supports'          => array( 'align' => false ),
	));
	*/

	// register a block for job openings.
	acf_register_block_type(array(
		'name'              => 'jobs-workable',
		'title'             => __('Jobs (Workable)'),
		'description'       => __('A block for job openings with Workable integration.'),
		'render_template'   => 'template-parts/blocks/jobs-workable.php',
		'category'          => 'brighter-ai',
		'icon'              => 'nametag',
		'keywords'          => array( 'jobs', 'company', 'openings' ),
		'supports'          => array( 'align' => false, 'anchor' => true ),
	));

	// register a block for benefits element.
	acf_register_block_type(array(
		'name'              => 'benefits',
		'title'             => __('Benefits'),
		'description'       => __('A block for benefits (icons and text element).'),
		'render_template'   => 'template-parts/blocks/benefits.php',
		'category'          => 'brighter-ai',
		'icon'              => 'thumbs-up',
		'keywords'          => array( 'benefits', 'company' ),
		'supports'          => array( 'align' => false ),
	));

	// register a block for client logos.
	acf_register_block_type(array(
		'name'              => 'clients',
		'title'             => __('Client Logos'),
		'description'       => __('A block for client logos.'),
		'render_template'   => 'template-parts/blocks/clients.php',
		'category'          => 'brighter-ai',
		'icon'              => 'groups',
		'keywords'          => array( 'clients', 'company' ),
		'supports'          => array( 'align' => false ),
	));

	// register a block for team members.
	acf_register_block_type(array(
		'name'              => 'team',
		'title'             => __('Team'),
		'description'       => __('A block for team members.'),
		'render_template'   => 'template-parts/blocks/team.php',
		'category'          => 'brighter-ai',
		'icon'              => 'id',
		'keywords'          => array( 'team', 'company' ),
		'supports'          => array( 'align' => false ),
	));

	// register a block for a demo comparison.
	acf_register_block_type(array(
		'name'              => 'demo-element',
		'title'             => __('Demo Element'),
		'description'       => __('A block for a demo comparison.'),
		'render_template'   => 'template-parts/blocks/demo-element.php',
		'category'          => 'brighter-ai',
		'icon'              => 'excerpt-view',
		'keywords'          => array( 'demo', 'comparison', 'company' ),
		'supports'          => array( 'align' => false ),
	));

	// register a block for the chart.
	acf_register_block_type(array(
		'name'              => 'chart',
		'title'             => __('Chart'),
		'description'       => __('A block for the chart.'),
		'render_template'   => 'template-parts/blocks/chart.php',
		'category'          => 'brighter-ai',
		'icon'              => 'chart-bar',
		'keywords'          => array( 'chart', 'diagram', 'company' ),
		'supports'          => array( 'align' => false, 'multiple' => false ),
	));

	// register a block for images loop.
	acf_register_block_type(array(
		'name'              => 'images-loop',
		'title'             => __('Images Loop'),
		'description'       => __('A block for images looping.'),
		'render_template'   => 'template-parts/blocks/images-loop.php',
		'category'          => 'brighter-ai',
		'icon'              => 'images-alt',
		'keywords'          => array( 'images', 'company', 'gallery' ),
		'supports'          => array( 'align' => false ),
	));

	// register a block for header video sequence.
	acf_register_block_type(array(
		'name'              => 'video-header',
		'title'             => __('Video Header'),
		'description'       => __('A block for a video header.'),
		'render_template'   => 'template-parts/blocks/video-header.php',
		'category'          => 'brighter-ai',
		'icon'              => 'format-video',
		'keywords'          => array( 'video', 'company', 'header', 'sequence' ),
		'supports'          => array( 'align' => false, 'multiple' => false ),
	));

	// register a block for video carousel.
	acf_register_block_type(array(
		'name'              => 'video-carousel',
		'title'             => __('Video Carousel'),
		'description'       => __('A block for a video carousel header.'),
		'render_template'   => 'template-parts/blocks/video-carousel.php',
		'category'          => 'brighter-ai',
		'icon'              => 'playlist-video',
		'keywords'          => array( 'video', 'company', 'header', 'sequence' ),
		'supports'          => array( 'align' => false, 'multiple' => false ),
	));

	// register a block (no) cookie notice.
	acf_register_block_type(array(
		'name'              => 'cookie-notice',
		'title'             => __('(No) Cookie Notice'),
		'description'       => __('A block for a (no) cookie notice.'),
		'render_template'   => 'template-parts/blocks/cookie-notice.php',
		'category'          => 'brighter-ai',
		'icon'              => 'lightbulb',
		'keywords'          => array( 'cookie', 'site', 'notice' ),
		'supports'          => array( 'align' => false, 'multiple' => false ),
	));

	// register a block for a simple banner.
	acf_register_block_type(array(
		'name'              => 'simple-banner',
		'title'             => __('Simple Banner'),
		'description'       => __('A block for displaying a simple banner.'),
		'render_template'   => 'template-parts/blocks/simple-banner.php',
		'category'          => 'brighter-ai',
		'icon'              => 'editor-paragraph',
		'keywords'          => array( 'banner', 'simple', 'site', 'company' ),
		'supports'          => array( 'align' => false, 'multiple' => false ),
	));

	// register a block for the demo page menu.
	acf_register_block_type(array(
		'name'              => 'demo-page-menu',
		'title'             => __('Demo Page Menu'),
		'description'       => __('A block for displaying a menu to select demo elements.'),
		'render_template'   => 'template-parts/blocks/demo-page-menu.php',
		'category'          => 'brighter-ai',
		'icon'              => 'screenoptions',
		'keywords'          => array( 'demo', 'comparison', 'company', 'menu' ),
		'supports'          => array( 'align' => false, 'multiple' => false ),
	));
	//JBAI register pricing  box
	acf_register_block_type(array(
		'name'              => 'pricing-product',
		'title'             => __('Pricing Product'),
		'description'       => __('A block for displaying the pricing for our product.'),
		'render_template'   => 'template-parts/blocks/pricing-product.php',
		'category'          => 'brighter-ai',
		'icon'              => 'clipboard',
		'keywords'          => array( 'price', 'box', 'product', 'menu' ),
		'supports'          => array( 'align' => false, 'multiple' => false ),
	));
}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}
