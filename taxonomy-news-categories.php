<?php
$index   = 0;
$counter = 0;
$args = array(
               'taxonomy' => 'news-categories',
               'orderby' => 'name',
               'order'   => 'ASC'
           );

$cats = get_categories($args);
?>
<style type="text/css">
	.archive-class{
		color: #888888!important;
	}
</style>
<div class="main">
	<div class="section">
		<div class="section__head text-center">
			<div class="container">
				<h3 class="section__title">
					<?php $term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
						  echo $term->name; 
				 	?>
				</h3>
				<span class="cat_list_archive">
					<?php _e( 'Categories:', 'sage' ); ?>
					<a href="<?php echo site_url();?>/news"><?php _e( 'All', 'sage' ); ?></a>
					<?php 
						foreach($cats as $cat) {
						?>
						      <a href="<?php echo get_category_link( $cat->term_id ) ?>" class="<?php if($cat->slug == get_query_var('term')) echo "archive-class";?>">
						           <?php echo $cat->name; ?>
						      </a>
						<?php
						   }
					?>				
				</span>
			</div><!-- /.container -->
		</div><!-- /.section__head -->

		<div class="section__body">
			<div class="container-fluid search-results">
				<?php if ( have_posts() ) : ?>
					<div class="">
						<?php while (have_posts()) : the_post(); ?>
							<?php
							if ( $index % 3 === 0 ) {
								$counter++;
							}
							$current_post_id = get_the_ID();
							$imgUrl = wp_get_attachment_url( get_field('single_background',$current_post_id) );
							?>

							<div class="col-sm-12 col-md-12 fadeup animate seacrh-result" data-group="<?php echo esc_attr( $counter ); ?>">
								<div class="profile container">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-md-3">
												<?php if($imgUrl): ?>
												<img class="profile__image" src="<?=$imgUrl?> " alt="">
											<?php endif; ?>
											</div>
											<div class="col-md-9">
												<div class="profile__content">
													<h5>
														<a href="<?php the_permalink(); ?>">
															<?php the_title(); ?>
														</a>
													</h5>
													<?php 
													$terms = get_the_terms( $current_post_id, 'news-categories' ); 
													if($terms){
														$term_list = "- Category: ";
														foreach ($terms as $term) {
															$term_name = $term->name;
															$term_url = get_term_link($term->slug, 'news-categories');
															$term_list.= '<a href="' .$term_url.'">'.$term_name.'</a> ';  
														}
													}
													?>
													<span class="date_cat_list">
														<?php 
														echo get_the_date('m/d/Y').' '.$term_list;
														?>
													</span>
													<?php the_excerpt(); ?>
													<p class="read-more"><a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'sage' ); ?></a></p>
												</div><!-- /.profile__content -->												
											</div>
										</div>
									</div>
								</div><!-- /.profile -->
							</div><!-- /.col-sm-12 col-md-3 -->

							<?php $index++; ?>
						<?php endwhile; ?>
					</div><!-- /.row -->

					<?php
					carbon_pagination('posts', array(
						'wrapper_before'         => '<ul class="paging d-flex justify-content-center">',
						'wrapper_after'          => '</ul>',
						'enable_prev'            => false,
						'enable_next'            => false,
						'enable_numbers'         => true,
						'numbers_wrapper_before' => '',
						'numbers_wrapper_after'  => '',
						'current_number_html'    => '<li class="active"><a href="{URL}">{PAGE_NUMBER}</a></li>',
					) );
					?>
					<?php else : ?>
						<div class="error-message">
							<h4>
								<?php _e( 'Sorry, no posts matched your search criteria', 'sage' ); ?>
							</h4>

							<?php get_search_form(); ?>
						</div><!-- /.error-message -->
					<?php endif; ?>
					<?php get_template_part('common-subscribeform'); ?>
				</div><!-- /.container -->
			</div><!-- /.section__body -->
	</div><!-- /.section -->
</div><!-- /.main -->
