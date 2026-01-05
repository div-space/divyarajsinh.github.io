<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pmd
 */

get_header();
?>
	<div class="section-page-title cloud-bg gredient-bg text-center text-white">
		<!-- Inner Page Banner template -->
		<?php get_template_part( 'innerpage-banner'); ?>
	</div>
	<div id="primary" class="content-area section">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-8">
						<?php
							if ( have_posts() ) :

								if ( is_home() && ! is_front_page() ) :
									?>
									<?php
								endif;

								/* Start the Loop */
								while ( have_posts() ) :
									the_post();

									/*
									 * Include the Post-Type-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'excerpt' );

								endwhile;

								the_posts_navigation();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;

							?>
						
						<!-- <h1><?php //the_field('test', get_option('page_for_posts')); ?></h1> -->

					</div>
					
					<!-- Blog Side bar -->
					<div class="col-4">
						<?php get_sidebar(); ?>
					</div><!-- END - Blog Side bar -->
				</div>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
