<?php
  if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
      'page_title'    => 'Configuración General',
      'menu_title'    => 'Configuraciones',
      'menu_slug'     => 'theme-general-settings',
      'capability'    => 'edit_posts',
      'redirect'      => false,
      'position'      => '2.1',
      'icon_url'      => 'dashicons-admin-settings',
    ));
}
function register_my_menus() {
    register_nav_menus(
      array(
		    'header-menu' => __( 'Header Menu' ), 
        'social-menu' => __( 'Social Menu' )
     )
    );
}
add_action( 'init', 'register_my_menus' ); 

// add theme suppor post thumbnails
add_theme_support( 'post-thumbnails' );

// Support Titulos
add_theme_support( 'title-tag' );

// Remover Editor
function remove_editor() {
  remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_editor');

function scripts(){
  wp_register_style('style', get_stylesheet_directory_uri() . '/dist/scss/styles.css', [], 1, 'all'); 
  wp_enqueue_style('style');
  
}
add_action('wp_enqueue_scripts', 'scripts');
add_action('get_header', 'my_filter_head');
 
function add_this_script_footer(){
   //Swipper Js
   wp_register_script('swipper-js', get_stylesheet_directory_uri() . '/src/js/swiper.js');
   wp_enqueue_script('swipper-js');
   wp_register_script('app', get_stylesheet_directory_uri() . '/dist/js/app.js', 1, true);
   //uncompiled Script
  wp_register_script('script-js', get_stylesheet_directory_uri() . '/src/js/script.js');
   wp_enqueue_script('script-js');
   wp_enqueue_script('app');
}
add_action('wp_footer', 'add_this_script_footer');

function my_filter_head() {
   remove_action('wp_head', '_admin_bar_bump_cb');
} 
load_theme_textdomain('allbayarea', get_template_directory() . '/languages');

add_filter( 'wpcf7_autop_or_not', '__return_false' );
// social media header
function wp_custom_social_media($content = null) {
  ob_start(); ?>
<?php if( have_rows('redes_sociales', 'options') ): ?>
<?php while( have_rows('redes_sociales', 'options') ): the_row(); ?>
<?php 
              $name_select_sub_field = (get_sub_field_object('tipo_red_social','options'));
              $name_sub_field = get_sub_field('tipo_red_social','options');
              $label_select = ($name_select_sub_field['choices'][$name_sub_field]);
            ?>
<?php if( get_sub_field('url_red_social', 'options') ) { ?>
<li>
    <a class="icon-<?php the_sub_field( 'tipo_red_social','options' ); ?>"
        href="<?php the_sub_field('url_red_social', 'options'); ?>" target="_blank" title="Coming Soon"> </a>
</li>
<?php } ?>
<?php endwhile; ?>
<?php endif;
  $content = ob_get_contents();
  ob_end_clean();
  return $content;  
}
add_shortcode('social_media', 'wp_custom_social_media');

// Shortcode Banner
function wp_banner_responsive($content = null) {
	ob_start(); ?>
<figure class="logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php the_field('logo','options') ?>" alt="Logo">
    </a>
</figure>
<figure class="hero-img">
    <img src="<?php the_field('banner_general') ?>" alt="<?php the_title() ?>">
</figure>
<article class="hero-info">
    <strong><?php the_title() ?></strong>
    <h1><?php the_field('titulo_general') ?></h1>
    <?php if ( get_field( 'texto_general' ) ): ?>
    <p><?php the_field('texto_general') ?></p>
    <?php endif; ?>
</article>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('banner_responsive', 'wp_banner_responsive');

// Title Value
function wp_title_values($content = null) {
	ob_start(); ?>
<h2>
    <?php
            $title = get_field('titulo_values','options');
            $title_array = explode('/', $title);
            $first_word = $title_array[0];
            $second_word = $title_array[1];
        ?>
    <p><?php echo $first_word; ?></p>
    <strong><?php echo $second_word; ?></strong>
</h2>
<p><?php the_field('texto_values','options') ?></p>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('title_values', 'wp_title_values');

// Title About
function wp_title_about($content = null) {
	ob_start(); ?>
<h2>
    <?php
            $title = get_field('titulo_about_general','options');
            $title_array = explode('/', $title);
            $first_word = $title_array[0];
            $second_word = $title_array[1];
        ?>
    <p><?php echo $first_word; ?></p>
    <strong><?php echo $second_word; ?></strong>
</h2>
<?php the_field('editor_about') ?>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('title_about', 'wp_title_about');

// Banner How we work
function wp_banner_work($content = null) {
	ob_start(); ?>
<section class="home-work" style="background-image: url(<?php the_field('banner_how_we_work','options'); ?>);">
    <h2>
        <?php
                $title = get_field('titulo_how_we_work','options');
                $title_array = explode('/', $title);
                $first_word = $title_array[0];
                $second_word = $title_array[1];
            ?>
        <p><?php echo $first_word; ?></p>
        <strong><?php echo $second_word; ?></strong>
    </h2>
    <p><?php the_field('texto_how_we_work','options'); ?></p>
    <article class="home-work__item">
        <div class="swiper-pagination"></div>
        <ul class="swiper-wrapper">
            <?php if( have_rows('lista_how_we_work','options') ): $b = 0  ?>
            <?php while( have_rows('lista_how_we_work','options') ): the_row(); $b++ ?>
            <li class="swiper-slide">
                <strong class="number">0<?php echo $b; ?></strong>
                <h3><?php the_sub_field('titulo_lista_how_we_work','options'); ?></h3>
                <p><?php the_sub_field('texto_lista_how_we_work','options'); ?></p>
            </li>
            <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </article>
</section>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;  
}
add_shortcode('banner_work', 'wp_banner_work');
/*-----------------------------------
Select Services
-----------------------------------*/
function wp_select_place() {
    $output = "<select class='contact__input' name='select_place' id='select_place' onchange='document.getElementById(\"select_place\").value=this.value;'>";
    $output .= '<option value="" selected disabled hidden>' .'Town'. '</option>';
	if( have_rows('lista_places','options') ) {
        while( have_rows('lista_places','options') ) {
            the_row();
           
           $output .= '<option value="'.get_sub_field('lista_place','options').'">' .get_sub_field('lista_place','options'). '</option>';

        }
    }
	$output .= "</select>";
	return $output;
}
wpcf7_add_shortcode('select_place', 'wp_select_place', true);

function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;

	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
		if ( $excut < 0 ) {
			echo mb_substr( $subex, 0, $excut );
		} else {
			echo $subex;
		}
		echo '...';
	} else {
		echo $excerpt;
	}
}