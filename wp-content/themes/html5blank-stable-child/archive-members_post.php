<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section id="red">

			<h2><?php _e( 'Members only', 'html5blank' ); ?></h2>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php get_footer(); ?>
