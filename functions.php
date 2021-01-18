<?php
// update_option( 'siteurl', 'http://localhost/brighter-clone' );
// update_option( 'home', 'http://localhost/brighter-clone' );
/**
 * Brighter AI functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Brighter_AI
 */

if ( ! function_exists( 'brighter_ai_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function brighter_ai_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Brighter AI, use a find and replace
		 * to change 'brighter-ai' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'brighter-ai', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		// add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		// add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Main Menu', 'brighter-ai' ),
			'menu-footer' => esc_html__( 'Footer Menu', 'brighter-ai' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		/*
		add_theme_support( 'custom-background', apply_filters( 'brighter_ai_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
		*/

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		/*
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		*/

		/*
		 * Custom image sizes
		 */
		add_image_size('demo_image', 600); // 600 pixels wide (and unlimited height)
	}
endif;
add_action( 'after_setup_theme', 'brighter_ai_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function brighter_ai_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'brighter_ai_content_width', 1920 );
}
add_action( 'after_setup_theme', 'brighter_ai_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function brighter_ai_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'brighter-ai' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'brighter-ai' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title has-large-font-size">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'brighter-ai' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'brighter-ai' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title has-large-font-size">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'brighter_ai_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function brighter_ai_scripts() {
	$version_css = '202008142';
	$version_js = '20200701';

	// set LOCAL_ENV to true in wp-config like WP_DEBUG if you develop locally
	if( ! empty( LOCAL_ENV ) && LOCAL_ENV ) {
		wp_enqueue_style( 'brighter-ai-style', get_stylesheet_directory_uri() . '/public/css/style.css', array(), $version_css );
		wp_enqueue_script( 'brighter-ai-all-js', get_stylesheet_directory_uri() . '/public/js/scripts.js', array( 'jquery' ), $version_js, true );
	} else {
		wp_enqueue_style( 'brighter-ai-style', get_stylesheet_directory_uri() . '/public/css/style.min.css', array(), $version_css );
		wp_enqueue_script( 'brighter-ai-all-js', get_stylesheet_directory_uri() . '/public/js/scripts.min.js', array( 'jquery' ), $version_js, true );
	}

	wp_enqueue_script('brighter-ai-slick', get_stylesheet_directory_uri() . '/public/js/vendor/slick.min.js', array('jquery'), '1.8.1', true);

	// wp_enqueue_style( 'brighter-ai-style', get_stylesheet_uri() );
	// wp_enqueue_script( 'brighter-ai-navigation', get_template_directory_uri() . '/public/js/navigation.js', array(), '20151215', true );
	// wp_enqueue_script( 'brighter-ai-skip-link-focus-fix', get_template_directory_uri() . '/public/js/skip-link-focus-fix.js', array(), '20151215', true );

	/*
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	*/
}
add_action( 'wp_enqueue_scripts', 'brighter_ai_scripts' );

/**
 * Implement the Custom Header feature.
 */
// equire get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Post Types.
 */
// require get_template_directory() . '/inc/cpt-job.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if (class_exists('ACF')) {
	// add custom block category
	function brighter_ai_block_category( $categories, $post ) {
		return array_merge(
			$categories,
			array(
				array(
					'slug' => 'brighter-ai',
					'title' => __( 'Brighter AI', 'brighter-ai' ),
				),
			)
		);
	}
	add_filter( 'block_categories', 'brighter_ai_block_category', 10, 2);

	// load ACF blocks
	require get_template_directory() . '/inc/acf-blocks.php';
}

/**
 * Custom logo and links for dashboard login page
 */
// logo
function brighter_ai_login_logo() {
	echo '<style type="text/css">h1 a { background-image: url(' . get_stylesheet_directory_uri() . '/public/img/logo.svg) !important; background-size: contain !important; background-position: center !important; width: 200px !important; height: 50px !important; }</style>';
}
add_action('login_head',  'brighter_ai_login_logo');

// link
function brighter_ai_login_link() {
	$url = home_url();
	return $url;
}
add_filter('login_headerurl', 'brighter_ai_login_link');

// link-title
function brighter_ai_login_linktitle() {
	$name = get_option('blogname');
	return $name;
}
add_filter('login_headertext', 'brighter_ai_login_linktitle');

/**
 * Remove comments and posts from backend
 */
// Removes from admin menu
add_action( 'admin_menu', 'brighter_ai_remove_admin_menus' );
function brighter_ai_remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
	remove_menu_page( 'edit.php' );
}

// Removes from post and pages
add_action('init', 'brighter_ai_remove_comment_support', 100);
function brighter_ai_remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}

