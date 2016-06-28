<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
			
				<?php the_post_thumbnail(array(250,250)); // Declare pixel size you need inside the array ?>
			
		<?php endif; ?>
		<!-- /post thumbnail -->

		<article class="archive-blog-post-page">
			<h3>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h3>
			<!-- /post title -->

			<!-- post details -->
			<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
			<!-- /post details -->

			<?php html5wp_excerpt('html5wp_index'); // Build your custom callback length in functions.php ?>
		</article>

	</section>

<?php endwhile; ?>

<?php else: ?>

	<article>
		<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>
	</article>

<?php endif; ?>