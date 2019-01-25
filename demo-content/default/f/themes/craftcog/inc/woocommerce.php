<?php

// Hide trailing zeros on prices.
add_filter( 'woocommerce_price_trim_zeros', 'craftcog_wc_hide_trailing_zeros', 10, 1 );
function craftcog_wc_hide_trailing_zeros( $trim ) {
    return true;
}


/*
 * WooCommerce archive.php custom styles using hooks
 *
 * */
/*REMOVE BREADCRUMB*/
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


//REMOVE SIDEBAR FROM ARCHIVE.PHP
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

//REMOVE WOOCOMMERCE SHOP PRODUCT'S LINK OPEN & CLOSE
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

//Remove & Add WooCommerce Product Title
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );

//REMOVE WC RATING, PRICE, AND ADD PRODUCT TITLE & ADD TO CART
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );

//Disable WooCommerce default style
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


//WOOCOMMERCE CONTENT WRAPPER
add_action( 'woocommerce_before_main_content', 'craftcog_wc_output_content_wrapper', 10 );
function craftcog_wc_output_content_wrapper(){
    ?>
    <div class="shop-wrapper hm-3-padding pt-80 pb-80">
        <div class="container-fluid">
    <?php
}

//REMOVE WOOCOMMERCE CONTENT WRAPPER END
add_action( 'woocommerce_after_main_content', 'craftcog_wc_output_content_wrapper_end', 10 );
function craftcog_wc_output_content_wrapper_end(){
    ?>
    </div>
</div>
    <?php
}

//WRAPPER STARTS BEFORE SHOP LOOP
add_action( 'woocommerce_before_shop_loop', 'craftcog_wc_before_shop_loop', 30 );
function craftcog_wc_before_shop_loop(){
    ?>
<div class="grid-list-product-wrapper">
    <div class="product-grid product-view">

    <?php
}

//WRAPPER ENDS AFTER SHOP LOOP
add_action( 'woocommerce_after_shop_loop', 'craftcog_wc_after_shop_loop', 20 );
function craftcog_wc_after_shop_loop(){
    ?>

        <!-- WOOCOMMERCE PAGINATION-->
        <?php woocommerce_pagination(); ?>
    </div>
</div>
    <?php
}

/*
 * WOOCOMMERCE RESULT COUNT & CATALOG ORDERING
 * */
add_action( 'woocommerce_before_shop_loop', 'craftcog_wc_result_count', 20 );
function craftcog_wc_result_count(){
?>
    <div class="row">
        <div class="col-md-12">
            <div class="shop-topbar-wrapper">
                <div class="craftcog-result-count col-md-6 col-sm-6 col-xs-12">
                    <?php woocommerce_result_count(); ?>
                </div>

                <div class="product-filter col-md-6 col-sm-6 col-xs-12">
                    <?php woocommerce_catalog_ordering(); ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}


add_action( 'woocommerce_before_shop_loop_item', 'craftcog_wc_product_loop_item_wrapper', 10 );
function craftcog_wc_product_loop_item_wrapper(){
    echo '<div class="product-wrapper mb-35">';
}

add_action( 'woocommerce_after_shop_loop_item', 'craftcog_wc_product_loop_item_end', 10 );
function craftcog_wc_product_loop_item_end(){
    echo '</div>';
}


add_action( 'woocommerce_before_shop_loop_item_title', 'craftcog_wc_before_shop_loop_item_title', 10 );
function craftcog_wc_before_shop_loop_item_title(){
    ?>
    <div class="product-img">
        <a href="<?php echo get_the_permalink(); ?>">
            <?php woocommerce_template_loop_product_thumbnail(); ?>
        </a>

        <?php woocommerce_show_product_loop_sale_flash(); ?>

        <div class="product-action-3">
            <a class="action-plus-2" title="Quick View" data-toggle="modal" data-target="#cfraftcogProduct-<?php the_id(); ?>" href="#">
                <i class="ti-plus"></i> <?php echo esc_html__( 'Quick View', 'craftcog' ); ?>
            </a>
        </div>
    </div>
<?php
}


add_action( 'woocommerce_after_shop_loop_item_title', 'craftcog_wc_item_content' );
function craftcog_wc_item_content(){

    ?>

    <div class="product-content">
        <div class="product-title-wishlist">

            <?php echo '<h4><a href="'. get_the_permalink() .'">'. get_the_title() . '</a></h4>'; ?>
            <div class="product-wishlist-3">
                <?php
                    if ( shortcode_exists( 'ti_wishlists_addtowishlist' ) ) {
                        echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                    }
                ?>
            </div>
        </div>
        <div class="product-peice-addtocart">
            <div class="product-price">
                <?php woocommerce_template_loop_price(); ?>
            </div>
            <div class="product-add-cart">
                <?php woocommerce_template_loop_add_to_cart(); ?>
            </div>
        </div>
    </div>

<?php
}


/*
 * WOOCOMMERCE POPUP PRODUCT ITEM
 * */

