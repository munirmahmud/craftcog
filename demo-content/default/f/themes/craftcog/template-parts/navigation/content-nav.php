<?php
/*
 * This is for nav style
 *  */

$page_menu = '';
$logo = craftcog_get_image( 'main_logo', CRAFTCOG_IMAGES . '/logo.png' );

if( defined('FW')){
    $logo_img = fw_get_db_customizer_option('tp_theme_logo');

    $logo = (isset($logo_img['url']) && !empty($logo_img['url']) ? $logo_img['url'] : $logo);
}

if( is_home() || is_front_page() ){
    
} else {
    $page_menu = 'page-menu';
}

?>

<header>
    <div class="header-area transparent-bar <?php echo esc_html($page_menu); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-5 col-5">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
                    </div>

                    <div class="sticky-logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
                    </div>
                    <div class="logo-small-device">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"> <img src="<?php echo esc_url( $logo ) ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
                    </div>
                </div>
                
                <div class="col-lg-8 col-md-8 d-none d-md-block">
                    <div class="menu-wrapper">
                        <div class="main-menu">
                            <?php get_template_part( 'template-parts/navigation/nav-part/primary', 'nav' ); ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-7 col-7">
                    <div class="header-site-icon">
                        <div class="header-search same-style">
                            <button class="sidebar-trigger-search">
                                <span class="ti-search"></span>
                            </button>
                        </div>
                        <div class="header-cart same-style">
                            <button class="sidebar-trigger">
                                <i class="ti-shopping-cart"></i>
                                <span class="count-style"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mobile-menu-area col-12">
                    <div class="mobile-menu">
                        <?php get_template_part( 'template-parts/navigation/nav-part/mobile', 'nav' ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="sidebar-cart onepage-sidebar-area">
    <?php get_template_part( 'template-parts/navigation/nav-part/mini', 'shopping-cart' ); ?>
</div>

<div class="main-search-active">
    <?php get_template_part( 'template-parts/navigation/nav-part/nav', 'search' ); ?>
</div>
