<div class="row work-process">

    <?php
    foreach ($working_process as $single_value) :
    $working_process_img = $single_value['working_process_image']['url'];
    $alt = get_post_meta($single_value['working_process_image']['id'], '_wp_attachment_image_alt', true);

    $working_process_bg_color = $single_value['bg_color'];

    $working_process_bg = $working_process_bg_color != '' ? 'style=background-color:'. $working_process_bg_color .';' : '';
    ?>

    <div class="col-md-3">
        <div class="tw-work-process">
            <div <?php echo esc_attr($working_process_bg); ?> class="process-wrapper d-table">
                <?php if( !empty($working_process_img)) : ?>
                    <div class="process-inner d-table-cell">
                        <img src="<?php echo esc_url($single_value['working_process_image']['url']); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid">

                        <?php if( !empty($single_value['working_process_number'] ) ) :
                        ?>
                        <span class="case-process-number"><?php echo esc_html($single_value['working_process_number']); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
            <!-- End process wrapper -->
            <?php if( !empty($single_value['title'])) : ?>
                <p><?php echo esc_html($single_value['title']); ?></p>
            <?php endif; ?>
        </div>
        <!-- End Tw work process -->
    </div>
    <!-- End Col -->

<?php  endforeach; ?>
</div>