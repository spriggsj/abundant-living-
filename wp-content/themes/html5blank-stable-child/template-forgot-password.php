<?php /* Template Name: Forgot Password Template */ get_header(); ?>

<main role="main">
		<!-- section -->
		<section id="forgot-password">

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>
			
			<article class="password-page">
				<p>Enter in your email address</p>
				<?php echo do_shortcode( '[forgot-password]' ); ?>
				<a href="http://www.abundantlivingmommy.com/confirm-forgot-password/">Confirm Lost Password</a>
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