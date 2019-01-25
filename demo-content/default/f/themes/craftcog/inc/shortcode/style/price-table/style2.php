<div class="tw-price-box">
    <div class="pricing-feaures">
        <div class="pricing-price">
            <?php if( !empty($currency_icon) ) : ?>
            <sup><?php echo esc_html($currency_icon); ?></sup>
            <?php endif;
            if( !empty($price_amount) ) : ?>
            <strong><?php echo esc_html($price_amount); ?></strong>
            <?php endif;
            if( !empty($package_table['general_package_duration']) ) : ?>
                <small><?php echo esc_html($package_table['general_package_duration']); ?></small>
            <?php endif; ?>
        </div>
        <!-- Pricing End -->
        <?php if( !empty($package_title) ) : ?>
        <h3><?php echo esc_html($package_title); ?></h3>
        <?php endif; ?>
        <ul>
            <?php
            $package_content = preg_split('/\r\n|[\r\n]/', $general_package_content );

            if( is_array( $package_content ) && !empty( $package_content ) ) :
                foreach ($package_content as $package_info ) :
                    ?>
                    <li><?php echo esc_html($package_info); ?></li>
                <?php endforeach; endif; ?>
        </ul>
    </div>
    <!-- Pricing Features End -->
    <?php if( !empty($general_buy_btn) ) : ?>
    <a href="<?php echo esc_url($general_buy_btn_url); ?>" class="btn btn-dark tw-mt-30"><?php echo esc_html($general_buy_btn); ?></a>
    <?php endif; ?>
</div>
<!--  pricing box ends -->