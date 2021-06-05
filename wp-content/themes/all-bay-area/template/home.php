<?php
/* Template Name: Template - Home*/
get_header(); ?>
<section class="header-img">
    <figure class="logo">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <img src="<?php the_field('logo','options') ?>" alt="Logo">
        </a>
    </figure>
    <figure class="hero-img">
        <img src="<?php the_field('imagen_fondo_inicio') ?>" alt="<?php the_field('titulo_banner_inicio') ?>">
    </figure>
    <article class="hero-info">
        <h1><?php the_field('titulo_banner_inicio') ?></h1>
        <p><?php the_field('texto_banner_inicio') ?></p>
        <span class="btn btn--book btn--yellow responsive"><?php the_field('label_banner_inicio') ?></span>
    </article>

    <div class="botones_banner">
        <span class="btn--book"><?php the_field('label_banner_inicio') ?></span>
        <span class="btn--location"><?php the_field('label_dos_banner_inicio') ?> <i class="icon-cross"></i></span>
    </div>
</section>

<!-- ABOUT -->
<section class="home-about">
    <figure class="home-about__img">
        <img src="<?php the_field('imagen_about') ?>" alt="About Us">
    </figure>
    <article class="about-content">

        <?php echo do_shortcode('[title_about]'); ?>

        <a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>"
            class="btn btn--yellow"><?php the_field('label_about_inicio') ?></a>
    </article>
</section>
<!-- Values -->
<section class="home-value home-value-slider">
    <?php echo do_shortcode('[title_values]'); ?>
    <div class="swiper-wrapper">
        <?php if( have_rows('lista_values') ): $a = 0  ?>
        <?php while( have_rows('lista_values') ): the_row(); $a++ ?>
        <article class="home-value__item swiper-slide">
            <figure class="value-img">
                <img src="<?php the_sub_field('lista_values_imagen') ?>"
                    alt="<?php the_sub_field('lista_values_titulo') ?>">
            </figure>
            <h3><?php the_sub_field('lista_values_titulo') ?></h3>
            <p><?php the_sub_field('lista_values_texto') ?></p>
            <a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>" class="read-more"><i class="icon-cross"></i>
                <?php _e('Read More','allbayarea')  ?></a>
        </article>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<!-- HOW WE WORK -->
<?php echo do_shortcode('[banner_work]'); ?>
<!-- Services Home -->
<section class="home-services">
    <h2>
        <?php
            $title = get_field('titulo_services_inicio');
            $title_array = explode('/', $title);
            $first_word = $title_array[0];
            $second_word = $title_array[1];
        ?>
        <p><?php echo $first_word; ?></p>
        <strong><?php echo $second_word; ?></strong>
    </h2>

    <p>
        <?php the_field('texto_services_inicio','options'); ?>
    </p>
    <article class="home-services__item">
        <div class="swiper-pagination"></div>
        <ul class="swiper-wrapper">
            <?php
                $args = array( 
                    'post_type' => 'service', 
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                );
                $wp_query = new WP_Query($args); ?>
            <?php if($wp_query->have_posts()) : $a = 0 ?>
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); $a++ ?>
            <li class="swiper-slide">
                <img src="<?php the_field('image_home_service'); ?>" alt="<?php the_title(); ?>">
                <h3><?php the_field('categoria_service'); ?></h3>
                <p><?php the_excerpt_max_charlength(60); ?></p>
                <a href="<?php echo esc_url( home_url( '/services' ) ); ?>" class="read-more"><i class="icon-cross"></i>
                    <?php _e('Read More','allbayarea')  ?></a>
            </li>
            <?php endwhile; ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
        </ul>
    </article>
</section>

<!-- type of work Home -->
<section class="home-types">
    <h2>
        <?php
            $title = get_field('titulo_how_we_work_inicio');
            $title_array = explode('/', $title);
            $first_word = $title_array[0];
            $second_word = $title_array[1];
        ?>
        <p><?php echo $first_word; ?></p>
        <strong><?php echo $second_word; ?></strong>
    </h2>
    <p><?php the_field('texto_how_we_work_inicio'); ?></p>

    <article class="home-types__item">
        <div class="swiper-pagination"></div>
        <div class="swiper-wrapper">
            <?php if( have_rows('lista_how_we_work_inicio') ): $c = 0  ?>
            <?php while( have_rows('lista_how_we_work_inicio') ): the_row(); $c++ ?>
            <div class="swiper-slide">
                <?php the_sub_field('editor_lista_how_we_work_inicio'); ?>
            </div>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </article>

    <div class="home-types__footer">
        <?php
            $title = get_field('sub_titulo_how_we_work_inicio');
            $title_array = explode('/', $title);
            $first_word = $title_array[0];
            $second_word = $title_array[1];
        ?>
        <strong><?php echo $first_word; ?></strong>
        <p><?php echo $second_word; ?></p>
    </div>

    <a href="#" class="read-more"><?php the_field('label_how_we_work_inicio'); ?></a>
</section>

<!-- Testimonies -->
<section class="home-testimonies" style="background-image: url(<?php the_field('background_comments_inicio'); ?>)">
    <h2>
        <?php
            $title = get_field('titulo_comments_inicio');
            $title_array = explode('/', $title);
            $first_word = $title_array[0];
            $second_word = $title_array[1];
        ?>
        <p><?php echo $first_word; ?></p>
        <strong><?php echo $second_word; ?></strong>
    </h2>
    <article class=" home-testimonies__item">
        <div class="swiper-pagination"></div>
        <ul class="swiper-wrapper">
            <?php if( have_rows('lista_comments_inicio') ): $d = 0  ?>
            <?php while( have_rows('lista_comments_inicio') ): the_row(); $d++ ?>
            <li class="swiper-slide">
                <figure>
                    <img src="<?php the_sub_field('imagen_lista_comments_inicio'); ?>"
                        alt="<?php the_sub_field('nombre_lista_comments_inicio'); ?>">
                </figure>
                <p><?php the_sub_field('texto_lista_comments_inicio'); ?></p>
                <strong> - <?php the_sub_field('nombre_lista_comments_inicio'); ?> </strong>
            </li>
            <?php endwhile; ?>
            <?php endif; ?>
        </ul>
    </article>
</section>

<!-- HOME CONTACT -->
<section class="home-contact">
    <article class="home-contact__info">
        <h2>
            <?php
                $title = get_field('titulo_contactenos','options');
                $title_array = explode('/', $title);
                $first_word = $title_array[0];
                $second_word = $title_array[1];
            ?>
            <p><?php echo $first_word; ?></p>
            <strong><?php echo $second_word; ?></strong>
        </h2>
        <p><?php the_field('texto_contactenos','options'); ?></p>
    </article>
    <div class="home-contact__form">
        <?php
            $post_object = get_field('formulario_contactenos','options');
            if( $post_object ): 
                $post = $post_object;
                setup_postdata( $post ); 
                $cf7_id = $p->ID;
                echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
                wp_reset_query();
            endif;
        ?>
    </div>
</section>

<?php get_footer(); ?>