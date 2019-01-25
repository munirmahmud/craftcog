<div class="row">
    <?php
    if($tp_query->have_posts()):
        while ($tp_query->have_posts()) :
            $tp_query->the_post();
            $tp_product = wc_get_product(get_the_id());
            $img_link = tp_img_resize( get_post_thumbnail_id(), 270, 326,true );
            ?>
            <?php if ( $items_in_row == 'item1' ) : ?>
            <div class="col-md-12">
            <?php elseif ( $items_in_row == 'item2' ) : ?>
                <div class="col-lg-6 col-sm-6">
            <?php elseif ( $items_in_row == 'item3' ) : ?>
                <div class="col-lg-4 col-sm-4">
            <?php elseif ( $items_in_row == 'item4' ) : ?>

            <div class="col-lg-3 col-sm-3">
                <?php endif; ?>
                <div class="product-wrapper not-shop mb-45">
                    <div class="product-img">
                        <a href="<?php echo esc_url(get_the_permalink()) ?>">
                            <img src="<?php echo esc_url($img_link); ?>" alt="<?php echo get_the_title(); ?>">
                        </a>
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
                                if ( $product->is_type( 'external' ) ||  $product->is_type( 'variable' ) || $product->is_type( 'grouped' ) ) {
                                    echo '<a href="'. get_the_permalink() .'" title="Visit Product Page"><i class="fa fa-eye"></i></a>';
                                } elseif ( $product->is_type( 'simple' ) ) {
                                    woocommerce_template_loop_add_to_cart();
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="product-content text-center">
                        <h4><a href="<?php echo esc_url(get_the_permalink()) ?>"><?php echo get_the_title(); ?></a></h4>

                        <?php woocommerce_template_loop_rating(); ?>

                        <div class="product-price">
                            <?php woocommerce_template_loop_price(); ?>
                        </div>
                    </div>
                </div>
            </div>


            <?php
            /*
             * Product Popup box
             * */
            do_action( 'craftcog_wc_popup_item' ); ?>

        <?php
        endwhile;
    endif;
    wp_reset_postdata();
    ?>

</div>



