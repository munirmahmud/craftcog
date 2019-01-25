<?php $alt = get_post_meta($image['id'], '_wp_attachment_image_alt', true); ?>
<div class="tw-award-box">
    <div class="award-icon">
        <?php if( ! empty($image['url'])) : ?>
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($alt); ?>">
        <?php endif; ?>
    </div>
    <?php if( !empty($title) ) : ?>
    <h3><?php echo esc_html( $title ); ?></h3>
<?php endif; ?>
</div>
<!-- Award Box End -->