add_action( 'craftcog_wc_popup_item', 'cractcog_wc_quick_view_item' );
function cractcog_wc_quick_view_item() {
    ?>
    <div class="modal fade" id="cfraftcogProduct-<?php the_id(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="ion-android-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="qwick-view-left">
                        <div class="quick-view-learg-img">
                            <div class="quick-view-tab-content tab-content">
                                <?php woocommerce_template_loop_product_thumbnail(); ?>
                            </div>
                        </div>
                    </div>

                    <div class="qwick-view-right">
                        <div class="qwick-view-content">
                            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>

                            <?php woocommerce_template_loop_price(); ?>

                            <?php woocommerce_template_loop_rating(); ?>

                            <p><?php craftcog_excerpt(22); ?></p>

                            <div class="quickview-plus-minus">
                                <div class="quickview-btn-cart">
                                    <?php woocommerce_template_loop_add_to_cart(); ?>
                                </div>
                                <div class="quickview-btn-wishlist">
                                    <?php
                                    if ( shortcode_exists( 'ti_wishlists_addtowishlist' ) ) {
                                        echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}


/*
 * AJAXIFY WOOCOMMERCE ADD TO CART
 * */
add_filter( 'woocommerce_add_to_cart_fragments', 'tp_wc_add_to_cart_fragments' );
function tp_wc_add_to_cart_fragments( $fragments ){
    ob_start();
    ?>
    <span class="count-style"><?php echo WC()->cart->get_cart_contents_count(); ?></span>


<?php

    $fragments['span.count-style'] = ob_get_clean();

    return $fragments;
}


//ADD MINI CART
add_filter( 'woocommerce_add_to_cart_fragments', 'tp_wc_minicart_fragments' );
function tp_wc_minicart_fragments( $minicart ){
    ob_start();
    ?>
    <ul class="tp-mini-cart">
        <?php
        if ( ! WC()->cart->is_empty() ) :

            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                    $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                    $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                    ?>
                    <li class="single-product-cart <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                        <?php if ( empty( $product_permalink ) ) : ?>
                            <?php //echo $thumbnail . $product_name . '&nbsp;'; ?>
                        <?php else : ?>

                            <div class="cart-img">
                                <a href="<?php echo esc_url( $product_permalink ); ?>">
                                    <?php woocommerce_cart_item_thumbnail(); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="cart-title">
                            <h3><a href="<?php echo esc_url( $product_permalink ); ?>"> <?php echo esc_html( $product_name ); ?></a></h3>
                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span>' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                        </div>

                        <div class="cart-delete">
                            <?php
                            echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                '<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="ti-trash"></i></a>',
                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                __( 'Remove this item', 'craftcog' ),
                                esc_attr( $product_id ),
                                esc_attr( $cart_item_key ),
                                esc_attr( $_product->get_sku() )
                            ), $cart_item_key );
                            ?>
                        </div>

                        <?php echo wc_get_formatted_cart_item_data( $cart_item ); ?>
                    </li>
                    <?php
                }
            }

        else :
            echo esc_html__( 'No products found. Please go to', 'craftcog' ) . '<a href="'. get_permalink( wc_get_page_id( 'shop' ) ) .'">'. esc_html__( 'shop page', 'craftcog' ) . '</a>' . esc_html( 'to buy', 'craftcog' );
        endif;

        global $woocommerce;
        ?>

        <li class="single-product-cart">
            <div class="cart-total">
                <h4><?php echo esc_html__( 'Total', 'craftcog' ); ?> : <span><?php echo esc_html__( $woocommerce->cart->get_cart_total() ); ?></span></h4>
            </div>
        </li>
    </ul>
<?php

    $minicart['ul.tp-mini-cart'] = ob_get_clean();

    return $minicart;
}


if ( function_exists( 'tp_add_to_cart_variations' ) ) :
    function tp_add_to_cart_variations() {
    global $product;

        if ( $product->is_type( 'external' ) ) {
            ?>
            <div class="product-action">
                <div class="product-action-style">
                    <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#cfraftcogProduct-<?php the_id(); ?>" href="#">
                        <i class="ti-plus"></i>
                    </a>
                    <?php
                    if ( shortcode_exists( 'ti_wishlists_addtowishlist' ) ) {
                        echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                    }
                    ?>

                    <?php
                    global $product;
                    if ( $product->is_type( 'external' ) ) {
                        echo esc_html__( 'Click Here', 'craftcog' );
                    } else {
                        woocommerce_template_loop_add_to_cart();
                    }
                    ?>
                </div>
            </div>
            <?php
        } else { ?>
            <div class="product-action">
                <div class="product-action-style">
                    <a class="action-plus" title="Quick View" data-toggle="modal" data-target="#cfraftcogProduct-<?php the_id(); ?>" href="#">
                        <i class="ti-plus"></i>
                    </a>
                    <?php
                    if ( shortcode_exists( 'ti_wishlists_addtowishlist' ) ) {
                        echo do_shortcode( '[ti_wishlists_addtowishlist]' );
                    }
                    ?>

                    <?php
                    global $product;
                    if ( $product->is_type( 'external' ) ) {
                        echo esc_html__( 'Click Here', 'craftcog' );
                    } else {
                        woocommerce_template_loop_add_to_cart();
                    }
                    ?>
                </div>
            </div>
        <?php
        }
    }
endif;