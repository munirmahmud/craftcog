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

    <div class="link-post">
        <div class="link-content">
            <span><?php the_date( 'M d Y' ); ?> </span>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        </div>
    </div>
    
</article>