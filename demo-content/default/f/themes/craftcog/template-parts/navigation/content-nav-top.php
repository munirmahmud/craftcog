<div class="col-md-6 col-xs-12">
    <ul class="top-info">
        <?php
        if ( defined( 'FW' ) ):
            $header_top_info = fw_get_db_customizer_option( 'header_top_contact_details' );

            foreach ( $header_top_info as $info ):
                ?>
                <li>
                    <span class="info-icon">
                        <i class="<?php echo esc_attr( $info[ 'icon' ] ) ?>"></i>
                    </span>
                    <div class="info-wrapper">
                        <p class="info-text"><?php echo esc_html( $info[ 'info' ] ) ?></p>
                    </div>
                </li>
                <?php
            endforeach;
        endif;
        ?>
    </ul>
</div>
<!--/ Top info end -->

<div class="col-md-6 col-xs-12 text-right">
    <ul class="top-social">
        <li>
            <?php
            if ( defined( 'FW' ) ):
                $top_social = fw_get_db_customizer_option( 'header_top_social_details' );

                foreach ( $top_social as $social ):
                    ?>
                    <a title="<?php echo esc_attr( $social[ 'title' ] ) ?>" href="<?php echo esc_url( $social[ 'link' ] ) ?>">
                        <span class="social-icon"><i class="<?php echo esc_attr( $social[ 'icon' ] ) ?>"></i></span>
                    </a>
                    <?php
                endforeach;
            endif;
            ?>

        </li>
    </ul>
</div><!--/ Top social end -->