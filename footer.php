<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php get_template_part('footer','content'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

<?php
if ( is_cart() ) { ?>
	<script>

	jQuery(".shipping-calculator-button").text('Calcular envío');
	</script>
  
 <?php } ?>

</body>
</html>
