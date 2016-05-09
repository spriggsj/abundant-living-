<?php get_header(); ?>

	<div class="container">
		<div class="row main-content">
			<div class="col-md-12 health">
				
				<?php $loop = new WP_Query( array( 'post_type' => 'health_posts', 'posts_per_page' => 10 ) ); ?> 

				<?php 
					if (have_posts()) : while (have_posts()) : the_post();
					
						echo '<div class="health-title">';
							the_title() ; 
						echo'</div>';
						
						echo '<div class="col-sm-6 col-md-6 col-center health-img">' ;
							the_post_thumbnail() ;
						echo '</div>';

						echo '<div class="health-content">';
							the_content();
						echo '</div>';

					endwhile; endif;

				?>

			</div>				
		</div>
	</div>

<?php get_footer(); ?>