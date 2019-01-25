<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package TP
 */
/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'craftcog_post_nav' ) ) :

	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function craftcog_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
		//$previous	 = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		//$next		 = get_adjacent_post( false, '', false );

		$next_post	 = get_next_post();
		$pre_post	 = get_previous_post();
		if ( !$next_post && !$pre_post ) {
			return;
		}

		echo '<nav class="post-navigation clearfix mrtb-40">';


		echo '<div class="post-previous">';
		if ( !empty( $pre_post ) ):
			?>
			<a href="<?php echo get_the_permalink( $pre_post->ID ); ?>">
				<h3><?php echo get_the_title( $pre_post->ID ) ?></h3>
				<span><i class="fa fa-long-arrow-left"></i><?php esc_html_e( 'Previous Post', 'craftcog' ) ?></span>
			</a>

			<?php
		endif;
		echo '</div>';
		echo '<div class="post-next">';

		if ( !empty( $next_post ) ):
			?>
			<a href="<?php echo get_the_permalink( $next_post->ID ); ?>">
				<h3><?php echo get_the_title( $next_post->ID ) ?></h3>

				<span><?php esc_html_e( 'Next Post', 'craftcog' ) ?> <i class="fa fa-long-arrow-right"></i></span>
			</a>

			<?php
		endif;
		echo '</nav>';
		echo '</nav>';
	}

endif;


/**
 * ----------------------------------------------------------------------------------------
 *  - Display Post meta information for a specific post.
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'tp_post_meta_info' ) ) {

	function tp_post_meta_info() {


		echo '<div class="post-meta">';
		if ( get_post_type() === 'post' ) {

			// If the post is sticky, mark it.
			if ( is_sticky() ) {
				echo '<span class="featured-post sticky"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Featured', 'craftcog' ) . ' </span>';
			}

            // Get the post author.
            printf(
                '<span class="post-author">'. esc_html__( 'By ', 'craftcog' ) . '<a href="%2$s" rel="author">%3$s</a></span>', get_avatar( get_the_author_meta( 'ID' ), 55 ), esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author()
            );

			// The categories.
			$category_list = get_the_category_list( ', ' );
			if ( $category_list ) {
				echo '<span class="post-cat"> <i class="icon icon-folder"></i>   ' . $category_list . ' </span>';
			}

			//Post Date
            echo '<span class="post-date"><i class="icon icon-calendar2"></i>' .esc_html__( 'On ', 'craftcog' ) . get_the_date( 'd m Y' ) . '</span>';


            // Comments link.
            if ( comments_open() ) :
                echo '<span class="post-comment"><i class="icon icon-comment"></i> ';
                comments_popup_link( esc_html__( 'No Comment', 'craftcog' ), esc_html__( '1 Comment', 'craftcog' ), esc_html__( '% Comments', 'craftcog' ) );
                echo '</span>';
            endif;

		}
		echo '</div>';
	}

}


/**
 * ----------------------------------------------------------------------------------------
 * 6.0 - Display navigation to the next/previous set of posts.
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'craftcog_paging_nav' ) ) {

	function craftcog_paging_nav() {

		if ( is_singular() )
			return;

		global $wp_query;

		/** Stop execution if there's only 1 page */
		if ( $wp_query->max_num_pages <= 1 )
			return;

		$paged	 = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max	 = intval( $wp_query->max_num_pages );

		/** 	Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;

		/** 	Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}

		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}

		echo '<div class="pagination-style text-center mt-50"><ul>' . "\n";

		/** 	Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link( '<span class="fa fa-angle-left"></span>' ) );

		/** 	Link to first page, plus ellipses if necessary */
		if ( !in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';

			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

			if ( !in_array( 2, $links ) )
				echo '<li>&hellip;</li>';
		}

		/** 	Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}

		/** 	Link to last page, plus ellipses if necessary */
		if ( !in_array( $max, $links ) ) {
			if ( !in_array( $max - 1, $links ) )
				echo '<li>&hellip;</li>' . "\n";

			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}

		/** 	Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link( '<i class="fa fa-angle-right"></i>' ) );

		echo '</ul></div>' . "\n";
	}

}


/**
 * ----------------------------------------------------------------------------------------
 * 7.0 - footer tags with social share
 * ----------------------------------------------------------------------------------------
 */
