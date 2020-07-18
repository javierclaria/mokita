<?php

function mokita_enqueue_styles() {
    $parent_style = 'parent-style'; // Style Parent child.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version') );
	wp_enqueue_style( 'google-font','https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"', false );
}

add_action( 'wp_enqueue_scripts', 'mokita_enqueue_styles' );

	
//Custom Hooks
add_action( 'init', 'mokita_custom_hooks' );

function mokita_custom_hooks() {

    remove_action( "storefront_header", "storefront_product_search", 40 );
	remove_action( "storefront_footer", "storefront_credit", 20 );  
	
	// Header title
	remove_action( 'storefront_homepage', 'storefront_homepage_header', 10 );
	remove_action( 'storefront_page', 'storefront_page_header', 10 );

	//Remove Menu 
	remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 42 );
	remove_action( 'storefront_header', 'storefront_primary_navigation', 50 );
	remove_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 68 );
	remove_action( 'storefront_header', 'storefront_header_cart', 60 );

	//add actions to menu
	add_action( 'storefront_header', 'storefront_primary_navigation_wrapper', 22 );
	add_action( 'storefront_header', 'storefront_primary_navigation', 23 );
	add_action( 'storefront_header', 'storefront_header_cart', 24 );
	add_action( 'storefront_header', 'storefront_primary_navigation_wrapper_close', 25 );

	// Custom Actions Header
	add_action('storefront_before_header','mokita_header_annoucement', 10);
	add_action('storefront_before_content', 'mokita_page_image_header', 10);

    // After header
    remove_action( "storefront_before_content", "storefront_header_widget_region", 10 );
	remove_action( "storefront_before_content", "woocommerce_breadcrumb", 10 );  

	// Footer 
	add_action( 'storefront_after_footer', 'mokita_footer_copyright', 25 );
	
	// Single Page
	remove_action( "storefront_page'", "storefront_page_header", 10 );  

}

// Functions 
function mokita_page_image_header(){ 
	$img_url = get_field( "imagen_header_full_width", $post_id);
	if($img_url): ?>
	<div class="full-image-mokita-header" style="background-image: url('<?php echo $img_url ?> ');"></div>
	<? endif; 
}

function mokita_header_annoucement() { 
	$text_announcement_header = get_field( "anuncio_header", "option");
	if($text_announcement_header):
	echo '<div class="announcerbar"> '. $text_announcement_header .' </div>';
	endif;
}

function mokita_footer_copyright() { 
	$text_announcement_footer = get_field( "anuncio_copy", "option");
	if($text_announcement_footer):
	echo '<div class="footer_copyright"> '. $text_announcement_footer .' </div>';
	endif;
}

// Register Options Page ACF 
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));

}

// Add Custom Blocks Mokita
add_action('acf/init', 'my_acf_init');

function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register a testimonial block
		acf_register_block(array(
			'name'				=> 'sliderhomepage',
			'title'				=> __('Slider del Homepage'),
			'description'		=> __('Slider Custom para el hoomepage'),
			'render_template'   => 'template-parts/blocks/slider-homepage.php',
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array('slider','homepage'),
		));
	}
}
?>