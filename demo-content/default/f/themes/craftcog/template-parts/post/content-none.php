<?php
/**
 * content-none.php
 *
 * Template part for displaying a message that posts cannot be found
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
    <header class="page-header">
        <h1 class="page-title"><?php _e( 'Nothing Found', 'craftcog' ); ?></h1>
    </header>
    <div class="page-content">
        <?php
        if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

            <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'craftcog' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

        <?php else : ?>

            <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'craftcog' ); ?></p>
            <?php
            get_search_form();

        endif; ?>
    </div><!-- .page-content -->
</article><!-- .no-results -->