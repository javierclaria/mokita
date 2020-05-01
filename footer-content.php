<?php do_action( 'storefront_before_footer' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="col-full">

		<?php
		/**
		 * Functions hooked in to storefront_footer action
		 *
		 * @hooked storefront_footer_widgets - 10
		 * @hooked storefront_credit         - 20
		 */
		do_action( 'storefront_footer' ); ?>


		<script>
			jQuery( document ).ready(function() {
				jQuery( ".icon_search_header_revolver" ).click(function() {

					if( jQuery(".site-search").hasClass("active") ){
						
						jQuery('.site-search').removeClass('active');
						jQuery('.site-header').removeClass('active');
						jQuery( ".site-search" ).css( "visibility", "hidden");
						jQuery( ".site-search" ).css( "opacity", "0");
					}

					else {
						jQuery(".site-header").addClass('active');
						jQuery(".site-search").addClass('active');
						jQuery( ".site-search" ).css( "visibility", "visible");
						jQuery( ".site-search" ).css( "opacity", "1");
					}

			});
		});

		</script>
	</div><!-- .col-full -->
</footer><!-- #colophon -->

<?php do_action( 'storefront_after_footer' ); ?>