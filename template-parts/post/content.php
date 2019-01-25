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
    <!-- post image start -->
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="blog-img mb-30">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'post-thumbnail' ); ?>
            </a>
        </div>
    <?php endif; ?>

    <div class="blog-content">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="blog-date-categori">
            <ul>
                <li><?php the_date( 'd M Y' ); ?> </li>
                <li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?> </a></li>
            </ul>
        </div>
    </div>
    <?php craftcog_excerpt(50); ?>
    <div class="blog-btn-social mt-20">
        <div class="blog-btn">
            <a class="btn-style cr-btn" href="<?php the_permalink(); ?>">
                <span><?php echo esc_html__( 'read more', 'craftcog' ); ?></span>
            </a>
        </div>
        <?php
            if( function_exists( 'tp_social_share' ) ) :
                tp_social_share(); 
            endif;
        ?>
    </div>
</article>