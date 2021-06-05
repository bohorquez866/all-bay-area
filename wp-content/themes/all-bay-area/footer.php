    </main>
    <footer class="footer">
        <div class="footer__wrapper">
            <figure class="logo">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <img src="<?php the_field('logo','options') ?>" alt="Logo">
                </a>
            </figure>


            <div class="footer__links">
                <?php wp_nav_menu( array(
                        'theme_location' => 'header-menu',
                        'container' => false,
                    ));
                ?>
            </div>

            <ul class="footer__contact">
                <li class="footer-title-1">
                    <?php the_field('titulo_contactenos','options') ?>
                </li>
                <li>
                    <a href="tel:<?php the_field( 'telefono','options'); ?>">
                        <em><?php the_field( 'titulo_telefono','options'); ?>:</em>
                        <?php the_field( 'telefono','options'); ?>
                    </a>
                </li>

                <li>

                    <a href="mailto:<?php the_field( 'email','options'); ?>">
                        <em><?php the_field( 'titulo_email','options'); ?>:</em> <?php the_field( 'email','options'); ?>
                    </a>
                </li>

                <div class="social-footer">
                    <p><?php the_field( 'titulo_redes','options'); ?></p>
                    <?php if( have_rows('redes_sociales', 'options') ): ?>
                    <?php while( have_rows('redes_sociales', 'options') ): the_row(); ?>
                    <?php 
                        $name_select_sub_field = (get_sub_field_object('tipo_red_social','options'));
                        $name_sub_field = get_sub_field('tipo_red_social','options');
                        $label_select = ($name_select_sub_field['choices'][$name_sub_field]);
                    ?>
                    <?php if( get_sub_field('url_red_social', 'options') ) { ?>
                    <a class="icon-<?php the_sub_field( 'tipo_red_social','options' ); ?>"
                        href="<?php the_sub_field('url_red_social', 'options'); ?>" target="_blank" title="Coming Soon">
                    </a>
                    <?php } ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            </ul>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>



    </html>