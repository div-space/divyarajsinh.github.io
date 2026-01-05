<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
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

<section class="section">
	<div class="container">
		<div id="primary" class="content-area row">
			<main id="main" class="site-main col-lg-12">
				<?php
				while (have_posts()) :
					the_post();
					get_template_part('template-parts/content', 'page');
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif;
				endwhile; // End of the loop.
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</section>
<?php
//get_sidebar();
get_footer();
