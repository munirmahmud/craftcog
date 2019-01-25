<div class="text-center">
    <div class="percent-area">
        <div class="chart" data-percent="<?php if( !empty($total_percentage)) echo esc_html($total_percentage); ?>">
            <?php if( !empty($total_percentage)) : ?>
            <p class="percent"><?php echo esc_html($total_percentage); ?> <?php echo esc_html($fun_fact_attribute); ?></p>
            <?php endif;
            if( !empty($total_amount)) : ?>
            <small><?php echo esc_html($total_amount); ?></small>
            <?php endif; ?>
        </div>
        <?php if( !empty( $fact_name ) ) : ?>
        <p><?php echo esc_html( $fact_name ); ?></p>
        <?php endif; ?>
        <!-- Chart end -->
    </div>
    <!-- Percent area end -->
</div>