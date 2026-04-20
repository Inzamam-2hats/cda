<?php
$hide_newsletter = get_field('hide_newsletter', 'option');
if (!$hide_newsletter) { ?>

<section class="callout section-subscribe fadeup animate">
    <div class="container">
        <div class="section__inner">
            <div class="row center-flex">
                <div class="col-sm-12 col-sm-12 col-md-12 col-lg-5">
                    <div class="section__content">
                        <h4>Want to stay in touch?</h4>
                        <p>Subscribe to our quarterly newsletter to receive CDA’s latest news and updates!</p>

                        <a href="#" class="btn btn-dark btn-form-modal"><span>Subscribe</span></a>
                    </div><!-- /.section__content -->
                </div><!-- /.col-sm-12 col-sm-12 col-md-12 col-lg-6 -->
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
            <h4 style="text-align: center;">Stay In Touch</h4>
        </div>

        <div class="form-modal">
            <?php crb_render_gform( 39, true ); ?>
        </div><!-- /.form-modal -->
    </div><!-- /.modal__body -->
</div><!-- /.modal -->

<?php } ?>