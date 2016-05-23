<?php get_header(); ?>

	<div class="container">
		<div class="row main-content">
			<div class="health-tip">
				
				 

				<?php 
					if (have_posts()) : while (have_posts()) : the_post();
					
						echo '<div class="health-tip-title">'; ?>
							<h2><?php the_title();  ?></h2>
						<?php echo'</div>';
						
						echo '<div class="health-tip-img">' ;
							?>
							<a href="<?php the_permalink(); ?>">
							<?php	
							the_post_thumbnail();
							the_excerpt();
							?>
							</a>;
							<?php
						echo '</div>';

					endwhile; endif;

				?>

			</div>				
		</div>
	</div>

<?php get_footer(); ?>
			


