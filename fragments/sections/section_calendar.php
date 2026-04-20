<?php
$title     = get_sub_field( 'title' );
$content = get_sub_field( 'content' );
?>

<section id="cal-section" class="section">
    <div class="section__head">
        <div class="container">
            <h2 class="section__title">
                <?php echo $title; ?>
            </h2><!-- /.section__title -->
        </div><!-- /.container -->
    </div><!-- /.section__head -->

    <div class="section__body">
        <div class="container">
            <?php echo $content; ?>
        </div><!-- /.container -->
    </div><!-- /.section__body -->
</section><!-- /.section -->

<style>
    #cal-section .tribe-events .tribe-events-l-container { padding-top: 0px; padding-bottom: 0px; min-height: auto; }
</style>