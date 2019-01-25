<?php if( is_array( $sliders ) && !empty( $sliders ) ) : ?>
    <div class="slider-area">
        <div class="slider-active owl-carousel">

            <?php foreach( $sliders as $slider ):

                $title = $slider['title'];
                $description = $slider['description'];
                $btn_label = $slider['btn_label'];

                $btn_link = (! empty( $slider['btn_link']['url'] ) ) ? $slider['btn_link']['url'] : '';
                $btn_target = ( $slider['btn_link']['is_external']) ? '_blank' : '_self';

                $slider_thumb = $slider['small_image']['url'];
                $alt = get_post_meta($slider['small_image']['id'], '_wp_attachment_image_alt', true);

                ?>
            <div class="single-slider slider-1 gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="slider-content slider-animated-1">
                                <?php if( !empty( $title ) ): ?>
                                    <h2 class="animated"><?php echo craftcog_kses( sprintf( $title, '<span>', '</span>' ) ); ?> </h2>
                                <?php endif;?>
                                <?php if( !empty( $description ) ): ?>
                                    <p class="animated"><?php echo craftcog_kses( $description ); ?></p>
                                <?php endif;?>
                                <?php if( !empty( $btn_label ) ): ?>
                                    <a class="slider-btn animated" href="<?php echo esc_url( $btn_link ); ?>"><?php echo esc_html( $btn_label ); ?></a>
                                <?php endif;?>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="slider-single-img slider-animated-1">
                                <img class="animated" src="<?php echo esc_url( $slider_thumb ); ?>" alt="<?php echo esc_attr( $alt ); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

<?php endif; ?>