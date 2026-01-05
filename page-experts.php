<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Experts Template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pmd
 */

get_header();
?>
<!------------------------------------
	Section || Title
-------------------------------------->
<div class="inner-page-title">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 inner-page-top">
				<h1 class="h2 text-white"><?php wp_title(''); ?></h1>
			</div>
		</div>
	</div>	
</div>
<!-- END Section || Title -->

<!------------------------------------
	Section || Experts
-------------------------------------->
<section class="experts-section border-bottom section">
	<div class="container">
		<div class="row">
			<?php $args = array('post_type' => 'experts', 'posts_per_page' => -1, 'order' => 'asc'); ?>
			<?php $the_query = new WP_Query($args); ?>		
			<?php if ($the_query->have_posts()) : ?>
			<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				<div class="col-lg-3 col-md-6 d-flex">
					<div class="card pmd-card pmd-content-equal">
						<?php $avatarImageUrl = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
						<?php $avatarImageAlt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); ?>
						<a class="pmd-card-media pmd-avatar-overlay" href="#expert-profile-modal-<?php the_ID();?>" data-target="#expert-profile-modal-<?php the_ID();?>" data-toggle="modal">
							<div class="pmd-card-media-blur" style="background-image:url(<?php echo $avatarImageUrl; ?>);"></div>
							<?php if(has_post_thumbnail($post->ID) ) :?>
								<img class="pmd-avatar-img rounded-circle" src="<?php echo $avatarImageUrl; ?>" alt="<?php echo $avatarImageAlt; ?>">
							<?php else: ?>
									<img class="pmd-avatar-img rounded-circle" src="<?php echo get_template_directory_uri(); ?>/assets/images/user_placeholder.jpg" alt="Avatar Placeholder">
							<?php endif;?>
						</a>
						<div class="pmd-content-wrapper text-center">
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

					<!-- Profile Modal -->
					<div tabindex="-1" class="modal pmd-modal" id="expert-profile-modal-<?php the_ID();?>" style="display: none;" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content card pmd-card m-0">
								<div class="modal-header pmd-modal-border">
									<div class="pmd-card-media mr-3">
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

				</div>
			<?php wp_reset_postdata(); ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
<!-- END Section || Experts -->

<?php
//get_sidebar();
get_footer();
