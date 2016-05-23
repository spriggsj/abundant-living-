<?php get_header(); ?>

	<main role="main">
		<section class="members-page">
		
			<?php 
				echo do_shortcode( '[member-custom-loop]' );
			?>

			<?php get_template_part('pagination'); ?>

		</section>
	</main>

<?php get_footer(); ?>
