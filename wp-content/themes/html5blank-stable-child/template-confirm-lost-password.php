<?php /* Template Name: Confirm Forgot Password Template */ get_header(); ?>

<main role="main">
		<!-- section -->
		<section id="confirm-lost-password">

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			
			<article class="confirm-password-page">
				<p>For completing the password reset procedure, please follow the instructions in your email.</p>
				<?php echo do_shortcode( '[confirm-forgot-password]' ); ?>
			</article>

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>




<?php get_footer(); ?>