<?php
/**
 * search.php
 *
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage CraftCog
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/header/content-page', 'header' ) ?>

<div class="wrap pt-125 pb-125" role="main">
    <div class="container">
        <div class="row">

            <div class="col-sm-8">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/post/content', get_post_format() );
                    endwhile;
                    craftcog_paging_nav();
                else :
                    get_template_part( 'template-parts/post/content', 'none' );
                endif;
                ?>
            </div> <!-- end main-content -->

            <?php get_sidebar(); ?>

        </div>
    </div>
</div>
<!-- /.wrap-->

<?php get_footer(); ?>