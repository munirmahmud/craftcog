<div class="wrap-sidebar">
    <div class="sidebar-cart-all">
        <div class="sidebar-cart-icon">
            <button class="op-sidebar-close"><span class="ti-close"></span></button>
        </div>
        <div class="cart-content">
            <h3><?php echo esc_html__( 'Shopping Cart', 'craftcog' ); ?></h3>

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
                                <?php echo $thumbnail . $product_name . '&nbsp;'; ?>
                            <?php else : ?>

                            <div class="cart-img">
                                <a href="<?php echo esc_url( $product_permalink ); ?>">
                                    <?php echo $thumbnail; ?>
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
                        <h4><?php echo esc_html__( 'Total', 'craftcog' ); ?> : <span><?php echo $woocommerce->cart->get_cart_total(); ?></span></h4>
                    </div>
                </li>
            </ul>
            <div class="cart-checkout-btn">
                <a class="btn-style cart-btn-style" href="<?php echo wc_get_cart_url(); ?>"><?php echo esc_html__( 'view cart', 'craftcog' ); ?></span></a>
                <a class="no-mrg btn-style cart-btn-style" href="<?php echo wc_get_checkout_url(); ?>"><span><?php echo esc_html__( 'checkout', 'craftcog' ); ?></span></a>
            </div>
        </div>
    </div>
</div>