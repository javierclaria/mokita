<?php

$args = array( 'post_type' => 'project', 'posts_per_page' => 2 );

$myposts = get_posts( $args );
//if (count($myposts)>=2) {
	foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		<div class="project-submenu">
			<a href="<?php the_permalink(); ?>">
				<?php 
					$imagen_submenu = get_field('imagen_submenu');
					echo '<img src="' . $imagen_submenu['sizes']['project-image-submenu'] . '" alt="" />';
				?>
				<div class="tit">
					<?php the_title(); ?>
				</div>
			</a>
		</div>
	<?php endforeach; 
	wp_reset_postdata();
//}
?>