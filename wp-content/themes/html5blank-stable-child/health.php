<?php get_header(); ?>

<div class="container">
		<div class="row main-content">
			<div class="health">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

					<div class="health-title">
						<h1><?php echo the_title() ; ?></h1>
						<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
					</div>
					<div class="health-img">

						<?php echo the_post_thumbnail(); ?> 
						<?php echo the_content(); ?> 
						<?php comments_template(); ?>

						<?php echo the_post_thumbnail(); ?>
						<?php echo the_content(); ?>

					</div>

					<?php comments_template(); ?>


				<?php endwhile; endif; ?>

			</div>
		</div>
	</div>

<?php get_footer(); ?>
