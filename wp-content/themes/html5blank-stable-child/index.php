<?php get_header(); ?>


	<main role="main">
		
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

		<section>
			
			<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		
	</main>

	<?php get_sidebar(); ?>


<?php get_footer(); ?>

