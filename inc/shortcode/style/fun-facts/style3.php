<?php $alt = get_post_meta($fun_fact_image['id'], '_wp_attachment_image_alt', true); ?>
<div class="text-center">
    <div class="tw-traffic-counter">
        <div class="traffic-icon-bg traffic-bg">
            <?php if( $fun_fact_image != ''): ?>
                <img src="<?php echo esc_url($fun_fact_image['url']); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid">
            <?php  endif; ?>
        </div>
        <!-- Traffic bg end -->
        <h3><?php echo esc_html($fact_name) ?> </h3>
        <p>
            <span class="counter"><?php echo esc_html($fact_value) ?> </span>
            <?php echo esc_html($fun_fact_attribute); ?>
        </p>
    </div>
    <!-- Traffic Counter end -->
</div>
<!-- Col End -->
