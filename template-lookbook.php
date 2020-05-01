<?php
/**
 * Template Name: Lookbook
 */

get_header(); ?>


<?php while ( have_posts() ) : the_post();

	do_action( 'storefront_page_before' ); ?>
	
	<div class="site-main">

	<?php if( have_rows('galeria_imagenes') ){ ?>
	
		<div id="sections-landscape" class="full_screen_inner">
	
			<?php while( have_rows('galeria_imagenes') ){ the_row(); ?>
				
				<div class="full_screen_section" >
				
					<?php if( have_rows('galeria_imagenes_slides') ){
						
						while( have_rows('galeria_imagenes_slides') ){ the_row();
						
						$tamano_imagen = get_sub_field('tamano_imagen');
						$imagen_fullwidth = get_sub_field('imagen_fullwidth');
						$imagen_fullwidth_mobile = get_sub_field('imagen_fullwidth_mobile');
						$slide_link_fullwidth = get_sub_field('slide_link_fullwidth');
						$imagen_50_izquierda = get_sub_field('imagen_50_izquierda');
						$imagen_50_derecha = get_sub_field('imagen_50_derecha');
						$slide_link_imagen_izquierda = get_sub_field('slide_link_imagen_izquierda');
						$slide_link_imagen_derecha = get_sub_field('slide_link_imagen_derecha');
						$habilitar_cta = get_sub_field('habilitar_cta'); 
						$cta_fullwidth = get_sub_field('cta_fullwidth'); 
						$cta_izquierda = get_sub_field('cta_izquierda'); 
						$cta_derecha = get_sub_field('cta_derecha'); 
						$cta_color_texto = get_sub_field('cta_color_texto'); 
						$es_imagen = get_sub_field('imagenes'); 
						$es_un_video = get_sub_field('es_un_video'); 
						$video_mp4 = get_sub_field('video_mp4'); 
						$video_webm = get_sub_field('video_webm'); 
						$seleccion_de_productos = get_sub_field('seleccion_de_productos'); 
						$our_selection_products = get_sub_field('our_selection_products');
						$color_txt_menu = get_sub_field('color_txt_menu');

						if ($color_txt_menu=='blanco') {
							$color_class="blanco";
						} elseif ($color_txt_menu=='negro') {
							$color_class="negro";
						} else {
							$color_class="blanco";
						}
						?>
						
							<?php if ($es_imagen==1 && $tamano_imagen=='50%') { ?>
								<div class="slide <?php echo $color_class; ?>">
								    
								    <div class="panel full_bleed" style="background-image: url('<?php echo $imagen_50_izquierda; ?>');">
										<?php if($slide_link_imagen_izquierda) { ?>
											<a class="btLink" href="<?php echo $slide_link_imagen_izquierda; ?>">
												<?php if ($habilitar_cta=='1' && $cta_izquierda) { ?>
													<div class="caption">
														<h2 style="color: <?php echo $cta_color_texto; ?>"><?php echo $cta_izquierda; ?></h2>
														<p style="color: <?php echo $cta_color_texto; ?>">Shop Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
													</div>
												<?php } ?>
											</a>
										<?php } ?>
								    </div>
								    
								    <div class="panel full_bleed" style="background-image: url('<?php echo $imagen_50_derecha; ?>');">
										<?php if($slide_link_imagen_derecha) { ?>
											<a class="btLink" href="<?php echo $slide_link_imagen_derecha; ?>">
												<?php if ($habilitar_cta=='1' && $cta_derecha) { ?>
													<div class="caption">
														<h2 style="color: <?php echo $cta_color_texto; ?>"><?php echo $cta_derecha; ?></h2>
														<p style="color: <?php echo $cta_color_texto; ?>">Shop Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
													</div>
												<?php } ?>
											</a>
										<?php } ?>
								    </div>
								    
							    </div>
							<?php } else if ($es_imagen==1 && $tamano_imagen=='100%') { ?>
								
								<div class="slide <?php echo $color_class; ?>">
								    
								    <div class="panel full_bleed" style="background-image: url('<?php echo $imagen_fullwidth; ?>');">
										<?php if($slide_link_fullwidth) { ?>
											<a class="btLink" href="<?php echo $slide_link_fullwidth; ?>">
												<?php if ($habilitar_cta=='1' && $cta_fullwidth) { ?>
													<div class="caption">
														<h2 style="color: <?php echo $cta_color_texto; ?>"><?php echo $cta_fullwidth; ?></h2>
														<p style="color: <?php echo $cta_color_texto; ?>">Shop Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
													</div>
												<?php } ?>
											</a>
										<?php } ?>
								    </div>
								    
							    </div>
								
							<?php } else if ($es_un_video==1) { ?>

								<div class="slide <?php echo $color_class; ?>">
								    
								    <div class="video_wrapper">
								    	<video data-autoplay playsinline muted loop id="videoBg" > 
								    		<?php if ($video_webm) { echo '<source src="' . $video_webm['url'] . '" type="video/webm">'; } ?>
											<?php if ($video_mp4) { echo '<source src="' . $video_mp4['url'] . '" type="video/mp4">'; } ?>
								    	</video>
								    </div>
								    
							    </div>

							<?php } else if ($seleccion_de_productos==1) {

								$ids='';
								foreach( $our_selection_products as $post) {
									setup_postdata($post);
									$ids .= get_the_ID() . ', ';
								}

								wp_reset_postdata();
								?>

								<div class="slide <?php echo $color_class; ?>">
							       <div class="our-selection">
										<h2>Our Selection</h2>
										<?php echo do_shortcode( '[products ids="'.$ids.'" columns="'.count($our_selection_products).'"]' ); ?>
									</div>
							    </div>     

								<?php
							} ?>
						
						<?php } ?>	
					<?php } ?>	
					
				</div>
					
			<?php } ?>
			
			<div class="full_screen_section footerHolder fp-auto-height">
			</div>
			
		</div>
		
		
		<div id="sections-portrait" class="full_screen_inner">
	
			<?php while( have_rows('galeria_imagenes') ){ the_row(); ?>
				
				<div class="full_screen_section" >
				
					<?php if( have_rows('galeria_imagenes_slides') ){
						
						while( have_rows('galeria_imagenes_slides') ){ the_row();
						
						$tamano_imagen = get_sub_field('tamano_imagen');
						$imagen_fullwidth = get_sub_field('imagen_fullwidth');
						$imagen_fullwidth_mobile = get_sub_field('imagen_fullwidth_mobile');
						$slide_link_fullwidth = get_sub_field('slide_link_fullwidth');
						$imagen_50_izquierda = get_sub_field('imagen_50_izquierda');
						$imagen_50_derecha = get_sub_field('imagen_50_derecha');
						$slide_link_imagen_izquierda = get_sub_field('slide_link_imagen_izquierda');
						$slide_link_imagen_derecha = get_sub_field('slide_link_imagen_derecha');
						$habilitar_cta = get_sub_field('habilitar_cta'); 
						$cta_fullwidth = get_sub_field('cta_fullwidth'); 
						$cta_izquierda = get_sub_field('cta_izquierda'); 
						$cta_derecha = get_sub_field('cta_derecha'); 
						$cta_color_texto = get_sub_field('cta_color_texto');
						$es_imagen = get_sub_field('imagenes'); 
						$es_un_video = get_sub_field('es_un_video'); 
						$video_mp4 = get_sub_field('video_mp4'); 
						$video_webm = get_sub_field('video_webm'); 
						$seleccion_de_productos = get_sub_field('seleccion_de_productos'); 
						$our_selection_products = get_sub_field('our_selection_products');
						?>
						
						<?php if ($es_imagen==1 && $tamano_imagen=='50%') { ?>
							<div class="slide">
							    
							    <div class="panel full_bleed" style="background-image: url('<?php echo $imagen_50_izquierda; ?>');">
									<?php if($slide_link_imagen_izquierda) { ?>
										<a class="btLink" href="<?php echo $slide_link_imagen_izquierda; ?>">
											<?php if ($habilitar_cta=='1' && $cta_izquierda) { ?>
												<div class="caption">
													<h2 style="color: <?php echo $cta_color_texto; ?>"><?php echo $cta_izquierda; ?></h2>
													<p style="color: <?php echo $cta_color_texto; ?>">Shop Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
												</div>
											<?php } ?>
										</a>
									<?php } ?>
							    </div>
							    
						    </div>
						    <div class="slide">
							    
							    <div class="panel full_bleed" style="background-image: url('<?php echo $imagen_50_derecha; ?>');">
									<?php if($slide_link_imagen_derecha) { ?>
										<a class="btLink" href="<?php echo $slide_link_imagen_derecha; ?>">
											<?php if ($habilitar_cta=='1' && $cta_derecha) { ?>
												<div class="caption">
													<h2 style="color: <?php echo $cta_color_texto; ?>"><?php echo $cta_derecha; ?></h2>
													<p style="color: <?php echo $cta_color_texto; ?>">Shop Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
												</div>
											<?php } ?>
										</a>
									<?php } ?>
							    </div>
							    
						    </div>
						<?php } else if ($es_imagen==1 && $tamano_imagen=='100%') { ?>
							
							<div class="slide">
							    
							    <div class="panel full_bleed" style="background-image: url('<?php echo $imagen_fullwidth_mobile; ?>');">
									<?php if($slide_link_fullwidth) { ?>
										<a class="btLink" href="<?php echo $slide_link_fullwidth; ?>">
											<?php if ($habilitar_cta=='1' && $cta_fullwidth) { ?>
												<div class="caption">
													<h2 style="color: <?php echo $cta_color_texto; ?>"><?php echo $cta_fullwidth; ?></h2>
													<p style="color: <?php echo $cta_color_texto; ?>">Shop Now <i class="fa fa-long-arrow-right" aria-hidden="true"></i></p>
												</div>
											<?php } ?>
										</a>
									<?php } ?>
							    </div>
							    
						    </div>
							
						<?php } else if ($es_un_video==1) { ?>

							<div class="slide">
								    
							    <div class="video_wrapper">
							    	<video data-autoplay playsinline muted loop id="videoBg" > 
							    		<?php if ($video_webm) { echo '<source src="' . $video_webm['url'] . '" type="video/webm">'; } ?>
										<?php if ($video_mp4) { echo '<source src="' . $video_mp4['url'] . '" type="video/mp4">'; } ?>
							    	</video>
							    </div>
							    
						    </div>

						<?php } else if ($seleccion_de_productos==1) {

							$ids='';
							foreach( $our_selection_products as $post) {
								setup_postdata($post);
								$ids .= get_the_ID() . ', ';
							}

							wp_reset_postdata();
							?>
							
							<div class="slide">
						       <div class="our-selection">
									<h2>Our Selection</h2>
									<?php echo do_shortcode( '[products ids="'.$ids.'" columns="'.count($our_selection_products).'"]' ); ?>
								</div>
						    </div>     

							<?php
						} ?>
						
						<?php } ?>	
					<?php } ?>	
					
				</div>
					
			<?php } ?>

			<div class="full_screen_section footerHolder fp-auto-height">
			</div>
			
		</div>
	
	<?php } ?>
	
	<div class="full_screen_navigation_holder down_arrow"><div class="full_screen_navigation_inner"><a id="down_fs_button" href="#" target="_self"><i class="fa fa-angle-down" aria-hidden="true"></i></a></div></div>
	
	</div>
	
	<?php
	

	/**
	 * Functions hooked in to storefront_page_after action
	 *
	 * @hooked storefront_display_comments - 10
	 */
	do_action( 'storefront_page_after' );

