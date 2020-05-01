<?php
/**
 * Template Name: Tienda Portada
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post();

				do_action( 'storefront_page_before' ); ?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<?php	
						get_template_part( 'woo', 'categories' );	
					?>	
					
					<?php if( have_rows('tienda_portada') ){ ?>
			
						<ul class="tiendaPortadaList" >
						
							<?php while( have_rows('tienda_portada') ){ the_row();
								
								$attachment_id = get_sub_field('tienda_portada_imagen');
								$size = "portfolio_masonry_large";
								$tienda_portada_imagen = wp_get_attachment_image_src( $attachment_id, $size );
								
								$tienda_portada_texto = get_sub_field('tienda_portada_texto');
								$tienda_link = get_sub_field('tienda_link'); ?>
									
								<li>
								    
								    <a href="<?php echo $tienda_link; ?>" style="background-image: url('<?php echo $tienda_portada_imagen[0]; ?>');">
									    <span class="sh"></span>
									    <span class="tit"><?php echo $tienda_portada_texto; ?></span>
								    </a>
								    
							    </li>
								
							<?php } ?>	
							
						</ul>
							
					<?php } ?>
					
				</div><!-- #post-## -->
				
				<?php
				

				/**
				 * Functions hooked in to storefront_page_after action
				 *
				 * @hooked storefront_display_comments - 10
				 */
				do_action( 'storefront_page_after' );

			endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();