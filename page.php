<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Konmi
 */

get_header(); ?>

<?php $sidebar_pages = get_theme_mod('sidebar_pages'); ?>

	<?php if ($sidebar_pages == "block") : ?>

		<div id="primary" class="row content-area">
			<main id="main" class="large-9 columns site-main " role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'page' ); ?>

					<?php
						// If comments are open or we have at least one comment, load up the comment template
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // end of the loop. ?>
			</main>

			<div class="large-3 columns">
				<div class="box">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div><!-- #primary -->

	<?php endif; ?>

	
	<?php if ($sidebar_pages == "none" || $sidebar_pages == "") : ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="row">
			  		<div class="large-8 large-centered columns">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'page' ); ?>

							<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>

						<?php endwhile; // end of the loop. ?>
					</div>
				</div>

			</main><!-- #main -->
		</div><!-- #primary -->

	<?php endif; ?>

<?php get_footer(); ?>
