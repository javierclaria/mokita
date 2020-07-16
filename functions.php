<?php

function mokita_enqueue_styles() {
    $parent_style = 'parent-style'; // Style Parent child.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ), wp_get_theme()->get('Version') );
	wp_enqueue_style( 'google-font','https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"', false );
	
	// Owl Carrusel
	wp_enqueue_script( 'owl-script', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'owl-script-nomin', get_stylesheet_directory_uri() . '/js/owl.carousel.js', array(), '1.0.0', true );
	wp_enqueue_style( 'owl-default-style', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css', array(), '1.0.0', true  );
	wp_enqueue_style( 'owl-style', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), '1.0.0', true  );
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

    // After header
    remove_action( "storefront_before_content", "storefront_header_widget_region", 10 );
	remove_action( "storefront_before_content", "woocommerce_breadcrumb", 10 );  
	
	// Single Page
	remove_action( "storefront_page'", "storefront_page_header", 10 );  

}


// Custom Actions Header
add_action('storefront_before_content', 'full_image_header', 10);

function full_image_header(){ 
	$img_url = get_field( "imagen_header_full_width", $post_id);
	if($img_url):
	?>
	<div class="full-image-mokita-header"><img src="<?php echo $img_url ?>"></div>
	<? endif; }

// Heade Annoucement
add_action('storefront_header','mokita_header', 40);

function mokita_header() { 
	ob_start();
	$output = "<div>test</div>";

	return $output;
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