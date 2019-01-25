<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class TP_Post_Widget extends Widget_Base {

    public $base;

    public function get_name() {
        return 'tp-blog';
    }

    public function get_title() {
        return esc_html__( 'CraftCog Post', 'craftcog' );
    }

    public function get_icon() {
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'craftcog-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Post', 'craftcog'),
            ]
        );

        $this->add_control(
            'post_count',
            [
                'label'         => esc_html__( 'Post count', 'craftcog' ),
                'type'          => Controls_Manager::NUMBER,
                'default'       => esc_html__( '3', 'craftcog' ),

            ]
        );

        $this->add_control(
            'tp_post_cat',
            [
                'label'    => esc_html__( 'Select category', 'craftcog' ),
                'type'     => Controls_Manager::SELECT,
                'options'  => tp_category_list( 'category' ),
                'default'  => '0'
            ]
        );

        $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();
        $tp_post_cat = $settings['tp_post_cat'];
        $post_count = $settings['post_count'];

        $paged = 1;
        if ( get_query_var('paged') ) $paged = get_query_var('paged');
        if ( get_query_var('page') ) $paged = get_query_var('page');
        $query = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => $post_count,
            'cat' => $tp_post_cat,
            'paged' => $paged,
        );

        $query = new \WP_Query( $query );
        if($query->have_posts()):
            ?>

            <div class="row">
                <?php
                while ($query->have_posts()) :
                    $query->the_post();
                    $terms  = get_the_terms( get_the_ID(), 'category' );
                    if ( $terms && ! is_wp_error( $terms ) ) :
                        $cat_temp = '';
                        foreach ( $terms as $term ) {
                            $cat_temp .= '<a href="'.get_category_link($term->term_id).'">'.$term->name.'</a>';
                        }
                    endif;
                    ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="blog-hm-wrapper mb-40">
                            <?php
                                if(has_post_thumbnail()):
                                $img = \tp_img_resize( get_post_thumbnail_id( $query->ID ), 471, 334 );
                            ?>
                                <div class="blog-img">
                                    <a href="<?php echo esc_url( get_the_permalink() );  ?>"><img src="<?php echo esc_url( $img ); ?>" alt="<?php echo get_the_title($query->ID); ?>"></a>
                                </div>
                            <?php endif; ?>

                            <div class="blog-hm-content">
                                <h3><a href="<?php echo esc_url(get_the_permalink() );  ?>"><?php the_title(); ?></a></h3>
                                <div class="blog-meta">
                                    <ul>
                                        <li><span>by:</span><a href="#"><?php the_author(); ?></a></li>
                                        <li><span>On</span> <?php echo get_the_date('d M Y'); ?></li>
                                    </ul>
                                </div>
                                <p><?php craftcog_excerpt(30); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <!-- End Col -->
            </div>

        <?php
        endif;
        wp_reset_postdata();
    }
    protected function _content_template() { }
}