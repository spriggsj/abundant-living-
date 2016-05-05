<?php
/*
*Plugin Name: Members Only Post
*Plugin URI:
*Description: Custom Posts For Members only
*Version 1.0
*Author: Jason Spriggs
*/

add_action('init', 'js_members_custom_post');

function js_members_custom_post(){
	register_post_type('members_post', 
		[
		'labels' => [
		'name' => 'Members Only',
		'singular_name' => 'Member',
		'add_new_item' => 'Add Subscribers only post',
		'edit_item' => 'Edit item',
        'new_item' => 'New item',
        'view_item' => 'View item',
        'search_item' => 'Search Members',
        'not_found' => 'No item found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'parent item'
		],
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-id-alt',
			'rewrite' => array('slug' => 'members'),
			'publicly_queryable' => true,
			'query_var' => true,
			'supports' => [
				'title','editor','thumbnail' //ie  editor etc
				],
				'taxonomies' => ['category'],
		]
	

		);
}

add_action('admin_init', 'members_post');

function members_post(){
	add_meta_box ('members_posts_meta', 
		'Members Info',
		// 'display_members_meta_box',
		'members_post',
		'normal',
		'high'
		);
}


	



add_action('save_post', 'add_members_fields', 10, 2); //save action to save inputs from custom post

function add_members_fields($members_info_id, $members){
  if ($members->post_type == 'members_post'){
  	if (!current_user_can('edit_post', $members_info_id ))
  		return $members_info_id;

  	
  }

}



add_filter('template_include', 'include_members_function', 1);

function include_members_function($template_path){ // Checks to see if is custom post
    if(get_post_type() == 'members_post'){ // If is single page
            // First Check to see if theme file 'singe-members.php exists'
            //If it doesnt then use the default from the plugin
        if (is_single()){
            if ($theme_file = locate_template(['subscribe.php'])){
                $template_path = $theme_file;
            }else {
                // Default location from the plugin
                $template_path = plugin_dir_path(__FILE__) . '/subscribe.php';
            }
        }
    }
    return $template_path; // Return template path
} 

/* /////////////// LIMIT POSTS PER PAGE////////////////////////////////////////*/

function set_posts_per_page_for_members( $query ) {
  if ( $query->is_post_type_archive( 'members_post' ) ) {
    $query->set( 'posts_per_page', '8' );
  }
}

add_action( 'pre_get_posts', 'set_posts_per_page_for_members' );

/*/////////////////////////short code/////////////////////////////////////*/
/* need to finish this to display on front page for non members /*/
// function custom_loop_shortcode( $atts ) {
//     $output = '';
//     $custom_loop_atts = shortcode_atts(
//       [
//         'type' => 'members_post',
//       ], $atts

//       );
//     $post_type = $custom_loop_atts['type'];
//     $args = array(
//         'post_type' => $post_type,
//         'post_status' => 'publish',
//         'order' => 'date',
//         'post_per_page' => 16

//       );



//     $the_query = new WP_Query($args);
//         $output .= '<section>';
//           $output .= '<div class="container-fluid">';
//             $output .= '<div class="row">';


//     while ($the_query->have_posts()) : $the_query->the_post();
//       $post_id = get_the_ID();



//       $output .= '<div class="col-sm-6 col-md-3 image--margin">';
//         $output .= '<a href="'. get_permalink() . '">';
//           $output .= get_the_post_thumbnail($post_id, 'full', ['class' => 'grayscale']);
//         $output .= '<p class="hidden center-block">';
//           $output .= esc_html(get_post_meta($post_id, 'stylist_title', true));
//               $output .= ' <br> ';
//               $output .= '<strong>';
//                 $output .= esc_html(get_post_meta($post_id, 'stylist_name', true));
//               $output .= '</strong>';
//           $output .= '</p>';
//           $output .= '</a>';
//         $output .= '</div>';

//       endwhile;

//             $output .= '</div>';
//            $output .= '</div>';
//           $output .= '</section>'; 

//       return $output;
//       wp_reset_postdata();

//     }

//     add_shortcode('custom-loop', 'custom_loop_shortcode');