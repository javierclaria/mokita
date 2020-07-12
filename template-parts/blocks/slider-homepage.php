<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Load values and assign defaults.
?>

<div class="owl-carousel">
  <div> Your Content 1</div>
  <div> Your Content 2</div>
  <div> Your Content 3</div>
  <div> Your Content 4</div>
  <div> Your Content 5</div>
  <div> Your Content 6</div>
  <div> Your Content 7</div>
</div>


<script>
    jQuery(document).ready(function(){
        jQuery(".owl-carousel").owlCarousel();
    });
</script>
</div>