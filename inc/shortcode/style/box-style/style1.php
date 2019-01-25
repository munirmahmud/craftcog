<?php $alt = get_post_meta($image['id'], '_wp_attachment_image_alt', true); ?>

    <div class="features-box">
        <div class="features-icon d-table">
            <?php if( ! empty($image['url'])) : ?>
                <div class="features-icon-inner d-table-cell">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($alt); ?>">
                </div>
            <?php endif; ?>
            <!-- End Features icon inner -->
        </div>
        <!-- End Features Icon -->
        <?php if( !empty($title) ) : ?>
            <h3><?php echo esc_html( $title ); ?></h3>
        <?php endif;
        if( !empty($sub_title) ) : ?>
            <p><?php echo esc_html( $sub_title ); ?></p>
        <?php endif;

        if( !empty($btn_text) ) : ?>
            <a href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_html( $btn_target ); ?>" class="tw-readmore"><?php echo esc_html( $btn_text ); ?>
                <i class="fa fa-angle-right"></i>
            </a>
        <?php endif; ?>
    </div>
    <!-- End Single Features -->