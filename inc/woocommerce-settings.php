<?php 

// Remove "Select options" button from (variable) products on the main WooCommerce shop page.
add_filter('woocommerce_loop_add_to_cart_link', 'remove_select_options_btn', 10, 1);

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

// Remove sorting list.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
// Remove results count.
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );