<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pmd
 */

?>

</div>
<!-- End content -->


<!-------------------------------
		Section || Contact
-------------------------------->
<?php if (get_query_var('pagename') !== 'contact'): ?>
<section class="pmd-contact-section bg-primary text-white">
	<?php if (have_rows('contact_section', 'option')) : ?>
		<?php while (have_rows('contact_section', 'option')) : the_row(); ?>
			<div class="container">
				<div class="row">
					<div class="col-lg-5 pmd-contact-info py-5">
						<div class="pmd-contact-address">
							<h3 class="mb-2 text-white"><?php the_sub_field('heading_text'); ?></h3>
							<div class="title-separator mb-2"></div>
							<?php if (have_rows("location", "option")) :
									while (have_rows("location", "option")) : the_row(); ?>
							<?php the_sub_field('contact_address'); ?>
							<?php endwhile;
							endif;
							?>
							<p>
								<?php if (have_rows("contact_email", "option")) :
									while (have_rows("contact_email", "option")) : the_row(); ?>
										<?php the_sub_field('contact_email_label', 'option'); ?> : <a href="mailto:<?php the_sub_field('contact_email_address', 'option'); ?>"><?php the_sub_field('contact_email_address', 'option'); ?></a>
									<?php endwhile;
							endif;
							?>
							</p>
							<p class="mb-0">
								<?php if (have_rows("contact_no", "option")) :
									while (have_rows("contact_no", "option")) : the_row(); ?>
										<?php the_sub_field('contact_no_label', 'option'); ?> : <a href="tel:<?php the_sub_field('contact_telephone_no', 'option'); ?>"><?php the_sub_field('contact_telephone_no', 'option'); ?></a>
									<?php endwhile;
							endif;
							?>
							</p>
						</div>
						<?php if (have_rows('newsletter', 'option')) :
							while (have_rows('newsletter', 'option')) : the_row();
								if (get_sub_field('hide_section') == false) :
									?>
									<div class="newsletter-section">
										<h6 class="text-white text-uppercase mb-0"><?php the_sub_field('sub_title'); ?></h6>
										<h3 class="text-white"><?php the_sub_field('heading_text'); ?></h3>										
										<div class="newsletter-form">
											<?php $emailIconImage = get_sub_field('icon_image', 'option'); ?>
											<img src="<?php echo $emailIconImage['url']; ?>" alt="<?php echo $emailIconImage['alt']; ?>" class="email-icon-image">
											<?php the_sub_field('newsletter_form', 'option'); ?>
										</div>										
									</div>
								<?php endif;
						endwhile;
					endif;
					?>
					</div>
					<div class="col-lg-7 py-5">
						<div class="pmd-contact-form">
							<?php if (have_rows('get_in_touch', 'option')) :
								while (have_rows('get_in_touch', 'option')) : the_row();
									?>
									<h3 class="mb-0 text-white font-weight-normal"><?php the_sub_field('title'); ?></h3>
									<p><?php the_sub_field('subtitle'); ?></p>
									<div class="title-separator"></div>
									<?php the_sub_field('get_in_touch_form', 'option'); ?>
								<?php endwhile;
						endif;
						?>
						</div>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</section>
<?php endif; ?>
<!-- END Section || Contact -->

<!-------------------------------
	Section || Footer
-------------------------------->
<footer class="pmd-footer bg-dark pmd-footer-dark footer-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">

				<!-- Footer Menu -->
				<?php wp_nav_menu(array(
					'container_class' => '',
					'theme_location' => 'footer',
					'menu_class'      => 'pmd-footer-nav pmd-footer-nav-divider justify-content-center',
					'depth'           => 1,
				));
				?>

				<!-- Site Information -->
				<div class="pmd-site-info pmd-copyright-text">&copy;
					<?php if (have_rows('copyright_option', 'option')) :
						while (have_rows('copyright_option', 'option')) : the_row();
							if (get_row_layout() == 'copyright_text') : ?>
								<?php $copyrighttext = the_sub_field('text'); ?>
							<?php endif;
					endwhile;
				endif;
				?>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- END Section || Footer -->

</div>
<!-- End Page -->

<?php wp_footer(); ?>
<script>
	$(document).ready(function() {
		$(".city-dropdown .dropdown-menu .dropdown-item").click(function(){
			$(".city-dropdown .dropdown-menu .dropdown-item").removeClass("active");
			$(this).addClass("active");
			$(".dropdown-selected").text($(this).text());
			$(".dropdown-selected").val($(this).text());
		});


		$(".close-propeller-topbar").on("click",function() {
			$('body').addClass('hidden-propeller');
			$('.propeller-topbar').hide();
			$('body').removeClass('propeller-topbar-body');
		});
	});
	
	$(window).on("scroll",function() {
		// On Scroll Remove Propeller Topbar
		var pageScroll = $(this).scrollTop();
		var IntroScroll = $("header.fixed-top").height();
		if (pageScroll > IntroScroll) {
			$('.propeller-topbar').slideUp();
			$('body').removeClass('propeller-topbar-body');
		} else {
			if ($('body').hasClass('hidden-propeller')){
				$('.propeller-topbar').slideUp();
				$('body').removeClass('propeller-topbar-body');	
			} else {
				$('.propeller-topbar').show();
				$('body').addClass('propeller-topbar-body');
			};
		}
	});
	</script>
</body>

</html>