<?php $alt = get_post_meta($image['id'], '_wp_attachment_image_alt', true); ?>
<div class="text-center">
    <div class="tw-service-features-box">

        <?php if( ! empty($image['url'])) : ?>
        <div class="service-feature-icon-bg service-bg-icon-1">
            <div class="service-feature-icon">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($alt); ?>">
            </div>
        </div>
        <?php endif; ?>

        <?php if( !empty($title) ) : ?>
            <h3><?php echo esc_html( $title ); ?></h3>
        <?php endif;
        if( !empty($sub_title) ) : ?>
            <p><?php echo esc_html( $sub_title ); ?></p>
        <?php endif;

        if( !empty($btn_text) ) : ?>
            <a href="<?php echo esc_url( $btn_link ); ?>" target="<?php echo esc_html( $btn_target ); ?>" class="tw-readmore"><?php echo esc_html( $btn_text ); ?>
            </a>
        <?php endif; ?>
    </div>
    <!-- Features box End -->
</div>
<!-- Col End -->