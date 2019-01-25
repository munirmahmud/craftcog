<?php
/**
 * author.php
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage CraftCog
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<?php get_template_part('template-parts/header/content', 'blog-header')?>

<div class="wrap posts-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <header class="tp-archive-header">
                    <h2>
                        <?php printf(esc_html__('All Posts By: %s.', 'craftcog'), get_the_author()); ?>
                    </h2>

                    <?php
                    // If the author bio exists, display it.
                    if (get_the_author_meta('description')) {
                        echo '<p>' . the_author_meta('description') . '</p>';
                    }
                    ?>

                    <?php rewind_posts(); ?>
                </header>
            </div>

            <div class="col-sm-8">
                <?php if (have_posts()) : the_post(); ?>

                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/post/content', get_post_format()); ?>
                    <?php endwhile; ?>

                    <?php craftcog_paging_nav(); ?>

                <?php else : ?>
                    <?php get_template_part('template-parts/post/content', 'none'); ?>
                <?php endif; ?>
            </div> <!-- /.col-sm-8 -->

            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
    <!-- /.wrap -->

<?php get_footer(); ?>