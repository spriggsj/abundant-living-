<?php
/*
*Plugin Name: Healthy Living Tips
*Plugin URI:
*Description: Healthy Living Tips
*Version 1.0
*Author: Roger Chang
*/


add_action('init', 'rc_health_custom_post');

function rc_health_custom_post(){
	register_post_type('health_post',
		[
		'labels' => [
			'name' => 'Healthy Living Tips',
			'singular_name' => 'Healthy Living Tips',
			'edit_item' => 'Edit item',
			'new_item' => 'New item',
			'view_item' => 'View item',
			'search_item' => 'Search health',
			'not_found' => 'No items found',
			'not_found_in_trash' => 'No items found in the trash',
			'parent_item_colon' => 'Parent item'
		],
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-heart',
			'publicly_queryable' => true,
			'query_var' => true,
			'supports' => [
				'title', 'editor', 'thumbnail', 'comments',
			],
				'taxonomies' => ['Health Catagories','post_tag'],
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
/* Taxonomy for catagories */
//hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'js_health_taxonomy', 0 );

//create a custom taxonomy name it topics for your posts

 function js_health_taxonomy() {

 //Add new taxonomy, make it hierarchical like categories
// first do the translations part for GUI
$labels = [
	'name' => 'Health Catagories',
	'singular_name' => 'Health Catagories',
	'search_item' => 'Search Health Catagories',
	'all_items' => 'All Health Catagories',
	'parent_item' => 'Parent Health',
	'parent_item_colon' => 'Parent Health:',
	'edit_item' => 'Edit Health Catagories',
	'update_item' => 'Update Health',
	'add_new_item' => 'Add New Health Catagories',
	'new_item_name' => 'New Health Name',
	'menu_name' => 'Health Catagories'
];

$args = [
	'hierarchical' => true,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'query_var' => true,
];

register_taxonomy('health', 'health_post', $args);

}
/* End of Taxonomy */


function js_excerpt_length($length){
	return 15;
}
add_filter('excerpt_length', 'js_excerpt_length', 999);


function js_excerpt_more($more){
	return 'Read More';
}

add_filter('excerpt_more', 'js_excerpt_more');



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

// function set_posts_per_page_for_health($query){
// 	if($query -> is_post_type_archive('health_post')){
// 		$query -> set('posts_per_page', '3');
// 	}
// }

// add_action('pre_get_posts', 'set_posts_per_page_for_health');




/*/////////////////////////short code/////////////////////////////////////*/

function custom_loop_shortcode( $atts ) {
    $output = '';
    $custom_loop_atts = shortcode_atts(
      [
        'type' => 'health_post',
      ], $atts

      );
    $post_type = $custom_loop_atts['type'];
    $args = array(
        'post_type' => health_post,
        'post_status' => 'publish',
        'order' => 'date',
        'posts_per_page' => 3

      );



    $the_query = new WP_Query($args);
        $output .= '<div class="container">';
          	$output .= '<h2>';
          		$output .= 'Recent Posts';
          	$output .= '</h2>';
            $output .= '<div class="row">';

            $i = 0; 
		    while ($the_query->have_posts()) : $the_query->the_post();
		      $post_id = get_the_ID();

		        if ($i == 0 ){
			      	$output .= '<div class="col-sm-6 newest-recent-post">';
				      	$output .= get_the_post_thumbnail($post_id, 'full');
			      		$output .= '<aside>';
				      		$output .= '<h3>';
			      				$output .= get_the_title();
			      			$output .= '</h3>';
			      			$output .= '<span class="date">';
			      				$output .= get_the_time("F j, Y");
			      			$output .= '</span>';
				      		$output .= '<p>';
				      			$output .= get_the_excerpt($post_id);
				      		$output .= '</p>';
				      	$output .= '</aside>';
			      	$output .= '</div>';

		        } else {

					$output .= '<div class="col-sm-6 older-recent-post">';
						$output .= '<div class="row older-post-container">';
							$output .= get_the_post_thumbnail($post_id, 'medium'); 
							$output .= '<aside>';	
								$output .= '<h3>';
				      				$output .= get_the_title();
				      			$output .= '</h3>';
				      			$output .= '<span class="date">';
				      				$output .= get_the_time("F j, Y");
				      			$output .= '</span>';
								$output .= '<p>';  
									$output .= get_the_excerpt($post_id);
								$output .= '<p>';
							$output .= '</aside>';
						$output .= '</div>';
					$output .= '</div>';
		        }       
				$i++;
		    endwhile;

				$output .= '<a href="http://www.abundantlivingmommy.com/health_post/" class="view-all-post">';
					$output .= 'View all';
				$output .= '</a>';
       		$output .= '</div>';
        $output .= '</div>'; 

      	return $output;

      	wp_reset_postdata();

    }
    

    add_shortcode('custom-loop', 'custom_loop_shortcode');




?>