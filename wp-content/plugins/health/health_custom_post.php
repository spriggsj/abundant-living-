<?php
/*
*Plugin Name: Health Custom Post
*Plugin URI:
*Description: Health Custom Post
*Version 1.0
*Author: Roger Chang
*/


add_action('init', 'rc_health_custom_post');

function rc_health_custom_post(){
	register_post_type('health_post', 
		[
		'labels' => [
			'name' => 'Health post',
			'singular_name' => 'Health',
			'edit_item' => 'Edit item',
			'new_item' => 'New item',
			'view_item' => 'View item',
			'search_item' => 'Search health',
			'not_found' => 'No items found',
			'not_found_in_traash' => 'No items found in the trash',
			'parent_item_colon' => 'Parent item'
		],
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-heart',
			'rewrite' => array('slug' => 'health'),
			'publicly_queryable' => true,
			'query_var' => true,
			'supports' => [
				'title', 'editor', 'thumbnail'
			],
				'taxonomies' => ['catagory'],
		]
	);
}

add_action('admin_init', 'health_post');

function health_post(){
	add_meta_box(
		'Health Info',
		'health_post',
		'normal',
		'high'
	);
}

add_action('save_post', 'add_health_fields', 10, 2);

function add_health_fields($health_info_id, $health){
	if($health->post_type == 'health_post'){
		if(!current_user_can('edit_post', $health_info_id))
			return $health_info_id;
	}
}

add_filter('template_include', 'include_health_function', 1);

function include_health_function($template_path){
	if(get_post_type() == 'health_post'){
		if(is_single()){
			if($theme_file = locate_template(['health.php'])){
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path(__FILE__) . '/health.php';
			}
		}
	}
	return $template_path;
}

function set_posts_per_page_for_health( $query ){
	if($query -> is_post_type_archive('health_post') ) {
		$query -> set('posts_per_page', '8');
	}
}

add_action('pre_get_posts', 'set_posts_per_page_for_health');

?>