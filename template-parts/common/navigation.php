<a class="header__toggle-menu" href="#0" title="Menu"><span><?php _e('Menu', 'philosophy-theme'); ?></span></a>

<nav class="header__nav-wrap">

	<h2 class="header__nav-heading h6"><?php _e('Site Navigation', 'philosophy-theme') ?></h2>

    <?php wp_nav_menu(
            array(
                'theme_location' => 'philosophy_top_menu',
                'menu_class' => 'header__nav',
                'menu_id' => 'philosophy_top_menu'
            )
    ) ?>

	<a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu"><?php _e('Close', 'philosophy-theme') ?></a>

</nav> <!-- end header__nav-wrap -->


