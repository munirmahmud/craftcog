<?php
/**
 * content.php
 *
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage CraftCog
 * @since 1.0
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('single-blog-wrapper mb-80'); ?>>
    <blockquote>
        <div class="quote-post">
            <div class="quote-content">
                <span><?php the_date( 'd M Y' ); ?> </span>
                <h3><a href="<?php the_permalink(); ?>"><?php craftcog_excerpt(20); ?></a></h3>
                <h6><?php the_author(); ?></h6>
            </div>
        </div>
    </blockquote>
</article>