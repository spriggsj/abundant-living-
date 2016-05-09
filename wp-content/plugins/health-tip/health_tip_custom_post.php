<?php 
/*
*Plugin Name: Health Tip Custom Post
*Plugin URI:
*Description: Health Tip Custom Post
*Version 1.0
*Author: Roger Chang
*/

add_action('init', 'rc_health_tip_custom_post');

function rc_health_tip_custom_post(){
	register_post_type('health_tip_post',
		[
		'labels' => [
			'name' => 'Health Tip',
			'singular_name' => 'Health Tip',
			'edit_item' => 'Edit item',
			'new_item' => 'New item',
			'view_item' => 'View item',
			'search_item' => 'Search health tip',
			'not_found' => 'No items found',
			'not_found_in_trash' => 'No items found in the trash',
			'parent_item_colon' => 'Parent items'
		],
			'public' => true,
			'has_archive' => true,
			'menu_icon' => '',
			'rewrite' => array('slug' => 'health tip'),
			'publicly_queryable' => true,
			'query_var' => true,
			'supports' => [
				'title', 'editor', 'thumbnail'
			],
				'taxonomies' => ['catagory'],
		]
	);
}

?>