if ( !function_exists( 'craftcog_single_post_footer' ) ) {

	function craftcog_single_post_footer() {
		?>


		<?php
		echo '<div class="blog-dec-tags-social">' . "\n";
		$tag_list = get_the_tag_list( '', ' ' );

		if ( $tag_list ) {
			echo '<div class="blog-dec-tags">' . "\n";
			echo ' <strong>' . esc_html__( 'Tags: ', 'craftcog' ) . '</strong>' . "\n";
			echo craftcog_kses( $tag_list );
			echo '</div>' . "\n";
		}
		?>
		<div class="blog-dec-social">
			<?php
			if ( function_exists( 'tp_social_share' ) ) {
				tp_social_share();
			}
			?>

		</div><!-- Share items end -->
		<?php
		echo '</div>' . "\n";
	}

}

function craftcog_tp_comment_style( $comment, $args, $depth ) {
	if ( 'div' === $args[ 'style' ] ) {
		$tag		 = 'div';
		$add_below	 = 'comment';
	} else {
		$tag		 = 'li ';
		$add_below	 = 'div-comment';
	}
	?>
	<?php
	if ( $args[ 'avatar_size' ] != 0 ) {
		echo get_avatar( $comment, $args[ 'avatar_size' ], '', '', array( 'class' => 'comment-avatar pull-left' ) );
	}
	?>
	<<?php
	echo craftcog_kses( $tag );
	comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent'  );
	?> id="comment-<?php comment_ID() ?>"><?php if ( 'div' != $args[ 'style' ] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php }
	?>	
		<div class="meta-data">

			<div class="pull-right reply"><?php
				comment_reply_link(
				array_merge(
				$args, array(
					'add_below'	 => $add_below,
					'depth'		 => $depth,
					'max_depth'	 => $args[ 'max_depth' ]
				) ) );
				?>
			</div>


			<span class="comment-author vcard"><?php
				printf( craftcog_kses( '<cite class="fn">%s</cite> <span class="says">%s</span>', 'craftcog' ), get_comment_author_link(), esc_html__( 'says:', 'craftcog' ) );
				?>
			</span>
			<?php if ( $comment->comment_approved == '0' ) { ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'craftcog' ); ?></em><br/><?php }
			?>

			<div class="comment-meta commentmetadata comment-date">
				<?php
				/* translators: 1: date, 2: time */
				printf(
				__( '%1$s at %2$s', 'craftcog' ), get_comment_date(), get_comment_time()
				);
				?>
				<?php edit_comment_link( esc_html__( '(Edit)', 'craftcog' ), '  ', '' ); ?>
			</div>
		</div>	
		<div class="comment-content">
			<?php comment_text(); ?>
		</div>
		<?php if ( 'div' != $args[ 'style' ] ) : ?>
		</div><?php
	endif;
}

function craftcog_link_pages() {
	$args = array(
		'before'			 => '<div class="page-links"><span class="page-link-text">' . esc_html__( 'More pages: ', 'craftcog' ) . '</span>',
		'after'				 => '</div>',
		'link_before'		 => '<span class="page-link">',
		'link_after'		 => '</span>',
		'next_or_number'	 => 'next',
		'separator'			 => ' | ',
		'nextpagelink'		 => esc_html__( 'Next ', 'craftcog' ) . '<I class="fa fa-angle-right"></i>',
		'previouspagelink'	 => '<I class="fa fa-angle-left"></i>' . esc_html__( ' Previous', 'craftcog' ),
	);
	wp_link_pages( $args );
}


if( ! function_exists('tp_author_info_box')){
    function tp_author_info_box() {
        global $post;
        if (is_single() && isset($post->post_author)) {

            $display_name = get_the_author_meta('display_name', $post->post_author);
            $author_posts = get_author_posts_url(get_the_author_meta('ID', $post->post_author));
            $author_bio = get_the_author_meta('user_description', $post->post_author);
            $author_website = get_the_author_meta('url', $post->post_author);
            $author_details = get_avatar(get_the_author_meta('user_email'), 80);

            ?>

            <div class="author-box">
                <div class="content">
                    <h3><?php echo esc_html( 'About ', 'craftcog' );
                        echo esc_html__( $display_name ); ?></h3>
                    <div class="post-author">

                        <?php echo $author_details; ?>

                        <div class="name-icons">
                            <a href="<?php echo esc_url($author_posts); ?>"
                               title="Posts by <?php echo esc_html($display_name); ?>"
                               rel="author"><?php echo esc_html($display_name); ?></a>
                            <?php echo esc_url($author_website); ?>
                        </div><!-- .name-icons -->

                    </div><!-- .post-author -->

                    <p class="description"><?php echo esc_html($author_bio); ?></p>

                </div><!-- .content -->
            </div>

        <?php }
    }
}