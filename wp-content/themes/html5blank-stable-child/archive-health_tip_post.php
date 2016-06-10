<?php get_header(); ?>

	<main role="main">
		
		<div class="container archive-post">

			<h1><?php _e( 'Health Tip', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
	
	</main>

<?php get_footer(); ?>