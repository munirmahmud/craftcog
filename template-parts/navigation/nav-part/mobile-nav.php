<?php
if( has_nav_menu( 'mobile-menu') ) {
    wp_nav_menu(
        array(
            'theme_location'        => 'mobile-menu',
            'container'             => 'nav',
            'container_id'          => 'mobile-menu-active',
            'container_class'       => 'mobile-menu',
            'menu_class'            => 'menu-overflow',
            'menu_id'               => 'mobile-menu',
            //'walker'             => new Custom_Nav_Walker(),
        )
    );
}