<?php
/* Template Name: Template - Services*/
get_header(); ?>

<section class="header-img header-image--service header_img--internal">
    <?php echo do_shortcode('[banner_responsive]'); ?>
</section>
<!-- SERVICES DESCRIPTION -->
<section class="services-service">
    <h2>
        <?php
            $title = get_field('titulo_products');
            $title_array = explode('/', $title);
            $first_word = $title_array[0];
            $second_word = $title_array[1];
        ?>
        <p><?php echo $first_word; ?></p>
        <strong><?php echo $second_word; ?></strong>
    </h2>
    <article class="about-content">
        <p>
            <?php the_field('texto_products') ?>
        </p>
    </article>
</section>

<!-- SERVICE Service 1 -->
<?php
    $args = array( 
        'post_type' => 'service', 
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );
    $wp_query = new WP_Query($args); ?>
<?php if($wp_query->have_posts()) : $a = 0 ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); $a++ ?>
<section class="service-item" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
    <figure>
        <img src="<?php the_field('image_medium_service') ?>" alt="<?php the_title(); ?>">
    </figure>
    <article class="service-item__info">
        <h2>
            <p><?php _e('Services','allbayarea')  ?></p>
            <strong><?php the_title(); ?></strong>
        </h2> <?php the_content(); ?> </p>
        <a href="#" class="btn btn--yellow"><?php _e('Contact Us','allbayarea')  ?></a>
    </article>
</section>
<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>

<?php get_footer(); ?>