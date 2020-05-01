<?php
	if ( !is_search() ) {
		$prod_cat_args = array(
			'taxonomy'     => 'product_cat', //woocommerce
			'hide_empty'        => 1
		);
		
		$woo_categories = get_categories( $prod_cat_args ); 
		
		if($woo_categories){
			
			$shop_page_url = get_permalink( woocommerce_get_page_id( 'shop' ) ); 
			?>
		
			<div class="listCategories">
				<ul> 
					<li><a href="<?php echo $shop_page_url; ?>">Ver todo</a></li>
					<?php
					foreach ( $woo_categories as $woo_cat ) {
						$woo_cat_id = $woo_cat->term_id; //category ID
						$woo_cat_name = $woo_cat->name; //category name
						$woo_cat_slug = $woo_cat->slug; //category slug
						$destacar = get_field('destacar_menu', $woo_cat);
						
						echo '<li data-destacado="'.$destacar.'"><a href="' . get_term_link( $woo_cat_slug, 'product_cat' ) . '">' . $woo_cat_name . '</a></li>';
					} ?>
				</ul>
			</div><?php

		}
	}

if ( is_search() ) { ?>
<div> <?php 
	$allsearch = new WP_Query("s=$s&showposts=-1"); 
	$key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e(''); _e('<span class="search-terms">'); 
	echo $key; _e('</span>'); _e(' &mdash; '); echo $count . ' '; _e('productos'); wp_reset_query(); 
} ?>
</div>
<?php ?> 