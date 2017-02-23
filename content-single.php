<?php
/**
 *
 * @package Konmi
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	
		  	<header class="entry-header">

				<?php the_title( '<h1 class="entry-title text-center">', '</h1>' ); ?>
				
			</header><!-- .entry-header -->

			<div class="entry-content"><!-- content - single -->
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'konmi' ),
						'after'  => '</div>',
					) );
				?>
				<?php edit_post_link( __( 'Edit', 'konmi' ), '<span class="edit-link">', '</span>' ); ?>

			</div><!-- .entry-content -->

			<div class="entry-meta"><!--single-->
					<?php konmi_posted_on(); ?>
				</div><!-- .entry-meta -->

			<footer class="entry-footer">
				<?php konmi_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		
</article><!-- #post-## -->