// Removes from admin bar
function brighter_ai_admin_bar_render() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('posts');
}
add_action( 'wp_before_admin_bar_render', 'brighter_ai_admin_bar_render' );

/**
 * Disable search on frontend site and redirect to 404
 */
function brighter_ai_filter_query( $query, $error = true ) {
	if ( !is_admin() && is_search() ) {
	$query->is_search = false;
	$query->query_vars['s'] = false;
	$query->query['s'] = false;

	// to error
	if ( $error == true )
		$query->is_404 = true;
	}
}
add_action( 'parse_query', 'brighter_ai_filter_query' );
add_filter( 'get_search_form', function() { return null; } );

/**
 * Custom WPML Language Switcher
 */
function brighter_ai_languages_list() {
	$languages = icl_get_languages('skip_missing=0');
	if(!empty($languages)) {
		$output = '<div class="language-menu-container">';
		$output .= '<ul id="language-menu" class="menu language-menu">';
		foreach($languages as $l) {
			$is_active = '';
			if($l['active']) $is_active = ' is-active';
			$output .= '<li class="menu-item language-menu-item">';
			$output .= '<a class="lang-switch icl-' . $l['language_code'] . $is_active . '" href="'.$l['url'].'" title="' . __('Switch to', 'brighter-ai') . ' ' . $l['native_name'] . '">' . $l['language_code'] . '</a>';
			$output .= '</li>';
		}
		$output .= '</ul>';
		$output .= '</div>';
	}
	echo $output;
}

/**
 * Make post types sortable with plugin Simple Page Ordering
 */
add_post_type_support( 'job', 'page-attributes' );

/**
 * Add CSS file for Gutenberg backend editor
 */
function brighter_ai_add_editor_styles() {
	add_editor_style( get_template_directory_uri() . '/public/css/backend.min.css' );
}
// add_action( 'init', 'brighter_ai_add_editor_styles' );

// Add backend styles for Gutenberg.
add_action( 'enqueue_block_editor_assets', 'brighter_ai_gutenberg_assets' );

function brighter_ai_gutenberg_assets() {
	wp_enqueue_style( 'brighter-ai-backend-css', get_theme_file_uri( '/public/css/backend.min.css' ), false );
}

/**
 * Disable WordPress Lazy Loading (implemented in WP 5.5)
 */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

/**
 * Activate only certain blocks in Gutenberg editor
 * Block list: https://github.com/WordPress/gutenberg/tree/master/packages/block-library/src
 */
function brighter_ai_whitelist_blocks() {

	return array(
		'core/heading',
		'core/paragraph',
		'core/image',
		'core/button',
		'core/buttons',
		'core/column',
		'core/columns',
		'core/gallery',
		'core/group',
		'core/list',
		'core/separator',
		'core/shortcode',
		'core/table',
		'core/video',
		// 'acf/jobs',
		'acf/jobs-workable',
		'acf/values',
		'acf/benefits',
		'acf/testimonials',
		'acf/clients',
		'acf/team',
		'acf/demo-element',
		'acf/chart',
		'acf/images-loop',
		'acf/video-header',
		'acf/video-carousel',
		'acf/cookie-notice',
		'acf/simple-banner',
		'acf/pricing-product',
		'acf/demo-page-menu',
	);
}
add_filter('allowed_block_types','brighter_ai_whitelist_blocks', 10, 2);
//Resources page by Javier
/**Javier Resources */ 

// /* Javier eques CSS */
// function resourcesBrighterAI_register_styles (){
   
//     wp_enqueue_style('resourcesBrighterAI-post-css', get_template_directory_uri() . "/assets/post.css", array(), '1.0', 'all');
//     /* Javier eques JS */
	
// 	wp_enqueue_script( 'j-bai-query', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array ( 'jquery' ), 1.1, false);
// }


// add_action ('wp_enqueue_scripts', 'resourcesBrighterAI_register_styles' );


//Preview Posts

//https://www.youtube.com/watch?v=WbGlhhRLEbA&t=317s   min 31
add_theme_support('post-thumbnails');
function bai_resources_section_post_type(){

	$args = array(
		'labels' => array(
				'name' => 'Resources', 
				'singular_name'=> 'Resource'
		),
		'hierarchical'=> true,
		'menu_icon' => 'dashicons-media-spreadsheet', 
		'public' => true, 
		'has_archive' => true, 
		'supports' => array(
						'title', 
						'editor', 
						'thumbnail'
					), 

				);
	
	register_post_type('resources',$args );
}

add_action('init', 'bai_resources_section_post_type');

