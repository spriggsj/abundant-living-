<?php get_header(); ?>

	<div class="container single__page">
		<div class="row flex__container">




				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="singles__title">

						<h1><?php the_title(); ?></h1>
						<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
						<span class="author"><?php _e( 'Published by', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>

					</div>
					<div class="col-xs-7 col-sm-6 col-md-8 col-lg-9">


						<div class="health-img">
							<?php the_post_thumbnail(); ?>
							<?php the_content(); ?>
							<?php comments_template(); ?>
						</div>
					</div>

					<?php
					endwhile; endif;

				?>
				<div class="col-sm-2 col-lg-2">
						<?php get_sidebar(); ?>
				</div>


		</div>
	</div>



<?php get_footer(); ?>
