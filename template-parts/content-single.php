<?php
/**
 * content.php
 *
 * The default template for displaying content.
 */
?>

<div  id="post-<?php the_ID(); ?> <?php post_class( 'single-blog-wrapper' ); ?> class="">

	<?php if ( has_post_thumbnail() && !post_password_required() ) : ?>
		<div class="blog-img mb-30">
		<?php the_post_thumbnail( 'post-thumbnails' ); ?>
		</div>
	<?php endif; ?>

	<div class="blog-content">
		<h2><?php the_title(); ?></h2>
		<div class="blog-date-categori">
			<ul>
				<li><?php the_date( 'M d Y' ); ?> </li>
				<li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?> </a></li>
			</ul>
		</div>
	</div>

		<div class="entry-content">
			<?php
				if ( is_search() ) {
					the_excerpt();
				} else {
					the_content( esc_html__( 'Continue reading &rarr;', 'craftcog' ) );

					craftcog_link_pages();
				}
			?>
	</div> <!-- end entry-content -->

	<div class="post-body clearfix">

		<!-- Article content -->


		<?php
            //craftcog_single_post_footer
            craftcog_single_post_footer();

            $author_setting = '';
            if( defined('FW')){
                $author_setting = fw_get_db_customizer_option('blog_author_settings');
            }
            if( $author_setting == 'yes' ){
                tp_author_info_box();
            }

		?>
    </div> <!-- end post-body -->

</div>