function bai_resources_taxonomy(){
	$labels = array(
		'name' => 'Resource Type', 
		'singular_name'=> 'Resource Type', 
		'search_items' => 'Search Resource Type', 
		'all_items' => 'Parent Resource Type', 
		'parent_item_colon' => 'Parent Resource Type', 
		'edit_item' => 'Edit Resource Type', 
		'update_item' => 'Update Resource Type', 
		'add_new_item' => 'Add New Resource Type Name', 
		'menu_name' => 'Resource Type'

	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui'=>true, 
		'public' => true,
		'query_var' => true, 
		'rewrite' => 'resources', 
	);

	register_taxonomy('resources-types', array('resources'),$args);
}
add_action('init', 'bai_resources_taxonomy');

//Filter posts function
function filter_projects() {
	$catSlug = $_POST['category'];
  
	$ajaxposts = new WP_Query([
	  'post_type' => 'resources',
	  'posts_per_page' =>-1,
	  'orderby' => 'menu_order', 
	  'order' => 'desc',
	  'relation' => 'AND',
	  'tax_query' => array(
		array(
			'taxonomy' => 'resources-types',
			'field'    => 'slug',
			'terms'    => $catSlug,
		),
	),
	
	//   'tax_query' => array( 
    //     // array( 
    //     //     'slug' => $catSlug, //or tag or custom taxonomy
    //     //     'field' => 'id', 
    //     //     'terms' => array('9') 
    //     // ) 
    // ) 
	]);
	$response = '';
  
	if($ajaxposts->have_posts()) {
	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();
		$response .=  get_template_part('inc/section-preview-no-loop');
		wp_reset_postdata();
	  endwhile;
	} else {
	  $response = 'empty';
	  wp_reset_postdata();
	}
  
	echo $response;
	exit;
  }
  add_action('wp_ajax_filter_projects', 'filter_projects');
  add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');

//Related Posts
function resources_add_related_resource_to_sigle_post() {
	$currentID = get_the_ID();
    // check if we're in the product post type
    if( is_singular( 'resources' ) ) {       
		
        // fetch taxonomy terms for current product
        $productterms = get_the_terms( get_the_ID(), 'resources-types'  );
         
        if( $productterms ) {
			
            $producttermnames[] = 0;
                     
            foreach( $productterms as $productterm ) {  
                 
                $producttermnames[] = $productterm->name;
				
            }
			
			         
            // set up the query arguments
            $args = array (
				'post_type' => 'resources',
				'showposts' => '2',	
                'tax_query' => array(
                    array(
                        'taxonomy' => 'resources-types',
                        'field'    => 'slug',
                        'terms'    => $producttermnames,
					),
					
				),
				'post__not_in' => array(
					$currentID)
            );
             
            // run the query
            $query = new WP_Query( $args ); 
			
            if( $query->have_posts() ) { ?>
                 
                <section class="product-related-posts">
             
                <?php echo '<h2 class="center-content">' . __( 'Related Posts', 'resoruces' ) . '</h2>'; ?>
             
				<section class="center-content   j-bai-container-previews-resources">
   					<div class=" center-content j-bai-previews-resources">
					 
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
					
							<div class="bg-light previewBox">
									<!-- 
									<div class="j-bai-resource-type">
										<?php /*the_field('resource_type');*/?>
									</div>
									-->

									<a target = "_blank" href="<?php the_permalink()?>"><div class="j-bai-img-preview-box">
										<img src="<?php the_post_thumbnail_url();?>" class="" alt="">
									</div>
									</a>
									<div class="j-bai-description-preview-container ">
										
									
										<div class="j-bai-title-preview-container">
											<h3 class="j-bai-title-preview">
												<?php the_title();?> 
											
											</h3>
										</div>        
										<div class="j-bai-description-preview-container">
											<p class="">
												<?php the_excerpt();?> 
											</p>
										</div>
									

										<div class="j-bai-read-more-preview-container ">
											<a 
											target = "_blank" 
											class= "j-bai-text-decoration-none" 
											href=" <?php the_permalink()?>">
											
												<div class="j-bai-button button-l">
														READ MORE
											</div>
										</a>
											
										</div>
									
										
									</div>
						</div>
                             
                    <?php endwhile; ?>
					</div>
       			</section>	
                         
                    <?php wp_reset_postdata(); ?>
                     
                   
                     
                </section>
                 
            <?php }
             
         
        }
         
    }
 
}
add_action('init', 'resources_add_related_resource_to_sigle_post');
//excerpt($limit)


function excerpt($limit) {
$excerpt = explode(' ', get_the_excerpt(), $limit);
if (count($excerpt)>=$limit) {
  array_pop($excerpt);
  $excerpt = implode(" ",$excerpt).'...';
} else {
  $excerpt = implode(" ",$excerpt);
}	
$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
return $excerpt;
}

function custom_excerpt_length( $length ) {
return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

