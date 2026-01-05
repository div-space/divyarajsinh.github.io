<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *	
 * Template Name: Contact Template
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pmd
 */

get_header();
?>

<?php if (have_rows('contact_section', 'option')) : ?>
	<?php while (have_rows('contact_section', 'option')) : the_row(); ?>

		<!----------------------------
			Google Map
		----------------------------->
		<?php if (have_rows("location", "option")) :
			while (have_rows("location", "option")) : the_row(); ?>
				<?php $location = get_sub_field('location_map', 'option');
				if (!empty($location)) : ?>
					<div class="acf-map">
						<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- End Goole Map -->

		<!----------------------------
			Contact Form
		----------------------------->
		<div class="container">
			<div class="row">
				<div class="col-lg-10 mx-auto contact-form">
					<div class="card pmd-card">
						<div class="row no-gutters">
							<div class="col-lg-8">
								<div class="card-header">
								<?php  while (the_flexible_field('contact_sections')) : ?>
									<?php if (get_row_layout() == "introduction_section") : ?>
										<h2><?php the_sub_field('section_title'); ?></h2>
										<p class="card-subtitle"><?php the_sub_field('description_text'); ?></p>
									<?php endif; ?>
								<?php endwhile; ?>
								</div>
								<div class="card-body">
									<?php if (have_rows('get_in_touch', 'option')) :
										while (have_rows('get_in_touch', 'option')) : the_row(); ?>
											<?php the_sub_field('get_in_touch_form', 'option'); ?>
										<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>

							<div class="col-lg-4 bg-secondary text-white address-list">
								<div class="card-body">

									<!-- Address, Email and Contact No -->
									<ul class="list-group pmd-list mb-5">
										<?php if (have_rows("location", "option")) :
											while (have_rows("location", "option")) : the_row(); ?>
												<li class="list-group-item d-flex flex-row">
													<i class="material-icons pmd-list-icon"><?php the_sub_field("material_icon", "option"); ?></i>
													<div class="media-body"><?php the_sub_field('contact_address'); ?></div>
												</li>
											<?php endwhile; ?>
										<?php endif; ?>
										<?php if (have_rows("contact_email", "option")) :
											while (have_rows("contact_email", "option")) : the_row(); ?>
												<li class="list-group-item d-flex flex-row">
													<i class="material-icons pmd-list-icon"><?php the_sub_field("contact_email_icon", "option"); ?></i>
													<div class="media-body"><a href="mailto:<?php the_sub_field("contact_email_address", "option"); ?>" class="text-white"><?php the_sub_field("contact_email_address", "option"); ?></a></div>
												</li>
											<?php endwhile; ?>
										<?php endif; ?>
										<?php if (have_rows("contact_no", "option")) :
											while (have_rows("contact_no", "option")) : the_row();
												?>
												<li class="list-group-item d-flex flex-row">
													<i class="material-icons pmd-list-icon"><?php the_sub_field("contact_no_icon", "option"); ?></i>
													<div class="media-body"><a href="tel:<?php the_sub_field("contact_telephone_no", "option"); ?>" class="text-white"><?php the_sub_field("contact_telephone_no", "option"); ?></a></div>
												</li>
											<?php endwhile; ?>
										<?php endif; ?>
									</ul>

									<!-- Social Icons -->
									<?php if (have_rows("social_icons", "option")) :
											while (have_rows("social_icons", "option")) : the_row(); ?>
									<div class="social-icons">
										<p><?php the_sub_field("heading_text"); ?></p>
										<a href="<?php the_field("facebook", "option"); ?>" target="_blank" class="pmd-list-icon pmd-icon-md">
											<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 49.7 49.7" style="enable-background:new 0 0 49.7 49.7;" xml:space="preserve">
												<style type="text/css">
													.st0 { fill: #FFFFFF;}
												</style>
												<g>
													<g>
														<path class="st0" d="M24.8,0.8c-13.2,0-24,10.8-24,24c0,13.2,10.8,24,24,24c13.2,0,24-10.8,24-24C48.8,11.6,38.1,0.8,24.8,0.8z
			 								M30.8,25.7h-3.9c0,6.2,0,13.9,0,13.9h-5.8c0,0,0-7.6,0-13.9h-2.8v-4.9h2.8v-3.2c0-2.3,1.1-5.8,5.8-5.8l4.3,0v4.8c0,0-2.6,0-3.1,0
											s-1.2,0.3-1.2,1.3v2.9h4.4L30.8,25.7z" />
													</g>
												</g>
											</svg>
										</a>
										<a href="<?php the_field("linkedin", "option"); ?>" target="_blank" class="pmd-list-icon pmd-icon-md">
											<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
												<style type="text/css">
													.st1 { fill: #FFFFFF; }
												</style>
												<path class="st1" d="M256,15.5C123.2,15.5,15.5,123.2,15.5,256S123.2,496.5,256,496.5S496.5,388.8,496.5,256S388.8,15.5,256,15.5z
	 								M186.1,379.1h-58.6V202.9h58.6V379.1z M156.8,178.8h-0.4c-19.7,0-32.4-13.5-32.4-30.4c0-17.3,13.1-30.4,33.1-30.4
									s32.4,13.2,32.7,30.4C190,165.3,177.3,178.8,156.8,178.8z M397.3,379.1h-58.6v-94.3c0-23.7-8.5-39.8-29.7-39.8
									c-16.2,0-25.8,10.9-30,21.4c-1.5,3.8-1.9,9-1.9,14.3v98.4h-58.6c0,0,0.8-159.7,0-176.2h58.6v24.9c7.8-12,21.7-29.1,52.8-29.1
									c38.5,0,67.4,25.2,67.4,79.3V379.1z" />
											</svg>
										</a>
										<a href="<?php the_field("instagram", "option"); ?>" target="_blank" class="pmd-list-icon pmd-icon-md">
											<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
												<style type="text/css">
													.st2 { fill: #ec5d57; }
													.st3 { fill: #FFFFFF; }
												</style>
												<circle class="st2" cx="255.7" cy="256" r="181.3" />
												<path class="st3" d="M303.1,256c0,26-21.1,47.1-47.1,47.1S208.9,282,208.9,256s21.1-47.1,47.1-47.1S303.1,230,303.1,256z" />
												<path class="st3" d="M366.1,172.7c-2.3-6.1-5.9-11.7-10.6-16.2c-4.6-4.7-10.1-8.3-16.2-10.6c-5-1.9-12.5-4.2-26.2-4.9
					c-14.9-0.7-19.4-0.8-57.1-0.8c-37.7,0-42.2,0.1-57.1,0.8c-13.8,0.6-21.3,2.9-26.2,4.9c-6.1,2.3-11.7,5.9-16.2,10.6
					c-4.7,4.6-8.3,10.1-10.6,16.2c-1.9,5-4.2,12.5-4.9,26.2c-0.7,14.9-0.8,19.4-0.8,57.1c0,37.7,0.1,42.2,0.8,57.1
					c0.6,13.8,2.9,21.2,4.9,26.2c2.3,6.1,5.9,11.7,10.6,16.2c4.6,4.7,10.1,8.3,16.2,10.6c5,1.9,12.5,4.2,26.2,4.9
					c14.9,0.7,19.4,0.8,57.1,0.8c37.7,0,42.2-0.1,57.1-0.8c13.8-0.6,21.3-2.9,26.2-4.9c12.3-4.8,22.1-14.5,26.8-26.8
					c1.9-5,4.2-12.5,4.9-26.2c0.7-14.9,0.8-19.4,0.8-57.1c0-37.7-0.1-42.2-0.8-57.1C370.4,185.1,368.1,177.7,366.1,172.7z M256,328.5
					c-40.1,0-72.5-32.5-72.5-72.5s32.5-72.5,72.5-72.5c40.1,0,72.5,32.5,72.5,72.5S296.1,328.5,256,328.5z M331.4,197.5
					c-9.4,0-17-7.6-17-17s7.6-17,17-17s17,7.6,17,17C348.4,190,340.8,197.5,331.4,197.5z" />
												<path class="st3" d="M256,10C120.2,10,10,120.2,10,256s110.2,246,246,246s246-110.2,246-246S391.8,10,256,10z M396.4,314.2
					c-0.7,15-3.1,25.3-6.6,34.3c-7.3,19-22.3,34-41.3,41.3c-9,3.5-19.3,5.9-34.3,6.6c-15.1,0.7-19.9,0.9-58.2,0.9
					c-38.4,0-43.2-0.2-58.2-0.9c-15-0.7-25.3-3.1-34.3-6.6c-9.4-3.5-18-9.1-25-16.3c-7.2-7.1-12.7-15.6-16.3-25
					c-3.5-9-5.9-19.3-6.6-34.3c-0.7-15.1-0.9-19.9-0.9-58.2s0.2-43.2,0.9-58.2c0.7-15,3.1-25.3,6.6-34.3c3.5-9.4,9.1-18,16.3-25
					c7.1-7.2,15.6-12.7,25-16.3c9-3.5,19.3-5.9,34.3-6.6c15.1-0.7,19.9-0.9,58.2-0.9s43.2,0.2,58.2,0.9c15,0.7,25.3,3.1,34.3,6.6
					c9.4,3.5,18,9.1,25,16.3c7.2,7.1,12.7,15.6,16.3,25c3.5,9,5.9,19.3,6.6,34.3c0.7,15.1,0.8,19.9,0.8,58.2S397.1,299.2,396.4,314.2z" />
											</svg>
										</a>
									</div>
									<?php endwhile; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Contact Form -->

	<?php endwhile; ?>
<?php endif; ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoM1ePced26bN1LbtK2J0csGLq5KaQLNA"></script>
<?php
get_footer();
