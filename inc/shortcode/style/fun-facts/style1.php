<?php $alt = get_post_meta($fun_fact_image['id'], '_wp_attachment_image_alt', true); ?>
<div class="text-center">
    <div class="tw-facts-box">
        <div class="facts-img">
            <?php if( $fun_fact_image != ''): ?>
                <img src="<?php echo esc_url($fun_fact_image['url']); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid">
            <?php  endif; ?>
        </div>
        <!-- End Fatcs image -->
        <div class="facts-content" >
            <h4 class="facts-title"><?php echo esc_html($fact_name); ?></h4>
            <span class="counter"><?php echo esc_html($fact_value); ?></span>
            <?php if( isset($fun_fact_attribute) ) { ?>
            <sup><?php echo esc_html($fun_fact_attribute); ?></sup>
            <?php } ?>
        </div>
        <!-- Facts Content End -->
    </div>
    <!-- Facts Box End -->
</div>