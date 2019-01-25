<?php
/**
 * Blog Header
 *
 */

$sub_heading = $global_bg = $global_breadcrumb = $banner_overlay = $heading_color = $subtitle_color = $page_heading = $page_sub_heading = $page_header_bg = $page_overlay = $custom_heading = $breadcrumb = '';

$page_heading = '';

$image_url = craftcog_get_image( 'header_bg', CRAFTCOG_IMAGES . '/header-bg.jpg' );

if ( defined( 'FW' ) ) {

	///COMES FROM CUSTOMIZER & IT HAS BEEN SET GLOBALLY FOR EVERY PAGE
    $sub_heading    	 = fw_get_db_customizer_option( 'global_page_subheading' );
    $global_bg	         = fw_get_db_customizer_option( 'global_header_bg' );
    $global_breadcrumb	 = fw_get_db_customizer_option( 'global_page_breadcrumb' );

    $banner_overlay		 = fw_get_db_customizer_option( 'page_banner_overlay' );
    $heading_color		 = fw_get_db_customizer_option( 'page_heading_color' );
    $subtitle_color		 = fw_get_db_customizer_option( 'page_subtitle_color' );

    //COMES FROM A SPECIFIC PAGE BASED ON THE PAGE ID
    $page_heading	     = fw_get_db_post_option( $post->ID, 'page_heading' );
    $page_sub_heading	 = fw_get_db_post_option( $post->ID, 'page_sub_heading' );
    $page_header_bg	     = fw_get_db_post_option( $post->ID, 'page_header_bg' );
    $page_overlay	     = fw_get_db_post_option( $post->ID, 'overlay' );

    $sub_heading = $page_sub_heading != '' ? $page_sub_heading : $sub_heading;


    if ( isset( $page_header_bg['url'] ) ) {
        $header_bg = (isset( $page_header_bg['url'] ) && $page_header_bg['url'] != '' ) ? 'style="background: url(' . $page_header_bg['url'] . ')"' : '';
    } elseif( (isset( $global_bg['url'] ) ) ) {
        $header_bg = (isset( $global_bg['url'] ) && $global_bg['url'] != '' ) ? 'style="background: url(' . $global_bg['url'] . ')"' : '';
    } else {
        $header_bg = 'style="background: url('. $image_url .')"';
    }

    $custom_heading = $page_heading != '' ? $page_heading : get_the_title();

    $overlay = ( isset( $banner_overlay ) && !empty( $banner_overlay ) ) ? 'style=background-color:'. $banner_overlay .'' : '';
    $overlay_color = ( isset( $page_overlay ) && !empty( $page_overlay ) ) ? 'style=background-color:'. $page_overlay .'' : $overlay;

    $subheading_color = (isset($subtitle_color) && !empty($subtitle_color)) ? 'style=color:'. $subtitle_color .'' : '';
    $heading_color = (isset($heading_color) && !empty($heading_color)) ? 'style=color:'. $heading_color .'' : '';

}

?>


<div id="banner-area" class="banner-area" <?php echo wp_kses_post( $header_bg ); ?>>

    <div class="overlay" <?php echo esc_attr( $overlay_color ); ?>></div>

	<div class="container">
		<div class="row">
			<div class="col-tp-12">
				<div class="banner-heading">

                    <?php if( $custom_heading ) : ?>
                        <h1 class="banner-title" <?php echo esc_attr( $heading_color ); ?>><?php echo esc_html( $custom_heading ); ?></h1>
                    <?php endif; ?>
                    <?php if( $sub_heading ) : ?>
                        <h4 class="banner-subtitle" <?php echo esc_attr( $subheading_color ); ?>><?php echo craftcog_kses( $sub_heading ); ?></h4>
                    <?php endif; ?>

					<?php
                    if( defined('FW')) {
                        $breadcrumb = fw_get_db_post_option( $post->ID, 'page_breadcrumb' );
                        if ($breadcrumb == 'yes'):
                            echo craftcog_get_breadcrumbs();
                        endif;
                    }
                    ?>
				</div>
			</div><!-- Col end -->
		</div><!-- Row end -->
	</div><!-- Container end -->
</div><!-- Banner area end --> 

