<?php  if( is_array( $product_tab ) && count( $product_tab ) > 0 ) : ?>
    <?php $rand_id = 'tp-tabs-'.mt_rand(10000,99999).'-'; ?>
    <div class="product-tab-list text-center mb-60 nav product-menu-mrg" role="tablist">
        <?php foreach($product_tab as $key => $product_tabs): ?>
        <?php
        $active = ($key == 0) ? 'active' : '';
        ?>
        <a class="<?php echo esc_attr($active) ?>" href="#<?php echo esc_attr($rand_id.$key.'-'.sanitize_title($product_tabs['product_title'])); ?>" data-toggle="tab" role="tab" aria-selected="true" aria-controls="<?php echo esc_attr($rand_id.$key.'-'.sanitize_title($product_tabs['product_title'])); ?>">
        	<h4><?php echo esc_html($product_tabs['product_title']); ?> </h4>
    	</a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div class="tab-content">

    <?php if(is_array($product_tab) && count($product_tab) > 0): ?>
    <?php foreach($product_tab as $key => $tabs_content): ?>
        <?php
        $active = ($key == 0) ? 'show active' : '';
        $tabs_id = 'tp-tabs-'.$key;
        $args = array(
            'post_type'         => array('product'),
            'post_status'       => array('publish'),
            'posts_per_page'    => $product_count,
        );
        if($tabs_content['product_content'] == 'featured'){
            $args['tax_query'][] = array(
                'taxonomy'         => 'product_visibility',
                'terms'            => 'featured',
                'field'            => 'name',
                'operator'         => 'IN',
                'include_children' => false,
            );
        }
        elseif($tabs_content['product_content'] == 'related'){
            $args['post__in'] 	= 	$product->get_related(100);
        }
        elseif($tabs_content['product_content'] == 'best_sell'){
            $args['meta_key']  = 'total_sales';
            $args['orderby'] = 'meta_value_num';
        }
        elseif($tabs_content['product_content'] == 'on_sell'){
                $args['meta_query'] = array(
                    array(
                        'key' => '_sale_price',
                        'value' => '',
                        'compare' => '!='
                    ),
                );
        }elseif($tabs_content['product_content'] == 'xs_product'){
            if(!empty($tabs_content['product_content'] == 'xs_product')){
                $product_ids = implode(',',$tabs_content['product_ids']);
                $args['post__in'] = explode(',', $product_ids);
            }
        }
        $xs_query = new WP_Query( $args );
        ?>

    <div class="tab-pane <?php echo esc_attr($active) ?>" id="<?php echo esc_attr($rand_id.$key.'-'.sanitize_title($tabs_content['product_title'])); ?>" role="tabpanel">
        <div class="row">

        	<?php
                if($xs_query->have_posts()):
                    while ($xs_query->have_posts()) :
                        $xs_query->the_post();
                        $xs_product = wc_get_product(get_the_id());
                        $img_link = tp_img_resize( get_post_thumbnail_id(), 183, 150,true );
                ?>
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="product-wrapper mb-45">
                    <div class="product-img">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <?php woocommerce_template_loop_product_thumbnail(); ?>
                        </a>
                        <?php woocommerce_show_product_loop_sale_flash(); ?>

                        <?php ?>
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
                        <h4><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                        <div class="product-rating">
                            <?php woocommerce_template_loop_rating(); ?>
                        </div>
                        <div class="product-price">
                            <?php woocommerce_template_loop_price(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php cractcog_wc_quick_view_item(); ?>

			<?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>

        </div>
    </div>
    <!-- End .tab-pane -->
    <?php endforeach; ?>
    <?php endif; ?>

</div>