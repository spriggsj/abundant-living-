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
				$template_path = plugin_dir_path(__FILE__) . '/meal_planner.php';
			}
		}
	}
	return $template_path;
}

function set_posts_per_page_for_meal($query){
	if($query -> is_post_type_archive('meal_post')){
		$query -> set('posts_per_page', '3');
	}
}

add_action('pre_get_posts', 'set_posts_per_page_for_meal');

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
        'post_type' => $post_type,
        'post_status' => 'publish',
        'order' => 'date',
        'post_per_page' => 3

      );

    $the_query = new WP_Query($args);
        $output .= '<div class="container">';
          	$output .= '<h2>';
          		$output .= 'Meal Planner';
          	$output .= '</h2>';
            $output .= '<div class="row">';
	            $output .= '<div class="col-sm-8 recipe-container">';
				    while ($the_query->have_posts()) : $the_query->the_post();
				        $post_id = get_the_ID();
				      	$output .= '<div class="col-sm-12 recipe">';
				      		$output .= get_the_post_thumbnail($post_id, 'small');
				      		$output .= '<article>';
				      			$output .= '<h3>';
				      				$output .= get_the_title();
				      			$output .= '</h3>';
					      		$output .= '<p>';
					        		$output .= get_the_excerpt($post_id);
					        	$output .= '</p>';
				        	$output .= '</article>';
				      	$output .= '</div>'; 
				    endwhile;
			    $output .= '</div>'; 
		    	$output .= '<div class="col-sm-4 author">';
					$output .= '<img src="http://placehold.it/250x250">';
				$output .= '</div>';
				
       		$output .= '</div>';
        $output .= '</div>'; 

      return $output;

      wp_reset_postdata();

    }

    add_shortcode('meal-loop', 'meal_loop_shortcode');

?>