<?php
/**
* Template Name: New HomePage
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header(); 
do_action('mokita_fullimage_header'); ?>

	<div class="full-image-mokita-header" style="background-image: url('https://mokita.com.ar/wp-content/uploads/2022/03/portada_image.jpg');">
		<div class="title_header"> 
            Colección 2022<br>
            OTOÑO/INVIERNO<br>
        </div>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main homepage" role="main">
            <!-- New In -->
            <section id="newin-homepage">
                <div class="imagen_homepage_left scrollFade">
                <a href="https://mokita.com.ar/categoria-producto/newin-ss2022/" class="fix-style">
                    <img src="https://mokita.com.ar/wp-content/uploads/2022/03/newin.jpg" alt="" srcset="" class="lozad">
                </a>
                </div>
                <div class="text_homepage_right">
                    <div>
                        <h2>New In</h2>
                        <p>Aca vas a encontrar todas las novedades! Nos restockeamos todas las semanas, si la prenda que buscas no esta disponible en el talle o tono que necesitas, escribinos y te avisamos cuando ingresa!</p>
                        <a href="https://mokita.com.ar/categoria-producto/newin-ss2022/">VER MÁS</a>
                    </div>
                </div>
            </section>

            <!-- Sweaters y Buzos -->
            <section id="sweaters-homepage" class="reverse">
            <div class="imagen_homepage_left">

            <div class="container__txt__homepage">
                    <h2>Sweaters &<br> Buzos</h2>
                    <p>Amamos los tejidos! Desde opciones livianas a super calentitas... Tambien para las que buscan abrigarse en modo #comfy, los buzos mas lindos!</p>
                        <div class="btn_grid">
                            <a href="https://mokita.com.ar/tienda/sweaters/" >VER MÁS</a>
                        </div>
                    </div> 
                 </div>
                <div class="text_homepage_right scrollFade">
                <a href="https://mokita.com.ar/tienda/sweaters/" class="fix-style" >
                <img src="https://mokita.com.ar/wp-content/uploads/2022/03/sweaters_img.jpg" alt="" srcset="" class="lozad">
                </a>
                </div>
            </section>

            <!-- Camisacos -->
            <section id="camisacos-homepage">
            <div class="imagen_homepage_left scrollFade">
                <a href="https://mokita.com.ar/tienda/camisas/" class="fix-style">
                    <img src="https://mokita.com.ar/wp-content/uploads/2022/03/camisacos_img.jpg" alt="" srcset="" class="lozad">
                </a>
                </div>
                <div class="text_homepage_right">
                    <div>
                    <h2>Camisas & Camisacos</h2>
                    <p>Los mas elegidos para cuando empieza a estar fresquito! Camisas para combinar con todo, y los camisacos que son TODO!</p>
                    <a href="https://mokita.com.ar/tienda/camisas/">VER MÁS</a>
                    </div>
                </div>
            </section>

            <!-- Ruanas -->
            <section id="ruanas-homepage">
                <div class="imagen_homepage_left">
                <div class="container__txt__homepage">
                    <h2>Ruanas</h2>
                        <p>Un accesorio que no puede faltar y siempre suma a tu look! Tan suavecitas y en unas combinaciones que nos tienen enamoradas...</p>
                        <div class="btn_grid">
                        <a href="http://" target="_blank" rel="noopener noreferrer">VER MÁS</a>
                        </div>
                    </div>
                </div>
                <div class="text_homepage_right scrollFade">
                <img src="https://mokita.com.ar/wp-content/uploads/2022/03/ruanas_img.jpg" alt="" srcset="" class="lozad">
                </div>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
?>
