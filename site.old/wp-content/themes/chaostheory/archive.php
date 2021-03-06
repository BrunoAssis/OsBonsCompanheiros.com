<?php
/**
 * @package ChaosTheory
 */
?>
<?php get_header(); ?>

	<div id="container">
		<div id="content" class="hfeed">

			<?php if ( is_day() ) : ?>
				<h2 class="page-title"><?php printf( __( 'Daily Archives: %s', 'chaostheory' ), get_the_time( 'F jS, Y' ) ); ?></h2>
			<?php elseif ( is_month() ) : ?>
				<h2 class="page-title"><?php printf( __( 'Monthly Archives: %s', 'chaostheory' ), get_the_time( 'F Y' ) ); ?></h2>
			<?php elseif ( is_year() ) : ?>
				<h2 class="page-title"><?php printf( __( 'Yearly Archives: %s', 'chaostheory' ), get_the_time( 'Y' ) ); ?></h2>
			<?php elseif ( is_author() ) : ?>
				<h2 class="page-title"><?php printf( __( 'Author Archives: %s', 'chaostheory' ), get_the_author() ); ?></h2>
			<?php elseif ( is_tag() ) : ?>
				<h2 class="page-title"><?php printf( __( 'Tag Archives: %s', 'chaostheory' ), single_tag_title( '', false ) ); ?></h2>
			<?php elseif ( isset( $_GET['paged'] ) && !empty( $_GET['paged'] ) ) : ?>
				<h2 class="page-title"><?php _e( 'Archives', 'chaostheory' ); ?></h2>
			<?php endif; ?>

			<?php rewind_posts(); ?>

			<div id="nav-above" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '&laquo; Older posts', 'chaostheory' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts &raquo;', 'chaostheory' ) ); ?></div>
			</div>

			<?php while ( have_posts() ) : the_post(); ?>

			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-meta">
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<ul>
						<li class="entry-date"><a href="<?php the_permalink(); ?>"><?php printf( __( '%1$s &#8211; %2$s', 'chaostheory' ), get_the_date(), get_the_time() ); ?></a></li>
						<li class="entry-category"><?php printf( __( 'Posted in %s', 'chaostheory' ), get_the_category_list( ', ' ) ); ?></li>
						<?php the_tags( '<li class="entry-tags">' . __( 'Tagged', 'chaostheory' ) . ' ', ', ', '</li>' ); ?>
						<?php edit_post_link( __( 'Edit', 'chaostheory' ), '<li class="entry-editlink">', '</li>' ); ?>
						<li class="entry-commentlink"><?php comments_popup_link( __( 'Leave a Comment', 'chaostheory' ), __( 'Comments (1)', 'chaostheory' ), __( 'Comments (%)', 'chaostheory' ) ); ?></li>
					</ul>
				</div>
				<div class="entry-content">
					<?php the_content( '<span class="more-link">' . __( 'Read More &raquo;', 'chaostheory' ) . '</span>' ); ?>
				</div>
			</div><!-- .post -->

			<?php endwhile ?>

			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '&laquo; Older posts', 'chaostheory' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts &raquo;', 'chaostheory' ) ); ?></div>
			</div>

		</div><!-- #content .hfeed -->
	</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>