endwhile; // End of the loop. ?>


<?php
do_action( 'storefront_sidebar' );
//get_footer();
?>


<?php if (is_front_page() || is_page('homepage-new')) {
	
	$enable = get_field('newsletter_enable');
	$txt = get_field('newsletter_txt');
	
	if ( $enable && in_array('yes', $enable) ) {
	?>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				
				function callFancyPopUp(){
					$("#newsletterLayerBt").fancybox({
						padding: 0,
						helpers: {
							overlay : {
								css : {
									'background' : 'rgba(255,255,255, .5)'
								}
							}
						},
						openEffect: 'fade',
						closeEffect: 'fade'
					}).trigger('click');
				}
				
				callFancyPopUp();
				
				var to = setTimeout(function(){
			        $.fancybox.close();
			    }, 15000);
			    
			    $('.tnp-subscription .newsletter-email').on('focus', function(){
			        clearTimeout(to);
			    });
				
			});
		</script>
		
		<a class="fancybox" href="#newsletterLayer" id="newsletterLayerBt"></a>
		<div id="newsletterLayer" style="display: none;">
			<div class="newsletterHolder">
				<?php if (get_field('newsletter_image')) { ?>
					<img src="<?php the_field("newsletter_image"); ?>" alt="" />
				<?php } ?>
				<div class="data">
					<?php if ($txt) { ?>
						<div class="tx">
							<?php echo $txt; ?>
						</div>
					<?php } ?>
				</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } ?>


<?php get_template_part('footer','content'); ?>

</div><!-- .col-full -->
</div><!-- #content -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>