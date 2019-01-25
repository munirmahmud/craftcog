<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage CraftCog
 * @since 1.0
 * @version 1.0
 */
get_header();

get_template_part( 'template-parts/header/content', 'blog-header' );
?>

    <div class="blog-area pt-130 pb-125 hm-3-padding">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-8 col-xl-9">
                    <div class="blog-wrapper">
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                                <?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

                            <?php endwhile; ?>

                            <?php craftcog_paging_nav(); ?>

                        <?php else : ?>

                            <?php get_template_part( 'template-parts/post/content', 'none' ); ?>

                        <?php endif; ?>

                    </div><!-- blog-wrapper -->
                </div><!-- Content Col end -->

                <?php get_sidebar(); ?>

            </div><!-- /.row -->

        </div><!-- /.Container -->
    </div><!-- /.blog-area pt-130 pb-125 hm-3-padding -->

<?php get_footer(); ?>