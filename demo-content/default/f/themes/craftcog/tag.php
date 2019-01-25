<?php
/**
 * tag.php
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
                        <?php
                        printf(esc_html__('Tag Archives for: %s', 'craftcog'), single_tag_title('', false));
                        ?>
                    </h2>

                    <?php
                    // Show an optional tag description.
                    if (tag_description()) {
                        echo '<p>' . tag_description() . '</p>';
                    }
                    ?>
                </header>
            </div>

            <div class="col-sm-8">
                <?php if (have_posts()) : ?>

                    <?php while (have_posts()) : the_post();
                    get_template_part('template-parts/post/content', get_post_format());
                    endwhile;

                    craftcog_paging_nav();

                    else :

                        get_template_part('template-parts/post/content', 'none');

                    endif; ?>
            </div>
            <!-- end main-content -->

            <?php get_sidebar(); ?>

        </div>
    </div>
</div>
<!-- /.wrap -->

<?php get_footer(); ?>