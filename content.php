<?php
/**
 * @package matwordtheme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<?php the_title( sprintf( '<h1 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="post-meta">
			<?php matword_posted_on(); ?>
			
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'matwordtheme' ) );
				if ( $categories_list && matword_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( '<i class="glyphicon glyphicon-pushpin"></i> %1$s', 'matwordtheme' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'matwordtheme' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( '<i class="fa fa-tags"></i> %1$s', 'matwordtheme' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'matwordtheme' ), __( '1 Comment', 'matwordtheme' ), __( '% Comments', 'matwordtheme' ) ); ?></span>
		<?php endif; ?>

			<span class="post-edit-link">
					<?php edit_post_link( __( 'Edit', 'matwordtheme' ), '<span class="edit-link">', '</span>' ); ?>
			</span>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="post-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'matwordtheme' ) ); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'matwordtheme' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
