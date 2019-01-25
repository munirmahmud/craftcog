<?php
/**
 * Blog Header
 *
 */

$bg_image = $global_title	 = $page_title	 =   $heading_color =  $subtitle_title  = $overlay = $page_subtitle =  $subtitle_color = $breadcrumb = '';

$image_url = craftcog_get_image( 'header_bg', CRAFTCOG_IMAGES . '/shop-banner.jpg' );
$bg_image = 'style="background: url('. $image_url .')"';

if ( defined( 'FW' ) ) {

	///Global optipn
    $wc_title	         = fw_get_db_customizer_option( 'global_wc_title' );
	$wc_header_bg		 = fw_get_db_customizer_option( 'wc_header_bg' );
	$wc_breadcrumb		 = fw_get_db_customizer_option( 'wc_breadcrumb' );
    $wc_overlay	         = fw_get_db_customizer_option( 'wc_banner_overlay' );
    $wc_heading_color	 = fw_get_db_customizer_option( 'wc_heading_color' );

    $global_wc_bg = ( isset( $wc_header_bg['url'] ) && $wc_header_bg['url'] != '' ) ? 'style="background: url('. $wc_header_bg['url'] .')"' : $bg_image;
    $overlay = ( isset( $wc_overlay ) && !empty( $wc_overlay ) ) ? 'style=background-color:'. $wc_overlay .'' : '';

    $heading_color = ( isset( $wc_heading_color ) && !empty( $wc_heading_color ) ) ? 'style=color:'. $wc_heading_color .'' : '';
}
?>


<div id="banner-area" class="banner-area" <?php echo wp_kses_post( $global_wc_bg ); ?>>

    <div class="overlay" <?php echo esc_attr($overlay); ?>></div>

	<div class="container">
		<div class="row">
			<div class="col-tp-12">
				<div class="banner-heading">

                    <?php if($wc_title) : ?>
                        <h1 class="banner-title" <?php echo esc_attr($heading_color); ?>><?php echo esc_html( $wc_title ); ?></h1>
                    <?php endif; ?>

					<?php
                        if ( is_product() || is_shop() ):
                             woocommerce_breadcrumb();
                        endif;
                    ?>
				</div>
			</div><!-- Col end -->
		</div><!-- Row end -->
	</div><!-- Container end -->
</div><!-- Banner area end --> 

