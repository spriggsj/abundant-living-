<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<div class="container archive-post">

			<h1><?php _e( 'Health Living Tips', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
		<!-- /section -->
	</main>



	

<?php get_footer(); ?>
