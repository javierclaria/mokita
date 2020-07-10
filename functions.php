<?php
function mokita_enqueue_styles() {
 $parent_style = 'parent-style'; // Estos son los estilos del tema padre recogidos por el tema hijo.
 wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
 wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version') );
 wp_enqueue_style( 'google-font','https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"', false );
}
add_action( 'wp_enqueue_scripts', 'mokita_enqueue_styles' );

	
	//Custom Header
	add_action( 'init', 'mokita_custom_hooks' );
	function mokita_custom_hooks() {
		remove_action( "storefront_header", "storefront_product_search", 40 );
	}
?>