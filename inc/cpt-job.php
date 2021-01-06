<?php
/**
 * Custom Post Type: Job
 *
 * Created and exported with Custom Post Type UI plugin
 *
 * @package Brighter_AI
 */

function cptui_register_my_cpts() {

	/**
	 * Post Type: Jobs.
	 */

	$labels = [
		"name" => __( "Jobs", "brighter-ai" ),
		"singular_name" => __( "Job", "brighter-ai" ),
	];

	$args = [
		"label" => __( "Jobs", "brighter-ai" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "job", "with_front" => true ],
		"query_var" => true,
		"menu_position" => 20,
		"menu_icon" => "dashicons-nametag",
		"supports" => [ "title" ],
	];

	register_post_type( "job", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );

function cptui_register_my_taxes() {

	/**
	 * Taxonomy: Locations.
	 */

	$labels = [
		"name" => __( "Locations", "brighter-ai" ),
		"singular_name" => __( "Location", "brighter-ai" ),
	];

	$args = [
		"label" => __( "Locations", "brighter-ai" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'location', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "location",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "location", [ "job" ], $args );

	/**
	 * Taxonomy: Departments.
	 */

	$labels = [
		"name" => __( "Departments", "brighter-ai" ),
		"singular_name" => __( "Department", "brighter-ai" ),
	];

	$args = [
		"label" => __( "Departments", "brighter-ai" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'department', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"rest_base" => "department",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "department", [ "job" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );
