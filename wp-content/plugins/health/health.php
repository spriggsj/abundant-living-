<?php get_header(); ?>

	<div class="container">
		<div class="row main-content">
			<div class="health">
				
				<?php $loop = new WP_Query( array( 'post_type' => 'health_posts', 'posts_per_page' => 10 ) ); ?> 

				<?php 
					if (have_posts()) : while (have_posts()) : the_post();
					
						echo '<div class="health-title">'; ?>
						 
							<h2><?php the_title(); ?></h2> 
						
						<?php echo'</div>';
						
						echo '<div class="health-img">' ;
							the_post_thumbnail();
							the_content();
						echo '</div>';

					endwhile; endif;

				?>

			</div>				
		</div>
	</div>

<?php get_footer(); ?>