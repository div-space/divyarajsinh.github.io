<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: About Template
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

<?php if (have_rows('about_sections')) : ?>
<?php while (have_rows('about_sections')) : the_row(); ?>

<?php if(get_row_layout() == "who_we_are_section"): ?>
	<!------------------------------------
		Section || Who we are
	-------------------------------------->
	<?php if (get_sub_field('hide_section') == false) :?>
	<section class="section border-bottom who-we-are">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6 text-center who-we-are-image">
					<?php $whoWeAreImage = get_sub_field('upload_image', 'option') ?>
					<img src="<?php echo $whoWeAreImage['url'] ?>" alt="<?php echo $whoWeAreImage['alt'] ?>" class="img-fluid">
				</div>
				<div class="col-lg-6">
					<h2 class="text-secondary "><?php the_sub_field('heading_text'); ?></h2>
					<p><?php the_sub_field('description_text'); ?></p>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<!-- END Section || Who we are -->
<?php endif; ?>

<?php if(get_row_layout() == "features_section"): ?>
	<!------------------------------------
		Section || About Feature
	-------------------------------------->
	<?php if (get_sub_field('hide_section') == false) :?>
	<section class="section border-bottom about-feature" style="background: <?php the_sub_field('background_color'); ?>;">
		<?php $featureImage = get_sub_field('upload_image', 'option') ?>
		<div class="feature-image d-none d-lg-block" style="background-image:url('<?php echo $featureImage['url'] ?>')"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 d-lg-none">
					<img src="<?php echo $featureImage['url'] ?>" alt="<?php echo $featureImage['alt'] ?>" class="img-fluid">
				</div>
				<div class="col-lg-6">
					<ul class="list-group pmd-list about-featurelist pmd-card-list">
						<?php if (have_rows('features_list')) : ?>
						<?php while (have_rows('features_list')) : the_row(); ?>
						<li class="list-group-item d-flex flex-row">
        					<div class="media-body text-white">
								<h5 class="text-white card-title"><?php the_sub_field('title'); ?></h5>
								<p class="mb-0"><?php the_sub_field('description'); ?></p>
							</div>
						</li>
						<?php endwhile; ?>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<!-- END Section || About Feature -->
<?php endif; ?>

<?php if(get_row_layout() == "why_choose_us_section"): ?>
	<!------------------------------------
		Section || Why We Choose
	-------------------------------------->
	<section class="section why-we-choose border-bottom" style="background: <?php the_sub_field('background_color'); ?>;">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<h2 class="text-secondary section-title"><?php the_sub_field('heading_text'); ?></h2>
				</div>
				<?php if (have_rows('benefits_list')) : ?>
				<?php while (have_rows('benefits_list')) : the_row(); ?>
				<div class="col-lg-4 col-md-6 d-flex">
					<div class="card pmd-card text-center w-100">
						<div class="card-header">
							<?php $iconImage = get_sub_field('icon_image', 'option') ?>
							<div class="pmd-icon-img pmd-avatar-list-img d-flex">
								<img src="<?php echo $iconImage['url'] ?>" alt="<?php echo $iconImage['alt'] ?>" class="img-fluid">
							</div>
						</div>
					<div class="card-body">
						<h5 class="mb-2"><?php the_sub_field('title'); ?></h5>
						<p><?php the_sub_field('description'); ?></p>
					</div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<!-- END Section || Why We Choose -->
<?php endif; ?>


<?php endwhile; ?>
<?php endif; ?>



<?php
//get_sidebar();
get_footer();
