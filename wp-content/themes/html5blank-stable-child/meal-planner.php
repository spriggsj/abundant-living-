<?php get_header(); ?>

	<div class="container">
		<div class="row main-content">
			<div class="col-md-12 meal">
				
				<?php $loop = new WP_Query( array( 'post_type' => 'meal_post', 'posts_per_page' => 10 ) ); ?> 

				<?php 
					if (have_posts()) : while (have_posts()) : the_post();
					
						echo '<div class="meal-title">';
							the_title(); 
						echo'</div>'; ?>
						
						<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>

						<?php 
						echo '<div class="col-sm-6 col-md-6 col-center meal-img">' ;
							the_post_thumbnail();
						echo '</div>';

						echo '<div class="meal-content">';
							the_content();
						echo '</div>';

					endwhile; endif;

				?>
					
			</div>				
		</div>
	</div>

<?php get_footer(); ?>