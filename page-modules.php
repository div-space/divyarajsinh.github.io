<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Modules Template
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
	Section || Modules
-------------------------------------->
<section class="upcomingModules border-bottom section">
	<div class="container">
		<div class="row">
			<?php $args = array('post_type' => 'upcoming_modules', 'posts_per_page' => -1, 'order' => 'asc'); ?>
			<?php $the_query = new WP_Query($args); ?>
			<?php if ($the_query->have_posts()) : ?>
			<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
				
			<!-- Upcoming Events -->
			<div class="col-lg-4 col-md-6 d-flex">
				<div class="card pmd-card pmd-content-equal">
					<?php $eventImageUrl = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
					<?php $eventImageAlt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true); ?>
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
		</div>
	</div>
</section>
<!-- END Section || Modules -->

<?php
//get_sidebar();
get_footer();
