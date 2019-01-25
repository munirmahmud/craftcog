<?php
/**
 * footer.php
 *
 * The template for displaying the footer.
 */

$copyright = '';

if(defined('FW')) {
    $copyright = fw_get_db_customizer_option('copyright_info');
    $payment_cards = fw_get_db_customizer_option('payment_method_cards');
}

?>

    <footer class="gray-bg footer-padding">
        <div class="container-fluid">
            <div class="footer-top pt-85 pb-25">
                <div class="row">

                    <div class="col-lg-3 col-md-5">
                        <?php if ( is_active_sidebar( 'footer-1' ) ) :
                        dynamic_sidebar( 'footer-1' );
                        endif; ?>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <?php if ( is_active_sidebar( 'footer-2' ) ) :
                            dynamic_sidebar( 'footer-2' );
                        endif; ?>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <?php if ( is_active_sidebar( 'footer-3' ) ) :
                            dynamic_sidebar( 'footer-3' );
                        endif; ?>
                    </div>

                    <div class="col-lg-3 col-md-4">
                        <?php if ( is_active_sidebar( 'footer-4' ) ) :
                            dynamic_sidebar( 'footer-4' );
                        endif; ?>
                    </div>

                </div>
            </div>
            <div class="footer-bottom border-top-1 ptb-15">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <?php if ( !empty( $copyright ) ): ?>
                            <div class="copyright-payment">
                                <div class="copyright">
                                    <?php echo wp_kses_post( $copyright ); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                    <?php if ( !empty( $payment_cards ) ): ?>
                        <div class="col-md-6 col-12">
                            <div class="footer-payment-method">
                                <img alt="<?php echo esc_html__( 'Payment Methods', 'craftcog' ); ?>" src="<?php echo esc_url( $payment_cards['url'] ); ?>">
                            </div>
                        </div>
                    <?php endif; ?>
                
                </div>
            </div>
            <!-- End .footer-bottom -->
        </div>
    </footer>

</div>

<?php wp_footer(); ?>
</body>
</html>