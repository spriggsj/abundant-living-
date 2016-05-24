<?php
/*
*Plugin Name: Spriggs affiliate Post
*Plugin URI:
*Description: Custom Posts For Spriggs affiliate
*Version 1.0
*Author: Jason Spriggs
*/

add_action('init', 'spriggs_custom_post');



function spriggs_custom_post(){
	register_post_type('people_custom_post', 
		[
		'labels' => [
		'name' => 'Affiliate',
		'singular_name' => 'Affiliate',
		'add_new_item' => 'Add New Affiliate',
		'edit_item' => 'Edit item',
        'new_item' => 'New item',
        'view_item' => 'View item',
        'search_item' => 'Search Affiliate',
        'not_found' => 'No item found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'parent item'
		],
			'public' => true,
			'has_archive' => true,
			'menu_icon' => 'dashicons-products',
			'rewrite' => array('slug' => 'Affiliate'),///need to change to chapter
			'publicly_queryable' => true,
			'query_var' => true,
			'supports' => [
				'title', //ie  editor etc
				],
        
				'taxonomies' => ['category'],
		]
	

		);
}

add_action('admin_init', 'people_post');

function people_post(){
	add_meta_box ('people_custom_posts_meta', 
		'Affiliate Info',
		'display_people_meta_box',
		'people_custom_post',
		'normal',
		'high'
		);
}



function display_people_meta_box($people){
	$nametitle = esc_html(get_post_meta($people->ID, 'name_title',true));

	?>
	<label for='name_title'>Affiliate Code</label>
	<input type="text" class="widefat" name="name_title" placeholder="Ex. Amazon Code" value="<?php echo $nametitle; ?>"><br/>

	<?php
}


add_action('save_post', 'add_people_fields', 10, 2); //save action to save inputs from custom post

function add_people_fields($people_info_id, $people){

  if ($people->post_type == 'people_custom_post'){
    if(!current_user_can('edit_post', $people_info_id)) 
    	return $people_info_id;

    $name_title = wp_kses_post($_POST['name_title']);
    if(isset($name_title) && $name_title != ''){
      update_post_meta($people_info_id, 'name_title', $name_title);
    }

  }

}



add_filter('template_include', 'include_people_function', 1);

function include_people_function($template_path){ // Checks to see if is custom post
    if(get_post_type() == 'people_custom_post'){ // If is single page
            // First Check to see if theme file 'singe-members.php exists'
            //If it doesnt then use the default from the plugin
        if (is_single()){
            if ($theme_file = locate_template(['affiliate.php'])){
                $template_path = $theme_file;
            }else {
                // Default location from the plugin
                $template_path = plugin_dir_path(__FILE__) . '/affiliate.php';
            }
        }
    }
    return $template_path; // Return template path
} 

/* /////////////// LIMIT POSTS PER PAGE////////////////////////////////////////*/

function set_posts_per_page_for_people( $query ) {
  if ( $query->is_post_type_archive( 'people_custom_post' ) ) {
    $query->set( 'posts_per_page', '4' );
  }
}

add_action( 'pre_get_posts', 'set_posts_per_page_for_people' );


/*//////////////////////SHORT CODE /////////////////////////////////////////////*/

function js_loop_shortcode( $atts ) {
   $output = '';
   $js_loop_atts = shortcode_atts(
      [
        'type' => 'people_custom_post',
      ], $atts

      );
   $post_type = $js_loop_atts['type'];
   $args = array(
      'post_type' => $post_type,
      'post_status' => 'publish',
      'order' => 'date',
      'post_per_page' => 4
   );

<<<<<<< HEAD
      );

    $the_query = new WP_Query($args);
        $output .= '<section>';
          $output .= '<div class="container-fluid">';
            $output .= '<div class="row">';
              $output .= '<p id="slogan">';
                $output .= 'Products I love';
                  $output .= '</p>';
=======
   $the_query = new WP_Query($args);
      $output .= '<div class="container">';
         $output .= '<div class="row">';

            while ($the_query->have_posts()) : $the_query->the_post();
               $post_id = get_the_ID();
>>>>>>> 5038974b6334f7a34fb3f58801eb26493ab5ba61

               $output .= '<div class="col-xs-6 col-sm-3 affiliate-image">';
                  $output .= get_post_meta($post_id, 'name_title', true);
               $output .= '</div>';

            endwhile;

         $output .= '</div>';
      $output .= '</div>'; 

      return $output;
      
      wp_reset_postdata();

   }
    
   add_shortcode('js-loop', 'js_loop_shortcode');

?>