<?php
/**
 * Blog Header
 *
 */
$bg_image	 = $header_blog_title	 =   $breadcrumb =  $subtitle_title  = $overlay = $heading_color =  $subtitle_color = '';

$image_url = craftcog_get_image( 'header_bg', CRAFTCOG_IMAGES . '/header-bg.jpg' );
$bg_image = 'style="background: url('. $image_url .')"';



if ( defined( 'FW' ) ) {

    $blog_title               = fw_get_db_customizer_option( 'global_blog_title' );
    $subtitle_title           = fw_get_db_customizer_option( 'global_blog_subtitle' );
    $header_global_bg         = fw_get_db_customizer_option( 'global_header_blog_bg' );
    $breadcrumb               = fw_get_db_customizer_option( 'global_blog_breadcrumb' );


    $banner_overlay           = fw_get_db_customizer_option( 'heading_banner_overlay' );
    $heading_color            = fw_get_db_customizer_option( 'blog_heading_color' );
    $subtitle_color           = fw_get_db_customizer_option( 'blog_subtitle_color' );

    $bg_image = (isset( $header_global_bg['url'] ) && $header_global_bg['url'] != '' ) ? 'style="background: url(' . $header_global_bg['url'] . ')"' : $bg_image;

    $overlay = (isset($banner_overlay) && !empty($banner_overlay)) ? 'style=background-color:'. $banner_overlay .'' : '';
    $heading_color = (isset($heading_color) && !empty($heading_color)) ? 'style=color:'. $heading_color .'' : '';
    $subtitle_color = (isset($subtitle_color) && !empty($subtitle_color)) ? 'style=color:'. $subtitle_color .'' : '';
}
?>

<div id="banner-area" class="banner-area" <?php echo craftcog_kses($bg_image); ?>>

    <div class="overlay" <?php echo esc_attr($overlay); ?>></div>

	<div class="container">
		<div class="row">
			<div class="col-tp-12">
				<div class="banner-heading">
                    <?php if($blog_title) : ?>
					<h1 class="banner-title" <?php echo esc_attr($heading_color); ?>><?php echo esc_html( $blog_title ); ?></h1>
                    <?php endif; ?>

                    <?php if($subtitle_title) : ?>
					    <h3 class="banner-subtitle" <?php echo esc_attr($subtitle_color); ?>><?php echo esc_html( $subtitle_title ); ?></h3>
                    <?php endif; ?>
					<?php
					    if ( is_single() && $breadcrumb == 'yes' ):
						    echo craftcog_get_breadcrumbs();
                        endif;
                     ?>
				</div>
			</div><!-- Col end -->
		</div><!-- Row end -->
	</div><!-- Container end -->
</div><!-- Banner area end --> 

