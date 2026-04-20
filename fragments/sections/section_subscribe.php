<?php
$hide_block = get_sub_field( 'hide_block' );
$text = get_sub_field( 'text' );
$content = get_field( 'subscribe_form_content', 'option' );
?>

<?php if (!$hide_block) { ?>
    <section class="callout section-subscribe fadeup animate">
        <div class="container">
            <div class="section__inner">
                <div class="row center-flex">
                    <?php if (!empty($text)) : ?>
                        <div class="col-sm-12 col-sm-12 col-md-12 col-lg-5">
                            <div class="section__content">
                                <?php echo crb_content($text); ?>

                                <a href="#" class="btn btn-dark btn-form-modal"><span>Subscribe</span></a>
                            </div><!-- /.section__content -->
                        </div><!-- /.col-sm-12 col-sm-12 col-md-12 col-lg-6 -->
                    <?php endif; ?>
                </div><!-- /.row -->
            </div><!-- /.section__inner -->
        </div><!-- /.container -->
    </section><!-- /.section-subscribe -->

    <div class="modal modal--form-secondary">
        <div class="modal__body">
            <a href="#" class="btn-close-modal">
                <span></span>
                <span></span>
            </a>

            <div class="hide-after">
                <?php echo crb_content($content); ?>
            </div>

            <div class="form-modal">
                <?php crb_render_gform(39, true); ?>
            </div><!-- /.form-modal -->
        </div><!-- /.modal__body -->
    </div><!-- /.modal -->
<?php } ?>

