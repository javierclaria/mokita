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

<div class="owl-carousel owl-theme">
            <div class="item">
              <h4>1</h4>
            </div>

            <div class="item">
              <h4>2</h4>
            </div>

            <div class="item">
              <h4>3</h4>
            </div>
</div>


<script>
    jQuery(document).ready(function(){
        jQuery('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        })
    });
</script>
</div>