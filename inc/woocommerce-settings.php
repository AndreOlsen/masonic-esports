<?php 
/**
 * emove "Select options" button from (variable) products on the main WooCommerce shop page.
 *
 * @param Object $product
 * @return void
 */
function remove_select_options_btn($product) {
	global $product;

	if (is_shop() && 'variable' === $product->get_type()) {
		return '';
	} else {
		sprintf('<a href="%s" data-quantity="%s" class="%s" %s>%s</a>',
			esc_url( $product->add_to_cart_url() ),
			esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
			esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
			isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
			esc_html( $product->add_to_cart_text())
		);
	}
}
add_filter('woocommerce_loop_add_to_cart_link', 'remove_select_options_btn', 10, 1);

// Remove sorting list.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// Remove results count.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
// Remove product meta.
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/**  
* Remove product data tabs  
*/ add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 ); 
function woo_remove_product_tabs( $tabs ) 
{     unset( $tabs['additional_information'] );   
  return $tabs; }

/**
 * Adds product title to single product page.
 *
 * @return void
 */
function add_single_product_title() {
	global $product;
    echo '<h2 class="woocommerce-product-title">'.$product->get_title().'</h2>';
}
add_filter( 'woocommerce_single_product_summary', 'add_single_product_title', 5);