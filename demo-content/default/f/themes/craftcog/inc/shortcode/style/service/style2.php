<div class="row">
<div class="col-lg-3 col-md-12">
    <div class="section-heading">
        <?php if(!empty($title) ) : ?>
        <h2>
            <?php
            echo geobin_kses(sprintf($title, '<span>', '</span>' ) );
            ?>
        </h2>
        <?php endif; ?>
        <span class="animate-border tw-mt-30 tw-mb-40"></span>
        <?php if(!empty($title_desc) ) : ?>
        <p><?php echo esc_html($title_desc); ?> </p>
        <?php endif; ?>
    </div>
</div>
<!-- Heading Col End -->

<?php
$query = array(
    'post_type'      => 'service',
    'post_status'    => 'publish',
    'posts_per_page' => -1,
);

$tp_query = new \WP_Query($query); ?>

<div class="col-lg-9 col-md-12">
    <div class="service-list-carousel owl-carousel">

        <?php
            if($tp_query->have_posts()):
            while ($tp_query->have_posts()) :
            $tp_query->the_post();
        ?>

        <div class="tw-service-box-list text-center">
            <div class="service-list-bg service-list-bg-1 d-table">
                <div class="service-list-icon d-table-cell">
                    <?php the_post_thumbnail( array( 'class' => 'img-fluid', 64, 72 ) ); ?>
                </div>
            </div>
            <!-- List Bg End -->
            <h3><?php the_title(); ?></h3>
            <p><?php geobin_excerpt(10); ?></p>
        </div>
            <?php endwhile; endif; ?>
        <!-- List Box End -->

        <?php wp_reset_postdata(); ?>

    </div>
    <!-- Carousel End -->
</div>
<!-- Content Col end -->
</div>