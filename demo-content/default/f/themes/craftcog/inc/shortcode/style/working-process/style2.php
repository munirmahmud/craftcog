<div class="row">

    <?php
    foreach ($working_process as $single_value) :
    $working_process_img = $single_value['working_process_image']['url'];
    $alt = get_post_meta($single_value['working_process_image']['id'], '_wp_attachment_image_alt', true);
    ?>

    <div class="col-md-3 text-center">
        <div class="tw-case-working-box">
            <div class="working-icon-wrapper">
                <div class="working-icon">

                    <?php if( !empty($working_process_img)) : ?>
                        <img src="<?php echo esc_url($single_value['working_process_image']['url']); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid">
                    <?php endif;
                    if( !empty($single_value['working_process_number'] ) ) :
                    ?>
                    <span class="case-process-number"><?php echo esc_html($single_value['working_process_number']); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Icon Wrapper End -->
            <?php if( !empty($single_value['title'])) : ?>
                <h3><?php echo esc_html($single_value['title']); ?></h3>
            <?php endif; ?>
        </div>
        <!-- Working Box End -->
    </div>
    <?php endforeach; ?>
    <!-- Col End -->
</div>
<!-- Content Row End -->