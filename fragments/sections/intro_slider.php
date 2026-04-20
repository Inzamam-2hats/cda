<?php

$slider = get_sub_field( 'slider' );

if($slider) { ?>
    <div class="intro intro-slider owl-carousel">
        <?php foreach($slider as $slide) {
            $background = wp_get_attachment_image_url($slide['background'], 'crb_full_width');
            $text = $slide['text'];
            $container_width = $slide['container_width'];
            $buttons = $slide['buttons']; ?>

            <div class="container-fluid">
                <div class="intro__inner">
                    <div class="intro__image-container">
                        <div class="intro__image" style="background-image: url(<?php echo esc_url( $background ); ?>);">
                        </div><!-- /.intro__image -->
                    </div><!-- /.intro__image-container -->

                    <div class="intro__content" style="max-width: <?php echo $container_width; ?>;">
                        <?php echo crb_content( $text ); ?>

                        <?php if ( ! empty( $buttons ) ) : ?>
                            <?php foreach ( $buttons as $button ) : ?>
                                <a href="<?php echo esc_url( $button['link']['url'] ); ?>" class="btn <?php echo esc_attr( $button['type'] ); ?>" target="<?php echo esc_attr( $button['link']['target'] ); ?>">
                                    <span><?php echo esc_html( $button['link']['title'] ); ?></span>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div><!-- /.intro__content -->
                </div><!-- /.intro__inner -->
            </div><!-- /.container-fluid -->
        <?php } ?>
    </div><!-- /.intro -->

    <script>
        jQuery(document).ready(function(){
            jQuery('.owl-carousel').owlCarousel({
                items: 1,
                nav: true,
                loop: true,
                mouseDrag: false,
                touchDrag: false,
                dots: true,
                navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"]
            });
        });
    </script>
<?php } ?>