<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 *
 * @package Propeller Theme
 * @author Propeller
 * @link https://propeller.in/
 */

get_header(); ?>

<?php if (is_front_page()) : ?>
	<!-- check if the flexible content field has sections of data -->

<?php if (have_rows('sections')) : ?>
<?php while (have_rows('sections')) : the_row(); ?>



<?php if(get_row_layout() == "introduction_section"): ?>
		<!------------------------------------
			Section || Introduction
		-------------------------------------->
		<?php if (have_rows('introduction_fields')) :
			while (have_rows('introduction_fields')) : the_row();
				$intro_bg = get_sub_field('background_image');
				if (get_sub_field('hide_section') == false) :
				?>
				<div class="pmd-intro-bg-img intro-section" style="background-image:url('<?php echo $intro_bg['url']; ?>');">
					<div class="container">
						<div class="row">
							<div class="mx-auto col-lg-6 d-flex align-items-center intro-wrapper">
								<div class="pmd-card intro-card text-center">
									<!-- Section Title -->
									<h1 class="text-primary"><?php the_sub_field('heading_text'); ?></h1>

									<p><?php the_sub_field('description_text'); ?></p>
									<a href="<?php the_sub_field("button_url"); ?>" class="btn btn-secondary pmd-btn-raised pmd-ripple-effect <?php the_sub_field('button_size'); ?>">
										<?php the_sub_field('button_label'); ?>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- END Section || Introduction -->

		<?php elseif(get_row_layout() == "join_impactery_section"): ?>
		<!------------------------------------
			Section || Join Impactery 
		-------------------------------------->
		<?php if (have_rows('join_impactery_now')) :
			while (have_rows('join_impactery_now')) : the_row();
			if (get_sub_field('hide_section') == false) :
				?>
				<section class="questionnaire border-bottom">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-4 offset-lg-1 col-md-12 py-lg-5">
								<!-- Single line list with Icon -->
								<?php if (have_rows('question_list')) : ?>
									<ul class="list-group pmd-list">
										<?php while (have_rows('question_list')) : the_row();	?>
											<li class="list-group-item d-flex flex-row">
												<i class="pmd-icon-img pmd-avatar-list-img d-flex">
													<?php $iconImage =  get_sub_field('join_question_icon'); ?>
													<img src="<?php echo $iconImage['url']; ?>" alt="<?php echo $iconImage['alt']; ?>" class="img-fluid">
												</i>
												<h4 class="media-body text-primary align-self-center mb-0"><?php the_sub_field('question_name', 'option'); ?></h4>
											</li>
										<?php endwhile; ?>
									</ul>
								<?php endif; ?>
							</div>
							<div class="col-lg-6 offset-lg-1 text-white pl-lg-5 col-md-12 question-content py-lg-5">
								<!-- Section Title -->
								<h2 class="text-white"><?php the_sub_field('heading_text', 'option'); ?></h2>
								<p class="lead mb-4"><?php the_sub_field('description_text', 'option'); ?></p>
								<a href="<?php the_sub_field('button_url', 'option'); ?>" class="btn pmd-btn-raised pmd-ripple-effect btn-white text-secondary <?php the_sub_field('button_size', 'option'); ?>">
									<?php the_sub_field('button_label', 'option'); ?>
								</a>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- END Section || Join Impactery  -->		
		
		<?php elseif(get_row_layout() == "upcoming_modules_section"): ?>
		<!------------------------------------
			Section || Upcoming Modules
		-------------------------------------->
		<?php if (have_rows('upcoming_modules')) :
			while (have_rows('upcoming_modules')) : the_row();
			if (get_sub_field('hide_section') == false) :
			?>
			<section class="upcomingModules section border-bottom" style="background:<?php the_sub_field('background_color', 'option') ?>;">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">

							<!-- Section Title -->
							<h2 class="text-secondary text-center section-title"><?php the_sub_field('heading_text', 'option') ?></h2>
						</div>
						<?php $args = array('post_type' => 'upcoming_modules', 'posts_per_page' => 3, 'order' => 'asc');
						$the_query = new WP_Query($args);
						?>
						<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

								<!-- Upcoming Events -->
								<div class="col-lg-4 d-flex">
									<div class="card pmd-card pmd-content-equal">
										<?php $eventImageUrl = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail');
										$eventImageAlt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
										?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="pmd-card-media pmd-floating-wrapper">
											<?php if(has_post_thumbnail($post->ID) ) :?>
												<img class="card-img-top" src="<?php echo $eventImageUrl; ?>" alt="<?php echo $eventImageAlt; ?>">											
											<?php  else: ?>
												<img class="card-img-top" src="<?php echo get_template_directory_uri(); ?>/assets/images/card_placeholder.jpg" alt="Placeholder Image">
											<?php endif;?>
											<span class="floating-content-date">
												<?php $moduleDate = get_field('select_date');
													$moduleDate = new DateTime($moduleDate); ?>
												<?php echo $moduleDate->format('M'); ?>
												<i><?php echo $moduleDate->format('d'); ?></i>
											</span>
										</a>
										<div class="pmd-content-wrapper">
											<div class="card-body">
												<h5 class="card-title text-primary"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="text-primary"><?php the_title(); ?></a></h5>
												<?php
												$price = get_field('price');
												if ($price === "free") :
													$badgeColor = 'outlineBadges-badge-primary';
												else :
													$badgeColor = 'outlineBadges-badge-secondary';
												endif;
												?>
												<span class="outlineBadges text-uppercase <?php echo $badgeColor;  ?>"><?php the_field('price') ?></span>
												<?php the_excerpt(); ?>
											</div>
											<div class="card-footer">
												<button title="Add to Favourite" class="btn btn-sm pmd-ripple-effect btn-outline-primary pmd-btn-fab" data-toggle="button"><i class="material-icons pmd-sm">star_border</i></button>
												<a href="<?php the_field('button_url') ?>" class="btn pmd-btn-raised pmd-ripple-effect btn-secondary ml-2"><?php the_field('button_label') ?></a>
											</div>
										</div>
									</div>
								</div>

								<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>
							<?php  endif; ?>
						<div class="col-sm-12 text-center">
							<a href="<?php the_sub_field('button_url'); ?>" class="btn btn-outline-secondary pmd-ripple-effect <?php the_sub_field('button_size') ?>"><?php the_sub_field('button_label') ?></a>
						</div>
					</div>
				</div>
			</section>
			<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- END Section || Upcoming Modules -->

		<?php elseif(get_row_layout() == "startup_reviews_section"): ?>
		<!------------------------------------
			Section || Startup Reviews
		-------------------------------------->
		<?php if (have_rows('startup_reviews')) :
			while (have_rows('startup_reviews')) : the_row();
			if (get_sub_field('hide_section') == false) :
			?>
			<?php $backgroundImg = get_sub_field('background_image'); ?>
			<section class="startUpReview section border-bottom" style="background-image:url('<?php echo $backgroundImg['url']; ?>');">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 mx-auto text-center">

							<!-- Section Title -->
							<h2 class="text-white section-title"><?php the_sub_field('heading_text', 'option') ?></h2>

							<!-- Reviews Owl Carousel -->
							<div id="slider-carousel" class="owl-carousel owl-theme slider-carousel outside-dots">
								<?php $args = array('post_type' => 'startup_reviews', 'posts_per_page' => -1, 'order' => 'asc');
								$the_query = new WP_Query($args);
								?>
								<?php if ($the_query->have_posts()) : ?>
									<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
										<?php $userImage = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
										<div class="item">
											<div class="mb-4">
												<?php the_content(); ?>
											</div>
											<img src="<?php echo $userImage; ?>" class="pmd-avatar-list-img" alt="Avatar image">
											<h5 class="text-white mb-0"><?php the_title(); ?></h5>
										</div>
										<?php wp_reset_postdata(); ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- END Section || Startup Reviews -->
		
		<?php elseif(get_row_layout() == "booster_packs_section"): ?>
		<!------------------------------------
			Section || Booster Packs
		-------------------------------------->
		<?php if (have_rows('booster_packs')) :
			while (have_rows('booster_packs')) : the_row();
			if (get_sub_field('hide_section') == false) :
			?>
			<section class="boosterPacks border-bottom section">
				<div class="container">
					<div class="row">
						<div class="col-lg-9 mx-auto text-center section-title">

							<!-- Section Title -->
							<h2 class="text-secondary"><?php the_sub_field('heading_text'); ?></h2>
							<p class="mb-0"><?php the_sub_field('description_text'); ?></p>
						</div>
					</div>
					<div class="row justify-content-center">
						<?php if (have_rows('booster_packs_list')) :
							while (have_rows('booster_packs_list')) : the_row();
								?>

								<!-- Booster Models -->
								<div class="col-md-6 col-lg-4 text-center d-flex">
									<?php if (get_sub_field('recommended_model') == true) : ?>
										<div class="card pmd-card pmd-content-equal text-center model-basic model-recommended">
										<?php else : ?>
											<div class="card pmd-card pmd-content-equal text-center model-basic">
											<?php endif; ?>
											<div class="pmd-card-media">
												<?php $modelImage = get_sub_field('icon_image', 'option') ?>
												<?php if($modelImage) :?>
													<img src="<?php echo $modelImage['url'] ?>" class="img-fluid" alt="<?php echo $modelImage['alt'] ?>">
												<?php else: ?>
													<img src="<?php echo get_template_directory_uri(); ?>/assets/images/booster_placeholder.png" class="img-fluid" alt="Placeholder Image">
												<?php endif; ?>
											</div>
											<hr class="card-divider">
											<div class="pmd-content-wrapper">
												<div class="card-body">
													<?php if (get_sub_field('recommended_model') == true) : ?>
														<h5 class="card-title text-uppercase text-primary"><?php the_sub_field('title'); ?></h5>
													<?php else : ?>
														<h5 class="card-title text-uppercase text-secondary"><?php the_sub_field('title'); ?></h5>
													<?php endif; ?>
													<p class="card-text"><?php the_sub_field('description'); ?></p>
												</div>
												<div class="card-footer">
													<?php if (get_sub_field('recommended_model') == true) : ?>
														<a href="<?php the_sub_field('button_url'); ?>" class="btn pmd-btn-raised pmd-ripple-effect btn-primary"><?php the_sub_field('button_label') ?></a>
													<?php else : ?>
														<a href="<?php the_sub_field('button_url'); ?>" class="btn pmd-btn-raised pmd-ripple-effect btn-secondary"><?php the_sub_field('button_label') ?></a>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								<?php endwhile;
						endif;
						?>
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								<a href="<?php the_sub_field('button_url'); ?>" class="btn btn-outline-secondary pmd-ripple-effect <?php the_sub_field('button_size'); ?>"><?php the_sub_field('button_label'); ?></a>
							</div>
						</div>
					</div>
			</section>
			<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- END Section || Booster Packs -->

		<?php elseif(get_row_layout() == "experts_section"): ?>
		<!------------------------------------
			Section || Experts
		-------------------------------------->
		<?php if (have_rows('experts')) :
			while (have_rows('experts')) : the_row();
			if (get_sub_field('hide_section') == false) :
			?>
			<section class="experts-section border-bottom section" style="background: <?php the_sub_field('background_color'); ?>;">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<!-- Section Title -->
							<h2 class="text-secondary section-title"><?php the_sub_field('heading_text'); ?></h2>

							<!-- Expert Owl Carousel -->
							<div id="card-carousel" class="owl-carousel pmd-card-carousel">
								<?php $args = array('post_type' => 'experts', 'posts_per_page' => -1, 'order' => 'asc'); ?>
								<?php $the_query = new WP_Query($args); ?>								
								<?php if ($the_query->have_posts()) : ?>
								<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
									<div class="item">
										<div class="card pmd-card pmd-content-equal">
											<?php $avatarImageUrl = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
											<?php $avatarImageAlt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); ?>
											<a class="pmd-card-media pmd-avatar-overlay" href="#expert-profile-modal-<?php the_ID();?>" data-target="#expert-profile-modal-<?php the_ID();?>" data-toggle="modal">
												<div class="pmd-card-media-blur" style="background-image:url(<?php echo $avatarImageUrl; ?>);"></div>
												<?php if(has_post_thumbnail($post->ID) ) :?>
													<img class="pmd-avatar-img rounded-circle" src="<?php echo $avatarImageUrl; ?>" alt="<?php echo $avatarImageAlt; ?>">
												<?php  else: ?>
														<img class="pmd-avatar-img rounded-circle" src="<?php echo get_template_directory_uri(); ?>/assets/images/user_placeholder.jpg" alt="Avatar Placeholder">
												<?php endif;?>												
											</a>
											<div class="pmd-content-wrapper">
											<div class="card-body">
												<h5 class="text-primary mb-2">
													<a class="text-primary" href="#expert-profile-modal-<?php the_ID();?>" data-target="#expert-profile-modal-<?php the_ID();?>" data-toggle="modal"><?php the_title(); ?></a>
												</h5>
												<p class="card-subtitle"><?php the_field('designation'); ?></p>
											</div>
												<!-- Social icons -->
												<?php  if (have_rows('social_accounts')) : ?>
												<?php while (have_rows('social_accounts')) : the_row();?>
												<div class="footer-social-icons card-footer">
													<a href="<?php the_sub_field("facebook", "option"); ?>" target="_blank" class="btn pmd-btn-fab btn-light pmd-ripple-effect pmd-social-icon btn-sm pmd-social-icon">
														<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																viewBox="0 0 96.1 96.1" style="enable-background:new 0 0 96.1 96.1;" xml:space="preserve">
															<style type="text/css">
																.st0{fill:#00435b;}
															</style>
															<g>
																<path class="st0" d="M70.6,3L58.9,3c-13.1,0-21.6,8.7-21.6,22.2v10.2H25.5c-1,0-1.8,0.8-1.8,1.8v14.8c0,1,0.8,1.8,1.8,1.8h11.7
																	v37.4c0,1,0.8,1.8,1.8,1.8h15.3c1,0,1.8-0.8,1.8-1.8V53.9H70c1,0,1.8-0.8,1.8-1.8l0-14.8c0-0.5-0.2-1-0.5-1.3
																	c-0.3-0.3-0.8-0.5-1.3-0.5H56.3v-8.7c0-4.2,1-6.3,6.4-6.3l7.9,0c1,0,1.8-0.8,1.8-1.8V4.9C72.4,3.9,71.6,3,70.6,3z"/>
															</g>
														</svg>
													</a>
													<a href="<?php the_sub_field("linkedin", "option"); ?>" target="_blank" class="btn pmd-btn-fab btn-light pmd-ripple-effect pmd-social-icon btn-sm pmd-social-icon">
														<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																viewBox="0 0 430.1 430.1" style="enable-background:new 0 0 430.1 430.1;" xml:space="preserve">
															<style type="text/css">
																.st1{fill:#00435b;}
															</style>
															<g>
																<path id="LinkedIn" class="st1" d="M424,260.2v154.5h-89.6V270.6c0-36.2-13-60.9-45.4-60.9c-24.7,0-39.5,16.7-46,32.8
																	c-2.4,5.8-3,13.8-3,21.8v150.5h-89.6c0,0,1.2-244.1,0-269.4h89.6v38.2c-0.2,0.3-0.4,0.6-0.6,0.9h0.6v-0.9
																	c11.9-18.3,33.2-44.5,80.7-44.5C379.8,139,424,177.5,424,260.2z M56.8,15.4c-30.7,0-50.7,20.1-50.7,46.5
																	c0,25.9,19.5,46.6,49.5,46.6h0.6c31.2,0,50.7-20.7,50.7-46.6C106.3,35.5,87.5,15.4,56.8,15.4z M11.4,414.7H101V145.3H11.4V414.7z"
																	/>
															</g>
														</svg>
													</a>
													<a href="<?php the_sub_field("instagram", "option"); ?>" target="_blank" class="btn pmd-btn-fab btn-light pmd-ripple-effect pmd-social-icon btn-sm pmd-social-icon">
														<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																viewBox="0 0 169.1 169.1" style="enable-background:new 0 0 169.1 169.1;" xml:space="preserve">
															<style type="text/css">
																.st2{fill:#00435b;}
															</style>
															<g>
																<path class="st2" d="M120.1,5.1H48.9C24.7,5.1,5.1,24.7,5.1,48.9v71.2c0,24.2,19.7,43.9,43.9,43.9h71.2c24.2,0,43.9-19.7,43.9-43.9
																	V48.9C164,24.7,144.3,5.1,120.1,5.1z M149.9,120.1c0,16.4-13.4,29.8-29.8,29.8H48.9c-16.4,0-29.8-13.3-29.8-29.8V48.9
																	c0-16.4,13.3-29.8,29.8-29.8h71.2c16.4,0,29.8,13.4,29.8,29.8L149.9,120.1L149.9,120.1z"/>
																<path class="st2" d="M84.5,43.6c-22.6,0-41,18.4-41,41c0,22.6,18.4,41,41,41s41-18.4,41-41C125.5,62,107.1,43.6,84.5,43.6z
																	M84.5,111.4c-14.8,0-26.9-12-26.9-26.9c0-14.8,12-26.9,26.9-26.9s26.9,12,26.9,26.9C111.4,99.3,99.3,111.4,84.5,111.4z"/>
																<path class="st2" d="M127.2,31.6c-2.7,0-5.4,1.1-7.3,3c-1.9,1.9-3,4.6-3,7.3c0,2.7,1.1,5.4,3,7.3c1.9,1.9,4.6,3,7.3,3
																	c2.7,0,5.4-1.1,7.3-3c1.9-1.9,3-4.6,3-7.3c0-2.7-1.1-5.4-3-7.3C132.6,32.7,129.9,31.6,127.2,31.6z"/>
															</g>
														</svg>
													</a>
												</div>
											<?php endwhile; ?>
											<?php endif; ?>
										</div>
										</div>
									</div>																											
								<?php wp_reset_postdata(); ?>
								<?php endwhile; ?>
								<?php endif; ?>						
							</div>

							<?php $args = array('post_type' => 'experts', 'posts_per_page' => -1, 'order' => 'asc'); ?>
							<?php $the_query = new WP_Query($args); ?>								
							<?php if ($the_query->have_posts()) : ?>
							<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
								<!-- Profile Modal -->
							<div tabindex="-1" class="modal pmd-modal" id="expert-profile-modal-<?php the_ID();?>" style="display: none;" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content card pmd-card m-0 text-left">
										<div class="modal-header pmd-modal-border">
											<div class="pmd-card-media mr-3">
											<?php $avatarImageUrl = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
											<?php $avatarImageAlt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); ?>
												<?php if(has_post_thumbnail($post->ID) ) :?>
													<img class="pmd-avatar-img rounded-circle" src="<?php echo $avatarImageUrl; ?>" alt="<?php echo $avatarImageAlt; ?>" width="100">
												<?php else: ?>
													<img class="pmd-avatar-img rounded-circle" src="<?php echo get_template_directory_uri(); ?>/assets/images/user_placeholder.jpg" alt="Avatar Placeholder" width="100">
												<?php endif;?>
											</div>
											<div class="media-body align-self-center">
												<h5 class="text-primary card-title"><?php the_title(); ?></h5>
												<p class="card-subtitle mb-2"><?php the_field('designation'); ?></p>

												<!-- Social icons -->
												<?php  if (have_rows('social_accounts')) : ?>
												<?php while (have_rows('social_accounts')) : the_row();?>
												<div class="footer-social-icons">
													<a href="<?php the_sub_field("facebook", "option"); ?>" target="_blank" class="btn pmd-btn-fab btn-light pmd-ripple-effect pmd-social-icon btn-sm pmd-social-icon">
														<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																viewBox="0 0 96.1 96.1" style="enable-background:new 0 0 96.1 96.1;" xml:space="preserve">
															<style type="text/css">
																.st0{fill:#00435b;}
															</style>
															<g>
																<path class="st0" d="M70.6,3L58.9,3c-13.1,0-21.6,8.7-21.6,22.2v10.2H25.5c-1,0-1.8,0.8-1.8,1.8v14.8c0,1,0.8,1.8,1.8,1.8h11.7
																	v37.4c0,1,0.8,1.8,1.8,1.8h15.3c1,0,1.8-0.8,1.8-1.8V53.9H70c1,0,1.8-0.8,1.8-1.8l0-14.8c0-0.5-0.2-1-0.5-1.3
																	c-0.3-0.3-0.8-0.5-1.3-0.5H56.3v-8.7c0-4.2,1-6.3,6.4-6.3l7.9,0c1,0,1.8-0.8,1.8-1.8V4.9C72.4,3.9,71.6,3,70.6,3z"/>
															</g>
														</svg>
													</a>
													<a href="<?php the_sub_field("linkedin", "option"); ?>" target="_blank" class="btn pmd-btn-fab btn-light pmd-ripple-effect pmd-social-icon btn-sm pmd-social-icon">
														<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																viewBox="0 0 430.1 430.1" style="enable-background:new 0 0 430.1 430.1;" xml:space="preserve">
															<style type="text/css">
																.st1{fill:#00435b;}
															</style>
															<g>
																<path id="LinkedIn" class="st1" d="M424,260.2v154.5h-89.6V270.6c0-36.2-13-60.9-45.4-60.9c-24.7,0-39.5,16.7-46,32.8
																	c-2.4,5.8-3,13.8-3,21.8v150.5h-89.6c0,0,1.2-244.1,0-269.4h89.6v38.2c-0.2,0.3-0.4,0.6-0.6,0.9h0.6v-0.9
																	c11.9-18.3,33.2-44.5,80.7-44.5C379.8,139,424,177.5,424,260.2z M56.8,15.4c-30.7,0-50.7,20.1-50.7,46.5
																	c0,25.9,19.5,46.6,49.5,46.6h0.6c31.2,0,50.7-20.7,50.7-46.6C106.3,35.5,87.5,15.4,56.8,15.4z M11.4,414.7H101V145.3H11.4V414.7z"
																	/>
															</g>
														</svg>
													</a>
													<a href="<?php the_sub_field("instagram", "option"); ?>" target="_blank" class="btn pmd-btn-fab btn-light pmd-ripple-effect pmd-social-icon btn-sm pmd-social-icon">
														<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
																viewBox="0 0 169.1 169.1" style="enable-background:new 0 0 169.1 169.1;" xml:space="preserve">
															<style type="text/css">
																.st2{fill:#00435b;}
															</style>
															<g>
																<path class="st2" d="M120.1,5.1H48.9C24.7,5.1,5.1,24.7,5.1,48.9v71.2c0,24.2,19.7,43.9,43.9,43.9h71.2c24.2,0,43.9-19.7,43.9-43.9
																	V48.9C164,24.7,144.3,5.1,120.1,5.1z M149.9,120.1c0,16.4-13.4,29.8-29.8,29.8H48.9c-16.4,0-29.8-13.3-29.8-29.8V48.9
																	c0-16.4,13.3-29.8,29.8-29.8h71.2c16.4,0,29.8,13.4,29.8,29.8L149.9,120.1L149.9,120.1z"/>
																<path class="st2" d="M84.5,43.6c-22.6,0-41,18.4-41,41c0,22.6,18.4,41,41,41s41-18.4,41-41C125.5,62,107.1,43.6,84.5,43.6z
																	M84.5,111.4c-14.8,0-26.9-12-26.9-26.9c0-14.8,12-26.9,26.9-26.9s26.9,12,26.9,26.9C111.4,99.3,99.3,111.4,84.5,111.4z"/>
																<path class="st2" d="M127.2,31.6c-2.7,0-5.4,1.1-7.3,3c-1.9,1.9-3,4.6-3,7.3c0,2.7,1.1,5.4,3,7.3c1.9,1.9,4.6,3,7.3,3
																	c2.7,0,5.4-1.1,7.3-3c1.9-1.9,3-4.6,3-7.3c0-2.7-1.1-5.4-3-7.3C132.6,32.7,129.9,31.6,127.2,31.6z"/>
															</g>
														</svg>
													</a>
												</div>
											<?php endwhile; ?>
											<?php endif; ?>
											</div>
											<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
										</div>
										<div class="modal-body">
											<?php the_content();?>
										</div>													
									</div>
								</div>
							</div>
							<!-- End Profile Modal -->
							<?php wp_reset_postdata(); ?>
							<?php endwhile; ?>
							<?php endif; ?>							
							<a href="<?php the_sub_field('button_url'); ?>" class="btn btn-outline-secondary pmd-ripple-effect <?php the_sub_field('button_size'); ?>"><?php the_sub_field('button_label'); ?></a>
						</div>
					</div>
				</div>
			</section>
			<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- END Section || Experts -->

		<?php elseif(get_row_layout() == "subscription_plan_section"): ?>
		<!------------------------------------
			Section || Subscription Plans
		-------------------------------------->
		<?php if (have_rows('subscription_plan')) :
			while (have_rows('subscription_plan')) : the_row();
			if (get_sub_field('hide_section') == false) :
			?>
			<section class="border-bottom section subscription-plans" id="plan-section">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h2 class="text-secondary section-title"><?php the_sub_field('heading_text'); ?></h2>
						</div>
					</div>
					<div class="row no-gutters justify-content-center">
						<?php if (have_rows('subscription_plan_list')) :
							while (have_rows('subscription_plan_list')) : the_row();
								?>
								<div class="col-lg-4 d-flex">
									<?php if (get_sub_field('recommended_plan') == true) :	?>
										<div class="card pmd-card pmd-content-equal plan-basic plan-recommended">
										<?php else : ?>
											<div class="card pmd-card pmd-content-equal plan-basic">
											<?php endif; ?>
											<div class="card-header pmd-card-border">
												<h4 class="text-primary pmd-title-separator"><?php the_sub_field('title'); ?></h4>
												<h5 class="text-uppercase text-primary card-title"><?php the_sub_field('price'); ?></h5>
												<p class="card-subtitle mb-0"><?php the_sub_field('validity'); ?></p>
											</div>
											<div class="pmd-content-wrapper">
												<ul class="list-group pmd-list">
													<?php if (have_rows('features')) :
														while (have_rows('features')) : the_row();
															?>
															<li class="list-group-item">
																<p class="pmd-list-subtitle mb-0 font-weight-medium"><?php the_sub_field('feature_label'); ?></p>
																<?php the_sub_field('short_description'); ?>
															</li>
														<?php endwhile;
												endif;
												?>
												</ul>
												<div class="card-footer">
													<?php if (get_sub_field('recommended_plan') == true) :	?>
														<a href="<?php the_sub_field('button_url'); ?>" class="btn btn-block pmd-ripple-effect btn-secondary"><?php the_sub_field('button_label'); ?></a>
													<?php else : ?>
														<a href="<?php the_sub_field('button_url'); ?>" class="btn btn-block pmd-ripple-effect btn-light text-primary"><?php the_sub_field('button_label'); ?></a>
													<?php endif; ?>
												</div>
											</div>
										</div>
									</div>
								<?php endwhile;
						endif;
						?>
						</div>
					</div>
			</section>
			<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- END Section ||  Subscription Plans -->

		<?php elseif(get_row_layout() == "community_partners_section"): ?>
		<!------------------------------------
			Section || community partners
		-------------------------------------->
		<?php if (have_rows('community_partners')) :
			while (have_rows('community_partners')) : the_row();
			if (get_sub_field('hide_section') == false) :
			?>
			<section class="community-partners section border-bottom" style="background: <?php the_sub_field('background_color'); ?>;">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">

							<!-- Section Title -->
							<h2 class="text-secondary section-title"><?php the_sub_field('heading_text'); ?></h2>

						</div>
						<?php $arg = array('post_type' => 'community_partners', 'post_per_page' => -1, 'order' => 'asc');
						$the_query = new WP_Query($arg);
						if ($the_query->have_posts()) :
							while ($the_query->have_posts()) : $the_query->the_post();
								$clientLogo = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail');
								$clientLogoAlt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
								?>
								<div class="col-lg-3 col-md-6">
									<a href="<?php the_field("url"); ?>" class="card pmd-card" target="_blank">
										<div class="card-body text-center">
											<?php if(has_post_thumbnail($post->ID) ) :?>
												<img class="img-fluid" src="<?php echo $clientLogo; ?>" alt="<?php echo $clientLogoAlt; ?>">
											<?php  else: ?>
												<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/images/client_placeholder.jpg" alt="Placeholder Image">
											<?php endif;?>
										</div>
									</a>
								</div>
							<?php endwhile;
					endif;
					?>
					</div>
				</div>
			</section>
			<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- END Section || community partners -->

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>

<?php else : ?>
	<!-- No Layouts Found -->
<?php endif; ?>

<?php get_footer(); ?>