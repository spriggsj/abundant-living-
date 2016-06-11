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
			'menu_icon' => 'dashicons-thumbs-up',
			'rewrite' => array('slug' => 'health-tip'),
			'publicly_queryable' => true,
			'query_var' => true,
			'supports' => [
				'title', 'editor', 'thumbnail'
			],
				'taxonomies' => ['Tip Catagories','post_tag'],
		]
	);
}

add_action('admin_init', 'health_tip_post');

function health_tip_post(){
	add_meta_box(
		'Health Tip Info',
		'health_tip_post',
		'normal',
		'high'
	);
}

/* Taxonomy for catagories */
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_tip_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

function create_tip_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' =>  'Tip',
    'singular_name' => 'Tip',
    'search_items' =>  'Search Tips',
    'all_items' => 'All Tips' ,
    'parent_item' => 'Parent Tips',
    'parent_item_colon' => 'Parent Tips:',
    'edit_item' => 'Edit Tips', 
    'update_item' => 'Update Tips',
    'add_new_item' => 'Add New Tips',
    'new_item_name' => 'New Health Tips',
    'menu_name' => 'Tip Catagories',
  ); 	

// Now register the taxonomy

  register_taxonomy('Tip Catagories','health_tip_post', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Tips' ),
  ));

}


/* End of Taxonomy */

function rc_excerpt_length($length){
	return 15;
}

add_filter('excerpt_length', 'rc_excerpt_length', 999);

function rc_excerpt_more($more){
	return 'Read More';
}

add_filter('excerpt_more', 'rc_excerpt_more');

add_action('save_post', 'add_health_tip_fields', 10, 2);

function add_health_tip_fields($health_tip_info_id, $health_tip){
	if($health_tip->post_type == 'health_tip_post'){
		if(!current_user_can('edit_post', $health_tip_info_id))
			return $health_tip_info_id;
	}
}

add_filter('template_include', 'include_health_tip_function', 1);

function include_health_tip_function($template_path){
	if(get_post_type() == 'health_tip_post'){
		if(is_single()){
			if($theme_file = locate_template(['health_tip_post.php'])){
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path(__FILE__) . '/health_tip_post.php';
			}
		}
	}
	return $template_path;
}

// function set_post_per_page_health_tip($query){
// 	if($query -> is_post_type_archive('health_tip_post')){
// 		$query -> set('posts_per_page', '1');
// 	}
// }

// add_action('pre_get_posts', 'set_post_per_page_health_tip');


//SHORT CODE 


function tip_custom_loop_shortcode( $atts ) {
	
	$output = '';
	$custom_tip_loop_atts = shortcode_atts(
	[
		'type' => 'health_tip_post',
	], $atts

	);
	$post_type = $custom_tip_loop_atts['type'];
	$args = array(
		'post_type' => health_tip_post,
		'post_status' => 'publish',
		'order' => 'date',
		'posts_per_page' => 1

	);

	$the_query = new WP_Query($args);
		$output .= '<div class="health-tip">';
			$output .= '<h2>';
          		$output .= 'Health Tip of the Month';
          	$output .= '</h2>';

			while ($the_query->have_posts()) : $the_query->the_post(); $post_id = get_the_ID();
				$output .= '<h3>';
      				$output .= get_the_title();
      			$output .= '</h3>';
      			$output .= '<span class="date">';
      				$output .= get_the_time("F j, Y");
      			$output .= '</span>';
	      		$output .= '<p>';
	      			$output .= get_the_excerpt($post_id);
	      		$output .= '</p>';
			endwhile;
			$output .= '<a href="http://www.abundantlivingmommy.com/health-tip/" class="view-all-post">';
				$output .= 'View all';
			$output .= '</a>';
		$output .= '</div>';

		return $output;

      	wp_reset_postdata();

}

  add_shortcode('tip-custom-loop', 'tip_custom_loop_shortcode');

?>