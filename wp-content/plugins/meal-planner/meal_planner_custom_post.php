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
	register_post_type('meal_post',
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
/* Taxonomy for catagories */
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'js_people_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

 function js_people_taxonomy() {

 //Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI
$labels = [
  'name' => 'Meal Catagories',
  'singular_name' => 'Meal Catagories',
  'search_item' => 'Search Meal Catagories',
  'all_items' => 'All Meal Catagories',
  'parent_item' => 'Parent Meal',
  'parent_item_colon' => 'Parent Meal:',
  'edit_item' => 'Edit Meal Catagories',
  'update_item' => 'Update Meal',
  'add_new_item' => 'Add New Meal Catagories',
  'new_item_name' => 'New Meal Name',
  'menu_name' => 'Meal Catagories'
];

$args = [
  'hierarchical' => true,
  'labels' => $labels,
  'show_ui' => true,
  'show_admin_column' => true,
  'query_var' => true,
];

register_taxonomy('meal', 'meal_post', $args);

}
/* End of Taxonomy */
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
				$template_path = plugin_dir_path(__FILE__) . '/meal_planner.php';
			}
		}
	}
	return $template_path;
}

// function set_posts_per_page_for_meal($query){
// 	if($query -> is_post_type_archive('meal_post')){
// 		$query -> set('posts_per_page', '3');
// 	}
// }

// add_action('pre_get_posts', 'set_posts_per_page_for_meal');

/*/////////////////////////short code/////////////////////////////////////*/

function meal_loop_shortcode( $atts ) {
    $output = '';
    $meal_loop_atts = shortcode_atts(
      [
        'type' => 'meal_post',
      ], $atts

      );
    $post_type = $meal_loop_atts['type'];
    $args = array(
        'post_type' => meal_post,
        'post_status' => 'publish',
        'order' => 'date',
        'posts_per_page' => 3

      );

    $the_query = new WP_Query($args);
        $output .= '<div class="col-sm-8 recipe-container">';
		    while ($the_query->have_posts()) : $the_query->the_post();
		        $post_id = get_the_ID();
		      	$output .= '<div class="col-sm-12 recipe">';
		      		$output .= get_the_post_thumbnail($post_id, 'medium');
		      		$output .= '<article>';
		      			$output .= '<h3>';
		      				$output .= get_the_title();
		      			$output .= '</h3>';
		      			$output .= '<span class="date">';
		      				$output .= get_the_time("F j, Y");
		      			$output .= '</span>';
			      		$output .= '<p>';
			        		$output .= get_the_excerpt($post_id);
			        	$output .= '</p>';
		        	$output .= '</article>';
		      	$output .= '</div>'; 
		    endwhile;
			$output .= '<a href="http://localhost:8080/meal_post/" class="view-all-post">';
				$output .= 'View all';
			$output .= '</a>';
	    $output .= '</div>';

      return $output;

      wp_reset_postdata();

    }

    add_shortcode('meal-loop', 'meal_loop_shortcode');

?>