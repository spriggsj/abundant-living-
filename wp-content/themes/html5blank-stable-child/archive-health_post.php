<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<div class="container archive-post">

			<h2><?php _e( 'Recent Posts', 'html5blank' ); ?></h2>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
		<!-- /section -->
	</main>



	

<?php get_footer(); ?>
