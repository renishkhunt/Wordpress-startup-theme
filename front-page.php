<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package matwordtheme
 */

get_header();?>

	<div class="row">
		<div id="primary" class="content-area col-md-8">
			<main id="main" class="site-main" role="main">

				<?php while (have_posts()):the_post();?>

					<?php get_template_part('content', get_post_format());?>

					<?php
					    // If comments are open or we have at least one comment, load up the comment template
					    if (comments_open() || '0' != get_comments_number()):
					        comments_template();
					    endif;
				    ?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

			<div class='paggination'>
			<?php print matword_pagination(); ?>
			</div>
		</div><!-- #primary -->
		
		<div id='secondary' class='sidebar-area col-md-4'>
			<?php get_sidebar();?>
		</div>
	</div>

<?php get_footer();?>
