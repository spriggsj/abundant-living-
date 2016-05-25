<?php get_header(); ?>

	<main role="main">
		<div class="container archive-post">

			<h2><?php _e( 'Categories for ', 'html5blank' ); single_cat_title(); ?></h2>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
	</main>



<?php get_footer(); ?>
