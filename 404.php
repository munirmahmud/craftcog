<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage CraftCog
 * @since 1.0
 * @version 1.0
 */

get_header();

$image_url = CRAFTCOG_IMAGES . '/header-bg.jpg';
?>


<div id="banner-area" class="banner-area" style="background: url(<?php echo craftcog_kses( $image_url ); ?>);">

    <div class="overlay" style="background-color: rgba(0, 0, 0, 0.7);"></div>

    <div class="container">
        <div class="row">
            <div class="col-tp-12">
                <div class="banner-heading">

                    <h1 class="banner-title"><?php echo esc_html__( 'Oops, I should\'nt be here!', 'craftcog' ); ?></h1>
                    
                </div>
            </div><!-- Col end -->
        </div><!-- Row end -->
    </div><!-- Container end -->
</div><!-- Banner area end --> 


    <div class="pt-130 pb-125 hm-3-padding">
        <div class="container-fluid">
            <div class="row">

            <div class="col-sm-12">

                <div class="error-page text-center">
                    <div class="error-code">
                        <strong><?php echo esc_html__('404', 'craftcog') ?></strong>
                    </div>

                    <div class="error-message">
                        <h3><?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', 'craftcog' ); ?></h3>
                    </div>

                    <div class="error-body">
                        <?php echo esc_html__('Try using the button below to go to main page of the site', 'craftcog') ?>
                         <br>
                         <a href="<?php echo esc_url(home_url()) ?>" class="btn btn-primary solid blank"><i class="fa fa-arrow-circle-left">&nbsp;</i> <?php echo esc_html__('Go to Home', 'craftcog') ?></a>
                    </div>

                    <?php get_search_form(); ?>
                </div>

            </div>
        </div>
    </div>
</div>
    <!-- /.wrap -->

<?php get_footer(); ?>