<?php get_header(); ?>

	<div class="container">
		<div class="row main-content">
			<div class="health-tip">
				
				<?php $loop = new WP_Query( array( 'post_type' => 'health_tip_posts', 'posts_per_page' => 10 ) ); ?> 

				<?php 
					if (have_posts()) : while (have_posts()) : the_post();
					
						echo '<div class="health-tip-title">'; ?>
							<a href="<?php the_permalink(); ?>"></a><h1><?php the_title();  ?></h1></a>
							<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
							
						<?php echo'</div>';
						
						echo '<div class="health-tip-img">' ;
							the_post_thumbnail();
							the_content();
							 
						echo '</div>';

					endwhile; endif;

				?>
				<?php comments_template(); ?>

			</div>				
		</div>
	</div>

<?php get_footer(); ?>