<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage CraftCog
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/header/content', 'blog-header' ); ?>

<div class="blog-area pt-130 pb-125 hm-3-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="blog-details-wrapper">
                    <?php
                    while ( have_posts() ) : the_post();

                        get_template_part( 'template-parts/content', 'single' );

                        craftcog_post_nav();

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            comments_template();
                        endif;

                    endwhile;
                    ?>
                </div>
            </div> <!-- end col-lg-8 col-xl-9 -->

            <?php get_sidebar(); ?>

        </div>
    </div>
    <!-- /.container-->
</div>
<!-- /.wrap -->

<?php get_footer(); ?>