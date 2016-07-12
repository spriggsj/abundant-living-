<?php get_header(); ?>

	<div class="container">
		<div class="row main-content">
			<div class="health">

				<?php $loop = new WP_Query( array( 'post_type' => 'health_posts', 'posts_per_page' => 10 ) ); ?>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<div class="health-title">

							<h1><?php the_title(); ?></h1>
							<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
							<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>

							
						<?php echo'</div>';
						
						echo '<div class="health-img">' ;
							the_post_thumbnail();
							the_content();
						echo '</div>';
					<? php comments_template(); ?>
					endwhile; endif;

				?>
				
			</div>				


						</div>

						<div class="health-img">
							<?php the_post_thumbnail(); ?>
							<?php the_content(); ?>
							<?php comments_template(); ?>
						</div>
					<?php
					endwhile; endif;

				?>

			</div>
>>>>>>> 81c51c629b1c1d73940257c213c3a6600c8a2cd7
		</div>
	</div>

<?php get_footer(); ?>
