<?php
	/**
	 * Child Theme Path
	 */
	function theme_path(){
		return get_stylesheet_directory_uri();
	}
	
	/**
	 * Child Theme JS Path
	 */
	function js_path(){
		return theme_path() . "/js/";
	}
	
	/**
	 * Child Theme CSS Path
	 */
	function css_path(){
		return theme_path() . "/css/";
	}
	
	/**
	 * Child Theme Images Path
	 */
	function images_path(){
		return theme_path() . "/images/";
	}
	

	/**
	 * Custom Scripts
	 */
	function load_custom_scripts() {
		if ( ! is_admin() ) {
			// global $wp_query;
	
			/**
			 * Scripts
			 */
			wp_register_script( 'scrolloverflow', js_path() . 'scrolloverflow.min.js', 'jquery', '0.0.1', true );
			wp_enqueue_script( 'scrolloverflow' );

			wp_register_script( 'fullpage', js_path() . 'jquery.fullPage.min.js', 'jquery', '2.9.4', true );
			wp_enqueue_script( 'fullpage' );
			
			wp_register_script( 'fancybox', js_path() . 'jquery.fancybox.pack.js', 'jquery', '1.0', true );
			wp_enqueue_script( 'fancybox' );
			
			wp_register_script( 'main-scripts', js_path() . 'scripts.js', 'jquery', '1.0', true );
			wp_enqueue_script( 'main-scripts' );
	
			/**
			 * Styles
			 */
			wp_register_style( 'googlefonts', 'https://fonts.googleapis.com/css?family=Raleway:400,700', array(),'1.0.0','all');
			wp_enqueue_style( 'googlefonts' );
			
			wp_register_style( 'fullpage', css_path() . 'jquery.fullPage.css' );
			wp_enqueue_style( 'fullpage' );
			
			wp_register_style( 'fancybox', css_path() . 'jquery.fancybox.css' );
			wp_enqueue_style( 'fancybox' );

			wp_register_style( 'font-awesome', css_path() . 'font-awesome.min.css' );
			wp_enqueue_style( 'font-awesome' );
	
			/* Absolute paths for JS */
			wp_localize_script(
				'main-scripts',
				'paths',
				array(
					'template' => theme_path(),
					'js'       => js_path(),
					'css'      => css_path(),
					'images'   => images_path()
				)
			);
			
			//Ajax
			wp_localize_script( 'main-scripts', 'js_config', array(
		        'ajax_url'	=> admin_url( 'admin-ajax.php' ),
		        'ajax_nonce'	=> wp_create_nonce( 'ajax-nonce' ),
		    ));
		}
	}
	add_action( 'wp_enqueue_scripts', 'load_custom_scripts' );
	
	
	require get_stylesheet_directory() . '/inc/shortcodes.php';
	

	add_action('after_setup_theme', 'remove_admin_bar');
	function remove_admin_bar() {
		show_admin_bar(false);
	}

	//Header: adding custom code
	add_action( 'wp_head', 'header_content', 40 );
	function header_content() { ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-118055230-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-118055230-1');
		</script>
		<?php
	}
	
	
	//Custom Header
	add_action( 'init', 'custom_hooks' );
	function custom_hooks() {
		remove_action( 'storefront_header', 'storefront_skip_links', 0 );
		remove_action( 'storefront_header', 'storefront_social_icons', 10 );
		remove_action( 'storefront_header', 'storefront_secondary_navigation', 30 );
		// remove_action( 'storefront_header', 'storefront_product_search', 40 );
		remove_action( 'storefront_content_top', 'woocommerce_breadcrumb', 10 );
		remove_action( 'storefront_footer', 'storefront_credit', 20 );
		//remove_action( 'storefront_header', 'storefront_product_search', 40 );
		//add_action( 'storefront_header', 'storefront_product_search', 70 );
		remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_catalog_ordering', 10 );
		remove_action( 'woocommerce_after_shop_loop' , 'woocommerce_result_count', 20 );
		
	}

	//

	add_filter('woocommerce_paypal_supported_currencies', 'custom_woocommerce_paypal_supported_currencies');
	function custom_woocommerce_paypal_supported_currencies($paypal_currencies)
	{
		if ($paypal_currencies)
		{
			$paypal_currencies[] = 'ARS';
			return $paypal_currencies;
		}
	}
	
	//Icon search Header
	function iconsearch()
	{ ?>
		<span class="icon_search_header_revolver"></span>
	<?php }
	add_action('storefront_header','iconsearch');
	

	/* Custom Image Sizes */
	add_action( 'after_setup_theme', 'custom_image_sizes' );
	function custom_image_sizes() {
		add_image_size( 'project-image-submenu', 440, 297, true);
	}


	function menu_responsive() {
	    ?>
		    <a class="shiftnav-toggle shiftnav-toggle-button" data-shiftnav-target="shiftnav-main"><i class="fa fa-bars"></i></a>
	    <?php
	}
	add_action( 'storefront_header', 'menu_responsive', 15 );


	/**
	 * Adds a top bar to Storefront, before the header.
	 */
	function barra_promocional() {
		
		$barra_promocional_habilitar = get_field('barra_promocional_habilitar', 'option');
		$barra_promocional_texto = get_field('barra_promocional_texto', 'option');
		$barra_promocional_bgcolor = get_field('barra_promocional_bgcolor', 'option');

		if ($barra_promocional_habilitar=='1') {
	    ?>
		    <div class="barra_promocional" style="background-color: <?php echo $barra_promocional_bgcolor; ?>">
		        <?php echo $barra_promocional_texto; ?>
		    </div>
	    <?php
	    }
	}
	add_action( 'storefront_before_header', 'barra_promocional', 0 );

	
	//Banner Shop
	add_action( 'storefront_content_top', 'jk_storefront_content_top', 20 );
	function jk_storefront_content_top() {
		global $post;

		if ( is_shop() || get_page_template_slug( $post->ID )=='tienda-portada.php' ) { 
			$post = get_page_by_path( 'banner-shop', OBJECT, 'page' );
			$output = apply_filters( 'the_content', $post->post_content );
			echo $output;
		}
		
		if ( is_product_category() ) { 
			$queried_object = get_queried_object(); 
			$taxonomy = $queried_object->taxonomy;
			$term_id = $queried_object->term_id;  
			$banner_img = get_field( 'banner_img', $queried_object );
			$banner_img = get_field( 'banner_img', $taxonomy . '_' . $term_id );
			$banner_link = get_field( 'banner_link', $queried_object );
			$banner_link = get_field( 'banner_link', $taxonomy . '_' . $term_id );
			if( get_field('banner_img', $taxonomy . '_' . $term_id) ) {
				echo '<div class="catBanner">';

					if (get_field('banner_link', $taxonomy . '_' . $term_id)) {
						echo '<a href="' . $banner_link . '">';
					}

					echo '<img src="' . $banner_img['url'] . '"/>';

					if (get_field('banner_link', $taxonomy . '_' . $term_id)) {
						echo '</a>';
					}
				echo '</div>';
			}
		}
	}
	
	
	//Remove sidebar storefront
	function remove_storefront_sidebar() {
	    //if ( is_archive() || is_product() ) {
	    	remove_action( 'storefront_sidebar', 'storefront_get_sidebar', 10 );
	    //}
	}
	add_action( 'get_header', 'remove_storefront_sidebar' );
	
	
	//Shop: products per row
	function loop_columns( $columns ) {
	    $columns = 3;
	    return $columns;
	}
	add_filter( 'storefront_loop_columns', 'loop_columns', 999 ); 
	
	
	//Shop: product subcategories
	function product_subcategories( $args = array() ) {
		
		get_template_part( 'woo', 'categories' );
		
	}
	add_action( 'woocommerce_before_shop_loop', 'product_subcategories', 20 );
	
	
	// Change "Default Sorting" to "Our sorting" on shop page and in WC Product Settings
	function skyverge_change_default_sorting_name( $catalog_orderby ) {
	    $catalog_orderby = str_replace("Orden predeterminado", "Filtros", $catalog_orderby);
	    return $catalog_orderby;
	}
	add_filter( 'woocommerce_catalog_orderby', 'skyverge_change_default_sorting_name' );
	add_filter( 'woocommerce_default_catalog_orderby_options', 'skyverge_change_default_sorting_name' );
	
	
	//Changing the Text in the Sort
	function patricks_woocommerce_catalog_orderby( $orderby ) {
		$orderby["date"] = __('+ Nuevo', 'woocommerce');
		$orderby["popularity"] = __('+ Relevante', 'woocommerce');
		$orderby["price"] = __('Precio: Bajo a Alto', 'woocommerce');
		$orderby["price-desc"] = __('Precio: Alto a Bajo', 'woocommerce');
		
		return $orderby;
	}
	add_filter( "woocommerce_catalog_orderby", "patricks_woocommerce_catalog_orderby", 20 );
	
	
	//Show “Sold Out” on Shop and Archive pages
	add_action( 'woocommerce_before_shop_loop_item_title', 'bbloomer_display_sold_out_loop_woocommerce' ); 
	function bbloomer_display_sold_out_loop_woocommerce() {
	    global $product;
	 
	    if ( !$product->is_in_stock() ) {
	        echo '<span class="soldout">' . __( 'AGOTADO', 'woocommerce' ) . '</span>';
	    }
	} 
	
	
	//Show “New” on Shop and Archive pages
	add_action( 'woocommerce_before_shop_loop_item_title', 'display_new_badge_woocommerce' ); 
	function display_new_badge_woocommerce() {
	    global $product;
	    $prod_is_new = get_field( 'prod_nuevo', $product->get_id() );
	    
		/*
		--Setear automaticamente por fecha de publicacion del producto: ejemplo, hasta 4 semanas atrás
		
		$prod_date = the_date('Y-m-d','','',false);
		$date_object = new DateTime();
		$date_object->modify('-4 weeks');
		$prod_is_new = (strtotime($prod_date) > strtotime($date_object->format('Y-m-d')));
		*/
		
	    if ( $prod_is_new ) {
	        echo '<span class="newBadge">' . __( 'NEW IN', 'woocommerce' ) . '</span>';
	    }
	} 
	
	
	//Back to Shop Button
	remove_action('woocommerce_single_product_summary','woocommerce_template_single_title',5);
	add_action('woocommerce_single_product_summary', 'woocommerce_my_single_title',5);
	if ( ! function_exists( 'woocommerce_my_single_title' ) ) {
		function woocommerce_my_single_title() {
			$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>
			<a href="<?php echo $shop_page_url; ?>" class="back">Back to Shop</a><?php
			woocommerce_template_single_title();
		}
	}
	
	
	//Remove Product tabs
	add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
	function woo_remove_product_tabs( $tabs ) {
	    //unset( $tabs['description'] );      	// Remove the description tab
	    //unset( $tabs['reviews'] ); 			// Remove the reviews tab
	    unset( $tabs['additional_information'] );  	// Remove the additional information tab
	
	    return $tabs;
	}
	
	
	//Hides everything but free_shipping if it’s available and is compatible with Shipping Zones.
	function my_hide_shipping_when_free_is_available( $rates ) {
		$free = array();
		foreach ( $rates as $rate_id => $rate ) {
			if ( 'free_shipping' === $rate->method_id ) {
				$free[ $rate_id ] = $rate;
				break;
			}
		}
		return ! empty( $free ) ? $free : $rates;
	}
	add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );

	
	add_action('acf/init', 'ntm_options_page');
	function ntm_options_page() {
		
		if( function_exists('acf_add_options_page') ) {
			
			$option_page = acf_add_options_page(array(
				'page_title'  => 'Opciones Generales',
				'menu_title'  => 'Opciones Generales',
				'menu_slug'   => 'opciones-generales',
				'icon_url'    => 'dashicons-admin-settings',
			));
			
		}
		
	}
	
	//Add text to Procesando tu pedido email template, solamente cuando hay shipping method
	add_action( 'woocommerce_email_before_order_table', 'custom_content_to_processing_customer_email', 10, 4 );
	function custom_content_to_processing_customer_email( $order, $sent_to_admin, $plain_text, $email ) {
	
	    if( 'customer_processing_order' == $email->id ){
			
			$local_pickup = false;
			foreach ( $order->get_shipping_methods() as $shipping_method ) {
				$shipping_method_id = current( explode( ':', $shipping_method['method_id'] ) );
		
				if ( 'local_pickup' == $shipping_method_id ) {
					$local_pickup = true;
					break;
				}
			}
		
			if ( ! $local_pickup ) {
				// shipping method
				$text = '<p><strong>Registrate en <a href="https://roparevolver.com/mi-cuenta/">Mi Cuenta</a>, desde nuestro EShop y realizá el seguimiento online de tu pedido.
				<br /><br />
				Te enviaremos el mail de confirmación de la compra en cuanto se registre el pago de la misma. No olvides revisar el spam de tu correo electrónico (!)</strong></p>';
			} 
		
			echo $text;
	
	    }
	
	}
	
	
	//Newsletter form ajax
	function jnz_tnp_ajax_subscribe() {
	    check_ajax_referer( 'ajax-nonce', 'nonce' );
	    $data = urldecode( $_POST['data'] );
	    if ( !empty( $data ) ) :
	        $data_array = explode( "&", $data );
	        $fields = [];
	        foreach ( $data_array as $array ) :
	            $array = explode( "=", $array );
	            $fields[ $array[0] ] = $array[1];
	        endforeach;
	    endif;
	
	    if ( !empty( $fields ) ) :
	         if ( filter_var( $fields['ne'], FILTER_VALIDATE_EMAIL ) ) :
	            global $wpdb;
	
	             //check if the email is already in the database
	             $exists = $wpdb->get_var(
	                 $wpdb->prepare(
	                     "SELECT email FROM " . $wpdb->prefix . "newsletter
	                    WHERE email = %s",
	                     $fields['ne']
	                 )
	             );
	
	             if ( ! $exists ) {
	                 NewsletterSubscription::instance()->subscribe();
	                 $output = array(
	                     'status'    => 'success',
	                     'msg'       => __( 'Gracias por suscribirte!', 'theme_text_domain' )
	                 );
	             } else {
	                 //email is already in the database
	                 $output = array(
	                     'status'    => 'error',
	                     'msg'       => __( 'Tu email ya está suscripto en nuestro newsletter.', 'theme_text_domain' )
	                 );
	             }
	
	         else :
	             $output = array(
	                 'status'    => 'error',
	                 'msg'       => __( 'El email es inválido.', 'theme_text_domain' )
	             );
	         endif;
	    else :
	        $output = array(
	            'status'    => 'error',
	            'msg'       => __( 'Hubo un error. Por favor, intentá más tarde.', 'theme_text_domain' )
	        );
	    endif;
	    wp_send_json( $output );
	}
	add_action( 'wp_ajax_nopriv_ajax_subscribe', 'jnz_tnp_ajax_subscribe' );
	add_action( 'wp_ajax_ajax_subscribe', 'jnz_tnp_ajax_subscribe' );


	// Change ‘In Stock’ / ‘Out of Stock’ text displayed on a product page
	add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);
	function wcs_custom_get_availability( $availability, $_product ) {
	    
	    // Change In Stock Text
	    if ( $_product->is_in_stock() ) {
	        $availability['availability'] = __('Hay stock', 'woocommerce');
	    }
	    // Change Out of Stock Text
	    if ( ! $_product->is_in_stock() ) {
	        $availability['availability'] = __('Agotado', 'woocommerce');
	    }
	    return $availability;
	}


	add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);
	function my_wp_nav_menu_objects( $items, $args ) {
	    
	    // loop
	    foreach( $items as &$item ) {
	        
	        // vars
	        $copy = get_field('destacar_en_rojo', $item);
	        
	        if( $copy ) {
	            
	            //print_r($item);
	            $item->title = '<span class="in_red">' . $item->title . '</span>';
	            
	        }
	        
	    }
	    
	    // return
	    return $items;
	    
	}


	//Contenido con popups en single
	add_action('woocommerce_single_product_summary', 'after_content_single', 35);
	function after_content_single() {
		global $product; ?>
		
		<?php if ( is_product() ) { ?>
			<div class="content_bottom">
				
				<?php
					$guia_talles = get_field('guia_talles', $product->get_id());
				?>
				
				<?php if ( $guia_talles ) { 
					$guia_talles_imagen = get_field('guia-talles-imagen', $guia_talles); ?>
					
				    <div class="guiaTalles">
						<a href="<?php echo $guia_talles_imagen['sizes']['large']; ?>" data-fancybox="images">Guía de Talles</a>
					</div>
				<?php }; ?>
				
			</div>	
		<?php } ?>
		
		<?php
	}
	
	//  Show visual option and tabs in wysiwyg editor
	add_filter( 'user_can_richedit' , '__return_true', 50 );
	

	// Add CC y Reply all a mails de Woocommerce
	add_filter( 'woocommerce_email_headers', 'add_cc_replyall', 10, 2);
	function add_cc_replyall( $headers = '', $id = '', $object = '' ) {

		$cc_email = 'ventaonline@roparevolver.com';

		if ( $id == 'customer_completed_order' || $id == 'customer_invoice' || $id == 'customer_new_account' || $id == 'customer_note' || $id == 'customer_on_hold_order' || $id == 'customer_processing_order' || $id == 'customer_refunded_order' || $id == 'customer_reset_password' ) {
			if ( $cc_email ) {
				$headers .= 'Reply-to: Ropa Revolver <'.$cc_email.'>' . "\r\n";
				$headers .= 'Cc: ' . $cc_email . '' . "\r\n";
			}
		}
		return $headers;
	}

	// Woocommerce products image size
	add_filter( 'woocommerce_get_image_size_single', function( $size ) {
		return array(
			'width'  => 1000,
			'height' => '',
			'crop'   => 0,
		);
	} );

	add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
		return array(
			'width'  => 768,
			'height' => '',
			'crop'   => 0,
		);
	} );

	add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function( $size ) {
		return array(
			'width'  => 100,
			'height' => 100,
			'crop'   => 1,
		);
	} );

	function theme_add_price_free_shipping_oca() {
		$precio_envio_gratis_oca = get_field('precio_envio_gratis_oca', 'option');
		$precio = '';

		if ($precio_envio_gratis_oca && $precio_envio_gratis_oca!=='') {
			$precio = $precio_envio_gratis_oca;
		}

		return $precio;
	}

?>