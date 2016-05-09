<?php 

/*
*Plugin Name: Meal Planer Custom Post
*Plugin URI:
*Description: Meal Palnner Custom Post
*Version 1.0
*Author: Roger Chang
*/

add_action('init', 'rc_meal_plans_custom_post');

function rc_meal_plans_custom_post(){
	register_post_type('health post',
		[
		'labels' => [
			'name' => 'Meal Planner',
			'singular_name' => 'Meal',
			'edit_item' => 'Edit item',
			'new_item' => 'New item',
			'view_item' => 'View item',
			'search_item' => 'Search Meal Plans',
			'not_found' => 'No items found',
			'not_found_in_trash' => 'No items found in the trash',
			'parent_item_colon' => 'Parent item'
		],
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-carrot',
			'rewrite' => array('slug' => 'meal'),
			'publicly_queryable' => true,
			'query_var' => true,
			'supports' => [
				'title', 'editor', 'thumbnail'
			],
				'taxonomies' => ['catagory'],
		]
	);
}

add_action('admin_init', 'meal_post');

function meal_post(){
	add_meta_box(
		'Meal Info',
		'meal_post',
		'normal',
		'high'
	);
}

add_action('save_post', 'add_meal_fields', 10, 2);

function add_meal_fields($meal_info_id, $meal){
	if($meal->post_type == 'meal_post'){
		if(!current_user_can('edit_post', $health_info_id))
			return $meal_info_id;
	}
}

add_filter('template_include', 'include_meal_function', 1);

function include_meal_function($template_path){
	if(get_post_type() == 'meal_post'){
		if(is_single()){
			if($theme_file = locate_template(['meal_planner.php'])){
				$template_path == $theme_file;
			} else {
				$template_path = plugin_dir_path(__FILE__) . '/meal-planner.php';
			}
		}
	}
	return $template_path;
}

function set_posts_per_page_for_meal($query){
	if($query -> is_post_type_archive('meal_post')){
		$query -> set('post_per_page', '8');
	}
}

add_action('pre_get_posts', 'set_posts_per_page_for_meal');

?>