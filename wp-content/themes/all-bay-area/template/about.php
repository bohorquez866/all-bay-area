<?php
/* Template Name: Template - about*/
get_header(); ?>
<section class="header-img header_img--internal">
    <?php echo do_shortcode('[banner_responsive]'); ?>
</section>
<!-- aboUT info -->
<section class="home-about about-head">
    <figure class="about-head__photo">
        <img src="<?php the_field('imagen_about') ?>" alt="About Us">
    </figure>
    <article class="about-content">
        <?php echo do_shortcode('[title_about]'); ?>
    </article>
</section>
<!-- ABOUT VALUE -->
<section class="home-value about-value">
    <?php echo do_shortcode('[title_values]'); ?>
    <div class="swiper-pagination"></div>
    <div class="swiper-wrapper">
        <?php if( have_rows('lista_values') ): $a = 0  ?>
        <?php while( have_rows('lista_values') ): the_row(); $a++ ?>
            <article class="home-value__item swiper-slide">
                <figure class="value-img">
                    <img src="<?php the_sub_field('lista_values_imagen') ?>" alt="Value">
                </figure>
                <p><?php the_sub_field('lista_values_texto') ?></p>
            </article>
        <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<!-- HOW WE WORK -->
<?php echo do_shortcode('[banner_work]'); ?>
<!-- Contact MEthod -->
<section class="home-about contact-about">
    <figure class="hero-img">
        <img src="<?php the_sub_field('imagen_contact_method') ?>" alt="About Us">
    </figure>
    <div class="about-content">
        <h2>
            <?php
                $title = get_field('titulo_contact_method');
                $title_array = explode('/', $title);
                $first_word = $title_array[0];
                $second_word = $title_array[1];
            ?>
            <p><?php echo $first_word; ?></p>
            <strong><?php echo $second_word; ?></strong>
        </h2>
        <article class="about-content">
            <p><?php the_field('texto_contact_method') ?></p>
        </article>
        <a href="#" class="btn btn--yellow"><?php the_field('label_contact_method') ?></a>
    </div>
</section>

<?php get_footer(); ?>