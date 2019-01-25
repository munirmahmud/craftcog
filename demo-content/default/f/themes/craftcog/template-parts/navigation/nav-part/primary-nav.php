
<!-- The WordPress Menu goes here -->
<?php
$menu = '';
if( is_home() && ! is_front_page() ) {
    $menu = 'top-menu';
}

if( has_nav_menu( 'primary-menu') ) {
    wp_nav_menu(
        array(
            'theme_location'        => 'primary-menu',
            'container'             => 'nav',
            'container_id'          => '',
            'container_class'       => '',
            'menu_class'            => '' . $menu,
            'menu_id'               => 'main-menu',
            //'walker'             => new Custom_Nav_Walker(),
        )
    );
}

?>