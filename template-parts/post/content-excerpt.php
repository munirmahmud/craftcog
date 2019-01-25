<?php
/**
 * content-excerpt.php
 *
 * Template part for displaying posts with excerpts
 *
 * Used in Search Results and for Recent Posts in Front Page panels.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage CraftCog
 * @since 1.0
 * @version 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- post image start -->
    <?php
    if ( has_post_thumbnail() ) :
        echo '	<div class="post-media post-image">';
        the_post_thumbnail( 'post-thumbnail' );
        echo  '	</div>';
    endif;
    ?>

    <div class="entry-content">

        <?php craftcog_post_meta_left(); ?>
        <!-- Post meta left -->

        <div class="entry-header">
            <?php craftcog_post_meta(); ?>
        </div><!-- header end -->

        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <div class="post-content">
            <?php
            craftcog_content_read_more( '35' );
            ?>
        </div>
    </div><!-- /.entry-content -->

</article><!-- post end -->