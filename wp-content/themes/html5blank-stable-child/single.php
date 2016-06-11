<?php get_header(); ?>

	<main role="main">
	<!-- section -->
	<div class="catagory-single">

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			<div class="crumbs">
				<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
				<span><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></span>
			</div>

			<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
					<?php the_post_thumbnail(); // Fullsize image for the single post ?>
				</a>
			<?php endif; ?>

			<?php the_content(); // Dynamic Content ?>

			<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
				
		</section>
		<!-- /article -->

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<section>
				
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</section>
		<!-- /article -->

	<?php endif; ?>

	</div>
	<!-- /section -->
	</main>

<?php get_footer(); ?>
