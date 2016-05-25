<?php get_header(); ?>

	<main role="main">
		<div class="container archive-post">

			<h2><?php _e( 'Members Only', 'html5blank' ); ?></h2>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</div>
	</main>

<?php get_footer(); ?>
