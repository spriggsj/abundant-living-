<?php

add_action('wp_enqueue_scripts', 'my_style_method');
function my_style_method() {

	//sets it
	wp_register_style('style', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
	// fires it
	wp_enqueue_style('style'); //enqueue it
}

add_action('wp_enqueue_scripts', 'my_method');
function my_method() {
    //sets it
	 wp_register_script('custom-script', get_stylesheet_directory_uri() . '/min/custom-min.js', true );

	wp_register_script('custom-script', get_stylesheet_directory_uri() . '/scripts/custom.js', true );
	// fires it
	wp_enqueue_script('custom-script'); //enqueue it
}

function login_logout() {
	register_nav_menu('login-menu',__( 'Login Menu' ));
}

add_action( 'init', 'login_logout' );

// delcares woocommerce theme stream_support

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


/** woocommerce: change position of price on single product **/
 remove_action( 'woocommerce_single_product_summary',
						'woocommerce_template_single_price', 10);
 add_action( 'woocommerce_single_product_summary',
				 'woocommerce_template_single_price', 20 );


// removing the woocommerce sorriting
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

	/** Remove Showing results functionality site-wide */
	function woocommerce_result_count() {
	        return;
	}


add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
/**
 * woo_hide_page_title
 *
 * Removes the "shop" title on the main shop page
 *
 * @access      public
 * @since       1.0
 * @return      void
*/
function woo_hide_page_title() {

	return false;

}





if ( ! function_exists( 'woocommerce_quantity_input' ) ) {
	function woocommerce_quantity_input( $args = array(), $product = null, $echo = true ) {

		if ( is_null( $product ) )
      $product = $GLOBALS['product'];

		$defaults = array(
		  'input_name'    => 'quantity',
		  'input_value'   => '1',
		  'max_value'     => apply_filters( 'woocommerce_quantity_input_max', '', $product ),
		  'min_value'     => apply_filters( 'woocommerce_quantity_input_min', '', $product ),
		  'step'          => apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
		  'style'         => apply_filters( 'woocommerce_quantity_style', 'margin-bottom: 10px;', $product )
		);

		if ( ! empty( $defaults['min_value'] ) )
		$min = $defaults['min_value'];
		else $min = 1;

		if ( ! empty( $defaults['max_value'] ) )
		$max = $defaults['max_value'];
		else $max = 20;

		if ( ! empty( $defaults['step'] ) )
		$step = $defaults['step'];
		else $step = 1;

		$options = '';
		for ( $count = $min; $count <= $max; $count = $count+$step ) {
			$selected = $count === $args['input_value'] ? ' selected' : '';
			$options .= '<option value="' . $count . '"'.$selected.'>' . $count . '</option>';
		}

		$args = apply_filters( 'woocommerce_quantity_input_args', wp_parse_args( $args, $defaults ), $product );

		echo '<div class="quantity_select" style="' . $args['style'] . '"><select name="' . esc_attr( $args['input_name'] ) . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="qty">' . $options . '</select></div>';

    ob_start();

    if ( $echo ) {
        echo ob_get_clean();
    } else {
        return ob_get_clean();
    }
	}
}


// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></a>


	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
}


// Meta box for Posts

add_action('admin_init', 'my_admin');

function my_admin(){
	add_meta_box('post_meta_box',
	'Banner',
	'display_banner_metabox',
	'post',
	'normal',
	'high');
}

function display_banner_metabox($ad_banner){
	wp_nonce_field(basename(__FILE__), 'meta-box-nonce');

$banner = esc_html(get_post_meta($ad_banner->ID, 'banner_input', true));

	?>
	<div>
		<label>Add The Desktop Banner Here</label></br>
		<textarea name="banner" type="text" rows="8" cols="80"><?php echo $banner ?></textarea>
	</div>
	<?php
}

add_action('save_post', 'add_banner_meta_box', 10,2);

function allow_multisite_tags($multisite_tags){
  $multisite_tags['iframe'] = [
    'id' => true,
    'src' => true,
		'title' => true,
		'style' => true,
		'align' => true,
    'width' => true,
    'height' => true,
    'frameborder' => true,
    'scrolling' => true,
		'longdesc' => true,
		'marginheight' => true,
		'marginwidth' => true,
		'name' => true,
  ];
  return $multisite_tags;
}


add_filter('wp_kses_allowed_html', 'allow_multisite_tags');



function add_banner_meta_box($ad_banner_id, $ad_banner){
	if(!isset($_POST['meta-box-nonce']) || !wp_verify_nonce($_POST['meta-box-nonce'], basename(__FILE__)))
		return $ad_banner_id;

	if(!current_user_can('edit_post', $ad_banner_id))
		return $ad_banner_id;

	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $ad_banner_id;


	if($ad_banner->post_type == 'post'){
		if(isset($_POST['banner']) && $_POST['banner'] != ''){
      // This Santizes The Input Text Field
      $mydata = sanitize_text_field($_POST['banner']);
      // Then We Update The Post Meta
      update_post_meta($ad_banner_id, 'banner_input', $_POST['banner'], $mydata);
    }
	}
}



/* pagantatnion for blog archive page */

function custom_pagination($numpages = '', $pagerange = '', $paged='') {

  if (empty($pagerange)) {
    $pagerange = 2;
  }

  /**
   * This first part of our function is a fallback
   * for custom pagination inside a regular loop that
   * uses the global $paged and global $wp_query variables.
   *
   * It's good because we can now override default pagination
   * in our theme, and use this function in default quries
   * and custom queries.
   */
  global $paged;
  if (empty($paged)) {
    $paged = 1;
  }
  if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
        $numpages = 1;
    }
  }


  /**
   * We construct the pagination arguments to enter into our paginate_links
   * function.
   */
  $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => 'page/%#%',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => True,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
  );

  $paginate_links = paginate_links($pagination_args);

  if ($paginate_links) {
    echo "<nav class='custom-pagination'>";
      echo "<span class='page-numbers page-num'>Page " . $paged . " of " . $numpages . "</span> ";
      echo $paginate_links;
    echo "</nav>";
  }

}




function custom_ppp( $query ) {
    if ( !is_admin() && $query->is_category() && $query->is_main_query() ) {
        $query->set( 'posts_per_page', '10' );
    }
}
add_action( 'pre_get_posts', 'custom_ppp' );

?>
