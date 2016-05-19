<?php get_header(); ?>

<div class="container">
		<div class="row main-content">
			<div class="health">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div class="health-title">
					<h2><?php echo the_title() ; ?></h2>
					</div>
					<div class="health-img">
						<?php echo the_post_thumbnail(); ?> 
						<?php echo the_content(); ?>
					</div>
					

				<?php endwhile; endif; ?>

			</div>				
		</div>
	</div>

<?php get_footer(); ?>