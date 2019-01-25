<?php
$query = array(
'post_type'      => 'service',
'post_status'    => 'publish',
'posts_per_page' => $post_count,
);

$tp_query = new \WP_Query($query); ?>

<div class="row service-wrapper">

    <?php
    if($tp_query->have_posts()):
        while ($tp_query->have_posts()) :
            $tp_query->the_post();
            ?>
            <div class="col-md-4 text-center">
                <div class="tw-service-box">
                    <div class="service-icon service-icon-bg d-table">
                        <div class="service-icon-inner d-table-cell">
                            <?php
                            if( has_post_thumbnail() ) :
                                the_post_thumbnail();
                            endif;
                            ?>
                        </div>
                    </div>
                    <!-- Service icon end -->
                    <div class="service-content">
                        <h3><?php the_title(); ?></h3>
                        <p><?php geobin_excerpt(10); ?></p>
                        <a href="<?php the_permalink(); ?>" class="tw-readmore"><?php echo esc_html_e( 'Read More', 'craftcog' ) ?>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <!-- Service Content end -->
                </div>
                <!-- Service box end -->
            </div>
        <?php endwhile; endif; ?>
    <!-- Col End -->
</div>

<?php wp_reset_postdata();