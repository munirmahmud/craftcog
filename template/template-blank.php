<?php
/**
 * Template Name: Blank Template
 *
 * This template for the blank template
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage CraftCog
 * @since 1.0
 * @version 1.0
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <div class="blank-template" role="main">
        <div class="main-content">

            <?php while ( have_posts() ) : the_post(); ?>
                <article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php the_content(); ?>

                </article>
            <?php endwhile; ?>

        </div> <!-- end main-content -->
    </div> <!-- end main-content -->

<?php wp_footer(); ?>

</body>
</html>