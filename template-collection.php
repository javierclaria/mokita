<?php
/**
 * Template Name: Collection
 */

get_header(); ?>


<?php while ( have_posts() ) : the_post();

	do_action( 'storefront_page_before' ); ?>
	
	<div class="full_screen_inner">

		<?php if( have_rows('galeria_fullwidth') ){ ?>
			
			<div class="full_screen_section" >
			
				<?php while( have_rows('galeria_fullwidth') ){ the_row();
			
					$galeria_fullwidth_img = get_sub_field('galeria_fullwidth_img'); ?>
						
					<div class="slide">
					    
					    <div class="left_panel panel full_bleed" style="background-image: url('<?php echo $galeria_fullwidth_img; ?>');"></div>
					    
				    </div>
					
				<?php } ?>	
				
			</div>
				
		<?php } ?>
		
		<div class="full_screen_section footerHolder fp-auto-height">
		</div>
		
	</div>
	
	
	<div class="full_screen_navigation_holder down_arrow"><div class="full_screen_navigation_inner"><a id="down_fs_button" href="#" target="_self"><i class="fa fa-angle-down" aria-hidden="true"></i></a></div></div>
	
	
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


<?php get_template_part('footer','content'); ?>

</div><!-- .col-full -->
</div><!-- #content -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>