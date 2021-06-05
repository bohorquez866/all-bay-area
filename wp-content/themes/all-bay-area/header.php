<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, , user-scalable=no">
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?></title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>




    <header>
        <div class="burger-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <nav>
            <?php wp_nav_menu( array(
                'theme_location' => 'header-menu',
                    'container' => false,
                    'menu_class' => 'header_menu'   
                ));
            ?>
        </nav>
        <!-- BURGER MENU -->
        <nav class="mobile-menu">
            <div class="burger-menu"> <img src="<?php echo get_stylesheet_directory_uri()?>/src/img/x.svg" alt=""></div>

            <div class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php the_field( 'logo', 'options' ); ?>" alt="Logo">
                </a>
            </div>
            <?php wp_nav_menu( array(
                    'theme_location' => 'header-menu',
                        'container' => false,
                        'menu_class' => 'navbar__list'
                    ));
                ?>
            <div class="footer responsive">
                <ul class="footer__contact responsive">
                    <h3>
                        <p>
                            <?php $title = get_field('titulo_contactenos', 'options');
                            $title_array = explode('/', $title);
                            $first_word = $title_array[0];
                            $second_word = $title_array[1];?>
                            <?php echo $first_word; ?>
                        </p>
                    </h3>
                    <li>
                        <p> <strong> </strong>
                            <a href="tel:<?php the_field('telefono','options'); ?>">
                                <?php the_field('titulo_telefono','options'); ?>
                                <?php the_field('telefono','options'); ?>
                            </a>
                        </p>
                        <p> <strong> </strong>
                            <a href="mailto:<?php the_field('email','options'); ?>">
                                <?php the_field('titulo_email','options'); ?> <?php the_field('email','options'); ?>
                            </a>
                        </p>
                    </li>
                    <div class="social-media-footer">
                        <?php echo do_shortcode('[social_media]'); ?>
                    </div>
                </ul>
            </div>
        </nav>


        <div class="header_social">
            <ul>
                <li>
                    <a class="icon-phone" href="tel:<?php the_field( 'telefono','options'); ?>"></a>
                </li>
                <li>
                    <a class="icon-mail" href="mailto:<?php the_field( 'email','options'); ?>"></a>
                </li>
                <?php echo do_shortcode('[social_media]'); ?>
            </ul>
            <span class="social_trash"><img src="<?php echo get_stylesheet_directory_uri()?>/src/img/trash.svg"
                    alt=""></span>
        </div>
    </header>
    <div class="section_appoinment">


        <span class="close-appointment">
            <img src="<?php echo get_stylesheet_directory_uri()?>/src/img/x.svg" alt="">
        </span>


        <div class="section_appoinment_ctn">
            <div class="section_appoinment_info">
                <h3><?php the_field( 'titulo_appoinment','options'); ?></h3>
                <p><?php the_field( 'texto_appoinment','options'); ?></p>
                <ul>
                    <li>
                        <a
                            href="mailto:<?php the_field( 'email','options'); ?>"><?php the_field( 'email','options'); ?></a>
                    </li>
                    <li>
                        <a
                            href="tel:<?php the_field( 'telefono','options'); ?>"><?php the_field( 'telefono','options'); ?></a>
                    </li>
                </ul>
            </div>



            <div class="section_appoinment_form">
                <?php
                    $post_object = get_field('formulario_appoinment','options');
                    if( $post_object ): 
                        $post = $post_object;
                        setup_postdata( $post ); 
                        $cf7_id = $p->ID;
                        echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
                        wp_reset_query();
                    endif;
                ?>
            </div>
        </div>
    </div>

    <main class="main_site">
        <section class="location">
            <span class="close-location"><img src="<?php echo get_stylesheet_directory_uri()?>/src/img/x.svg"
                    alt=""></span>

            <h2><?php the_field( 'texto_places','options'); ?></h2>
            <ul>
                <p>
                    <?php if( have_rows('lista_places','options') ): $a = 0  ?>
                    <?php while( have_rows('lista_places','options') ): the_row(); $a++ ?>
                    - <?php the_sub_field( 'lista_place','options'); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </p>
            </ul>
        </section>
        <section class="booking">
            <span class="close-booking"><img src="<?php echo get_stylesheet_directory_uri()?>/src/img/x.svg"
                    alt=""></span>
            <h2>
                <?php
                    $title = get_field('titulo_booking_general','options');
                    $title_array = explode('/', $title);
                    $first_word = $title_array[0];
                    $second_word = $title_array[1];
                ?>
                <p><?php echo $first_word; ?></p>
                <strong><?php echo $second_word; ?></strong>
            </h2>

            <p><?php the_field( 'texto_booking_general','options'); ?></p>

            <form class="booking_form">
                <legend><?php the_field( 'texto_2_booking_general','options'); ?></legend>
                <?php
                    $args = array( 
                        'post_type' => 'product', 
                        'post_status' => 'publish',
                        'posts_per_page' => 3,
                    );
                    $post_id = $atts['id'];
                    $product = wc_get_product( $post_id );
                    $wp_query = new WP_Query($args); ?>
                <?php if($wp_query->have_posts()) : $a = 0 ?>
                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); $a++ ?>
                <div>
                    <?php  global $product; echo apply_filters(
                                'woocommerce_loop_add_to_cart_link',
                                sprintf(
                                    '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="button %s product_type_%s">%s</a>',
                                    esc_url( $product->add_to_cart_url() ),
                                    esc_attr( $product->get_id() ),
                                    esc_attr( $product->get_sku() ),
                                    $product->is_purchasable() ? 'add_to_cart_button' : '',
                                    esc_attr( $product->product_type ),
                                    esc_html( $product->get_title() )
                                ),
                                $product
                            );?>
                    <em>
                        <?php
                                global $product;
                                if ( $product->price > 0 ) {
                                    if ( $product->price and $product->sale_price ) {
                                    $from = $product->regular_price;
                                    $to = $product->price;
                                    echo '<span class="price_one">'.( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) .'</span>
                                    <span class="price_two">'. ( ( is_numeric( $from ) ) ? woocommerce_price( $from ) : $from ) .' </span>';
                                    } else {
                                    $to = $product->price;
                                    echo '<span class="price_one">' . ( ( is_numeric( $to ) ) ? woocommerce_price( $to ) : $to ) . '</span>';
                                    }
                                }
                            ?>
                    </em>
                </div>
                <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
                <a href="<?php echo wc_get_cart_url() ?>" class="btn btn--yellow">
                    <?php _e('View Cart','allbayarea')?>
                </a>
            </form>
        </section>
        <?php if (is_cart() || is_checkout()): ?>
            <section class="header-img">
                <figure class="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php the_field('logo','options') ?>" alt="Logo">
                    </a>
                </figure>
                <figure class="hero-img">
                    <img src="<?php the_field('banner_shop_general','options') ?>" alt="<?php the_title(); ?>">
                </figure>
            </section>
        <?php endif; ?>