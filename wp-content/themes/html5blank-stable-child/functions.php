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


/** woocommerce: change position of price on single product **/
 remove_action( 'woocommerce_single_product_summary',
						'woocommerce_template_single_price', 10);
 add_action( 'woocommerce_single_product_summary',
				 'woocommerce_template_single_price', 20 );



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

		
