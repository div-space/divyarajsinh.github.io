<?php
/**
 *	Template Name: Error Page
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pmd
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-8 m-auto">
					<section class="section error-404 text-center d-flex align-items-center">
						<div class="">
							<?php
							/* get a specific post object by ID */
							$post = get_post(531);

							/* grab the url for the full size featured image */
							$featured_img_url = get_the_post_thumbnail_url($post->ID, 'full');
							$featured_img_alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
							?>
							<!-- Error Image Icon -->
							<img src="<?php echo $featured_img_url; ?>" alt="<?php echo $featured_img_alt; ?>" width="120">
							<h2><?php echo get_the_title(); ?></h2>
							<!-- Error Message Description -->
							<div class="lead description mb-0">
								<?php
								$id = 531;
								$post = get_post($id);
								$content = apply_filters('the_content', $post->post_content);
								echo $content;
								?>
							</div>
							<a class="btn pmd-ripple-effect pmd-btn-raised btn-primary" href="<?php bloginfo('url') ?>">Back to Home</a>
						</div>
					</section><!-- .error-404 -->
				</div>
			</div>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
