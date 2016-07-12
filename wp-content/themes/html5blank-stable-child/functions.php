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


// override the quantity input with a dropdown for woocommere

	function woocommerce_quantity_input() {
		 global $product;


		 $defaults = array(
			 'input_name'  	=> 'quantity',
			 'input_value'  	=> '1',
			 'max_value'  	=> apply_filters( 'woocommerce_quantity_input_max', '', $product ),
			 	'min_value'  	=> apply_filters( 'woocommerce_quantity_input_min', '', $product ),
				'step' 		=> apply_filters( 'woocommerce_quantity_input_step', '1', $product ),
				'style'		=> apply_filters( 'woocommerce_quantity_style', 'float:left; margin-right:10px;', $product )
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
				$options .= '<option value="' . $count . '">' . $count . '</option>';
			}
			echo '<div class="quantity_select" style="' . $defaults['style'] . '"><select name="' . esc_attr( $defaults['input_name'] ) . '" title="' . _x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) . '" class="qty">' . $options . '</select></div>';
		}



// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	?>
	<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>"><?php echo sprintf (_n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> - <?php echo WC()->cart->get_cart_total(); ?></a>
	<?php

	$fragments['a.cart-contents'] = ob_get_clean();

	return $fragments;
}
