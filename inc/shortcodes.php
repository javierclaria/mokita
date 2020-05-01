<?php
/**
 * Shortcode
 */



//Next Project
function next_project($atts) {
	ob_start();

	get_template_part( 'shortcodes/next-project' );

	return ob_get_clean();
}
add_shortcode( 'next_project', 'next_project' );

//Previous Project
function previous_project($atts) {
	ob_start();

	get_template_part( 'shortcodes/previous-project' );

	return ob_get_clean();
}
add_shortcode( 'previous_project', 'previous_project' );

//Projects feed submenu
function projects_feed_submenu($atts) {
	ob_start();

	get_template_part( 'shortcodes/projects-feed-submenu' );

	return ob_get_clean();
}
add_shortcode( 'projects_feed_submenu', 'projects_feed_submenu' );






// 
function lookbook_slider( $atts , $content = null ) {
	
		ob_start(); ?>
		
		<div id="sections-landscape" class="full_screen_inner">

		<?php if( have_rows('galeria_home') ){ ?>
			
			<div class="full_screen_section" >
			
				<?php while( have_rows('galeria_home') ){ the_row();
			
					$galeria_home_img_izq = get_sub_field('galeria_home_img_izq');
					$galeria_home_img_der = get_sub_field('galeria_home_img_der');
					$galeria_home_izq_producto = get_sub_field('galeria_home_izq_producto');
					$galeria_home_izq_link = get_sub_field('galeria_home_izq_link');
					$galeria_home_der_producto = get_sub_field('galeria_home_der_producto');
					$galeria_home_der_link = get_sub_field('galeria_home_der_link'); ?>
						
					<div class="slide">
					    
					    <div class="left_panel panel full_bleed" style="background-image: url('<?php echo $galeria_home_img_izq; ?>');">
						    <?php if($galeria_home_izq_producto || $galeria_home_izq_link) { ?>
							    <?php if($galeria_home_izq_link) { ?>
							   		<a class="btLink" href="<?php echo $galeria_home_izq_link; ?>"></a>
							    <?php } ?>
							    <!--
							    <article class="dataProd">
								    <p class="prod"><?php echo $galeria_home_izq_producto; ?></p>
								    <?php if($galeria_home_izq_link) { ?>
								   		<p class="link"><a href="<?php echo $galeria_home_izq_link; ?>">Shop now</a></p>
								    <?php } ?>
							    </article>
							    -->
						    <?php } ?>
					    </div>
					    
					    <div class="right_panel panel full_bleed" style="background-image: url('<?php echo $galeria_home_img_der; ?>');">
						    <?php if($galeria_home_der_producto || $galeria_home_der_link) { ?>
							    <?php if($galeria_home_izq_link) { ?>
							   		<a class="btLink" href="<?php echo $galeria_home_izq_link; ?>"></a>
							    <?php } ?>
							    <!--
							    <article class="dataProd right">
								    <p class="prod"><?php echo $galeria_home_der_producto; ?></p>
								    <?php if($galeria_home_der_link) { ?>
								   		<p class="link"><a href="<?php echo $galeria_home_der_link; ?>">Shop now</a></p>
								    <?php } ?>
							    </article>
							    -->
						    <?php } ?>
					    </div>
					    
				    </div>
					
				<?php } ?>	
				
			</div>
				
		<?php } ?>
		
		<?php if( have_rows('banner_home') ){ ?>
			
			<div class="full_screen_section slideBanner" >
			
				<?php while( have_rows('banner_home') ){ the_row();
			
					$banner_home_img_izq = get_sub_field('banner_home_img_izq');
					$banner_home_img_der = get_sub_field('banner_home_img_der');
					$banner_home_link_izq = get_sub_field('banner_home_link_izq');
					$banner_home_link_der = get_sub_field('banner_home_link_der'); ?>
						
					<div class="slide">
						
					    <?php if ($banner_home_link_izq) { ?>
					    	<div class="left_panel panel full_bleed" style="background-image: url('<?php echo $banner_home_img_izq; ?>');">
						    	<a class="link" href="<?php echo $banner_home_link_izq; ?>"></a>
					    	</div>
					    <?php } else { ?>
					    	<div class="left_panel panel full_bleed" style="background-image: url('<?php echo $banner_home_img_izq; ?>');"></div>
					    <?php } ?>
					    
					    <?php if ($banner_home_link_der) { ?>
					    	<div class="right_panel panel full_bleed" style="background-image: url('<?php echo $banner_home_img_der; ?>');">
						    	<a class="link" href="<?php echo $banner_home_link_der; ?>"></a>
					    	</div>
					    <?php } else { ?>
					    	<div class="right_panel panel full_bleed" style="background-image: url('<?php echo $banner_home_img_der; ?>');"></div>
					    <?php } ?>
					    
				    </div>
					
				<?php } ?>	
				
			</div>
				
		<?php } ?>
		
		
		<div class="full_screen_section footerHolder fp-auto-height">
		</div>
		
	</div>
	
	
	<div id="sections-portrait" class="full_screen_inner">

		<?php if( have_rows('galeria_home') ){ ?>
			
			<div class="full_screen_section" >
			
				<?php while( have_rows('galeria_home') ){ the_row();
			
					$galeria_home_img_izq = get_sub_field('galeria_home_img_izq');
					$galeria_home_img_der = get_sub_field('galeria_home_img_der');
					$galeria_home_izq_producto = get_sub_field('galeria_home_izq_producto');
					$galeria_home_izq_link = get_sub_field('galeria_home_izq_link');
					$galeria_home_der_producto = get_sub_field('galeria_home_der_producto');
					$galeria_home_der_link = get_sub_field('galeria_home_der_link'); ?>
						
					<div class="slide">
					    
					    <div class="left_panel panel full_bleed" style="background-image: url('<?php echo $galeria_home_img_izq; ?>');">
						    <?php if($galeria_home_izq_producto || $galeria_home_izq_link) { ?>
							    <?php if($galeria_home_izq_link) { ?>
							   		<a class="btLink" href="<?php echo $galeria_home_izq_link; ?>"></a>
							    <?php } ?>
							    <!--
							    <article class="dataProd">
								    <p class="prod"><?php echo $galeria_home_izq_producto; ?></p>
								    <?php if($galeria_home_izq_link) { ?>
								   		<p class="link"><a href="<?php echo $galeria_home_izq_link; ?>">Shop now</a></p>
								    <?php } ?>
							    </article>
							    -->
						    <?php } ?>
					    </div>
					    
				    </div>
				    <div class="slide">
					    
					    <div class="right_panel panel full_bleed" style="background-image: url('<?php echo $galeria_home_img_der; ?>');">
						    <?php if($galeria_home_der_producto || $galeria_home_der_link) { ?>
							    <?php if($galeria_home_izq_link) { ?>
							   		<a class="btLink" href="<?php echo $galeria_home_izq_link; ?>"></a>
							    <?php } ?>
							    <!--
							    <article class="dataProd right">
								    <p class="prod"><?php echo $galeria_home_der_producto; ?></p>
								    <?php if($galeria_home_der_link) { ?>
								   		<p class="link"><a href="<?php echo $galeria_home_der_link; ?>">Shop now</a></p>
								    <?php } ?>
							    </article>
							    -->
						    <?php } ?>
					    </div>
					    
				    </div>
					
				<?php } ?>	
				
			</div>
				
		<?php } ?>
		
		<?php if( have_rows('banner_home') ){ ?>
			
			<div class="full_screen_section slideBanner" >
			
				<?php while( have_rows('banner_home') ){ the_row();
			
					$banner_home_img_izq = get_sub_field('banner_home_img_izq');
					$banner_home_img_der = get_sub_field('banner_home_img_der');
					$banner_home_link_izq = get_sub_field('banner_home_link_izq');
					$banner_home_link_der = get_sub_field('banner_home_link_der'); ?>
						
					<div class="slide">
						
					    <?php if ($banner_home_link_izq) { ?>
					    	<div class="left_panel panel full_bleed" style="background-image: url('<?php echo $banner_home_img_izq; ?>');">
						    	<a class="link" href="<?php echo $banner_home_link_izq; ?>"></a>
					    	</div>
					    <?php } else { ?>
					    	<div class="left_panel panel full_bleed" style="background-image: url('<?php echo $banner_home_img_izq; ?>');"></div>
					    <?php } ?>
					
					</div>
					
					<div class="slide">
					    
					    <?php if ($banner_home_link_der) { ?>
					    	<div class="right_panel panel full_bleed" style="background-image: url('<?php echo $banner_home_img_der; ?>');">
						    	<a class="link" href="<?php echo $banner_home_link_der; ?>"></a>
					    	</div>
					    <?php } else { ?>
					    	<div class="right_panel panel full_bleed" style="background-image: url('<?php echo $banner_home_img_der; ?>');"></div>
					    <?php } ?>
					    
				    </div>
					
				<?php } ?>	
				
			</div>
				
		<?php } ?>
		
		<div class="full_screen_section footerHolder fp-auto-height">
		</div>
		
	</div>
	
	
	<div class="full_screen_navigation_holder down_arrow"><div class="full_screen_navigation_inner"><a id="down_fs_button" href="#" target="_self"><i class="fa fa-angle-down" aria-hidden="true"></i></a></div></div>
		
	<?php
	return ob_get_clean();
}
//add_shortcode( 'lookbook_slider', 'lookbook_slider' );