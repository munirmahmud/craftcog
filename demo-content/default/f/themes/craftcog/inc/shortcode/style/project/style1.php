<div class="col-md-4">
    <div class="cases-img cases-bg">
        <?php if( !empty($img_url) ) : ?>
        <img src="<?php echo esc_url($img_url[0]); ?>" alt="<?php echo get_the_title(); ?>" class="img-fluid">
        <?php endif; ?>

        <div class="case-study-footer">
            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>

            <span>
            <?php
            if( is_array($categories) ){
                foreach ($categories as $category){
                    echo esc_html( $category->name ). ' ';
                }
            }
            ?>
            </span>
        </div>
    </div>
</div>
<!-- 8th case img end -->



