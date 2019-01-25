<div id="tw-pricing" class="tw-pricing">
    <div class="pricing-tab">
        <?php if( !empty( $monthly ) && !empty( $yearly ) ) : ?>
            <ul class="nav">
                <li class="nav-item">
                    <a data-toggle="tab" href="#<?php echo esc_html(strtolower($monthly)); ?>" class="active"><?php echo esc_html($monthly); ?></a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#<?php echo esc_html(strtolower($yearly)); ?>"><?php echo esc_html($yearly); ?></a>
                </li>
            </ul>
        <?php endif; ?>
        <!-- Nav Tabs ends -->
        <div class="tab-content tw-tab-content">
            <?php if( isset( $monthly_table ) ) : ?>
                <div class="tab-pane show active" id="<?php echo esc_html(strtolower($monthly)); ?>">
                    <div class="row">

                        <?php foreach ( $monthly_table as $table_value ) : ?>
                            <div class="col-md-4">
                                <div class="tw-pricing-box <?php if ( $table_value['tp_featured_table'] == 'yes' ) echo 'pricing-featured'; ?>">
                                    <div class="price-icon-bg">
                                        <?php
                                            if( !empty( $table_value['table_image']['url'] ) ) :
                                            $alt = get_post_meta($table_value['table_image']['id'], '_wp_attachment_image_alt', true);
                                            ?>
                                            <div class="price-icon">
                                                <img src="<?php echo esc_url($table_value['table_image']['url']); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <!-- End Pricing icon bg -->
                                    <div class="pricing-feaures">
                                        <?php if( !empty( $table_value['table_title'] ) ) : ?>
                                            <h3><?php echo esc_html($table_value['table_title']); ?></h3>
                                        <?php endif; ?>
                                        <ul>
                                            <?php
                                            $table_contents = preg_split('/\r\n|[\r\n]/', $table_value['table_content'] );

                                            if( is_array( $table_contents ) && !empty( $table_contents ) ) :
                                                foreach ($table_contents as $tab_text) :
                                                    ?>
                                                    <li><?php echo esc_html($tab_text); ?></li>
                                                <?php endforeach; endif; ?>
                                        </ul>
                                    </div>
                                    <!-- Pricing Features End -->
                                    <div class="pricing-price">
                                        <?php if( !empty($table_value['currency_icon']) ) : ?>
                                            <sup><?php echo esc_html($table_value['currency_icon']); ?></sup>
                                        <?php endif; ?>
                                        <?php if( !empty($table_value['table_price']) ) : ?>
                                            <strong><?php echo esc_html($table_value['table_price']); ?></strong>
                                        <?php endif;
                                        if( !empty($table_value['table_duration']) ) : ?>
                                        <small><?php echo esc_html($table_value['table_duration']); ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Pricing End -->
                                    <?php if( !empty($table_value['button_text']) ) : ?>
                                        <a href="<?php echo esc_url($table_value['button_url']['url']); ?>" class="btn btn-dark"><?php echo esc_html($table_value['button_text']); ?></a>
                                    <?php endif; ?>
                                </div>
                                <!--  pricing box ends -->
                            </div>
                        <?php endforeach; ?>
                        <!-- COl end -->
                    </div>
                    <!-- Tab pane end -->
                </div>
            <?php endif; ?>
            <!-- Tab Content End -->

            <?php if (isset($yearly_table) ) : ?>
                <div class="tab-pane fade" id="<?php echo esc_html(strtolower($yearly)); ?>">
                    <div class="row">

                        <?php foreach ( $yearly_table as $table_value ) : ?>
                            <div class="col-md-4">
                                <div class="tw-pricing-box <?php if ( $table_value['tp_featured_table'] == 'yes' ) echo 'pricing-featured'; ?>">
                                    <div class="price-icon-bg">
                                        <?php
                                            if( !empty( $table_value['table_top_image']['url'] ) ) :
                                            $alt = get_post_meta($table_value['table_top_image']['id'], '_wp_attachment_image_alt', true);
                                            ?>
                                            <div class="price-icon">
                                                <img src="<?php echo esc_url($table_value['table_top_image']['url']); ?>" alt="<?php echo esc_attr($alt); ?>" class="img-fluid">
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <!-- End Pricing icon bg -->
                                    <div class="pricing-feaures">
                                        <?php if( !empty( $table_value['table_title'] ) ) : ?>
                                            <h3><?php echo esc_html($table_value['table_title']); ?></h3>
                                        <?php endif; ?>
                                        <ul>
                                            <?php
                                            $table_contents = preg_split('/\r\n|[\r\n]/', $table_value['table_content'] );

                                            if( is_array( $table_contents ) && !empty( $table_contents ) ) :
                                                foreach ($table_contents as $table_text ) :
                                                    ?>
                                                    <li><?php echo esc_html($table_text); ?></li>
                                                <?php endforeach; endif; ?>
                                        </ul>
                                    </div>
                                    <!-- Pricing Features End -->
                                    <div class="pricing-price">
                                        <?php if( !empty($table_value['currency_icon']) ) : ?>
                                            <sup><?php echo esc_html($table_value['currency_icon']); ?></sup>
                                        <?php endif; ?>
                                        <?php if( !empty($table_value['table_price']) ) : ?>
                                            <strong><?php echo esc_html($table_value['table_price']); ?></strong>
                                        <?php endif;
                                        if( !empty($table_value['table_duration']) ) : ?>
                                            <small><?php echo esc_html($table_value['table_duration']); ?></small>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Pricing End -->
                                    <?php if( !empty($table_value['button_text']) ) : ?>
                                        <a href="<?php echo esc_url($table_value['button_url']['url']); ?>" class="btn btn-dark"><?php echo esc_html($table_value['button_text']); ?></a>
                                    <?php endif; ?>

                                </div>
                                <!--  pricing box ends -->
                            </div>
                        <?php endforeach; ?>
                        <!-- COl end -->
                    </div>
                    <!-- Tab pane end -->
                </div>
            <?php endif; ?>
            <!-- Tab Content End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Pricing tab end -->
</div>