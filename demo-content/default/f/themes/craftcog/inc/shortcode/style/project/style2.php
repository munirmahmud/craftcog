<div class="col-md-4 text-center">
    <div class="tw-case-study-box">
        <div class="case-img study-bg">
            <?php if( !empty($img_url)) : ?>
            <img src="<?php echo esc_url($img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
            <?php endif; ?>
        </div>
        <!-- End case img -->
        <div class="casestudy-content">
            <a href="<?php echo get_the_permalink(); ?>"><h4><?php echo get_the_title(); ?></h4></a>

            <p>
            <?php
                if( is_array($categories) ){
                    foreach ($categories as $category){
                        echo esc_html($category->name) .' ';
                    }
                }
            ?>
            </p>
        </div>
        <!-- End case study content -->
    </div>
    <!-- End case study box -->
</div>
<!-- End Col -->