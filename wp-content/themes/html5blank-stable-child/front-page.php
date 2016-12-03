<?php get_header(); ?>

	<header class="hero-banner">
		<div class="container">
			<h1>Living <span>Healthy</span> Should Be Easy</h1>
			<p>I invite you to join me on this journey.  I am a real mom with the same challenges you have.  I have a messy, imperfect life.  But everyday we are given we have another opportunity to change, grow, transform ourselves and families.  As woman we are the center of the home and have the opportunity to mold and teach.  We have power in numbers.  I'd love to get to know you so we can encourage each other.  As a wellness coach and mommy I've put together simple, raw, healthy meals, toxic free tips for your home and family. Lets do Life together.</p>
			<a href="http://www.abundantlivingmommy.com/register/">Let's Get Started</a>
		</div>
	</header>

	<section class="health-tip-post">
		<?php
			$args = [
				'post_type' => 'post',
				'posts_per_page' => 3,
				'post_status' => 'publish',
				'order' => 'DESC',
				'orderby' => 'date',
				'category_name' => 'health-tip'

			];
			?>
			<div class="health-tip">
				<h2>Health Tip of the Month</h2>
			</div>
			<?php
			$third_query = new WP_Query($args);
			if($third_query->have_posts()) : while($third_query->have_posts()) : $third_query->the_post();
			?>
				<h3><?php the_title();?></h3>
				<span class="date"><?php the_time("F j, Y") ?></span>
				<p><?php the_excerpt();?></p>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
		<a href="#" class="view-all-post"> View All</a>
	</section>

	<section class="recent-post">
		<?php
			$args = [
				'post_type' => 'post',
				'posts_per_page' => 3,
				'post_status' => 'publish',
				'order' => 'DESC',
				'orderby' => 'date',
				'category_name' => 'health_post',

			];

			$first_query = new WP_Query($args);
			?>
				<div class="container">
			    <h2> Recent Thoughts</h2>
			  <div class="row">
	<?php
			$i = 0;
			if($first_query->have_posts()) : while($first_query->have_posts()) : $first_query->the_post();
			if ($i == 0 ){
	?>
				<div class="col-sm-6 newest-recent-post">
					<?php the_post_thumbnail('full')?>
					<aside>
						<h3><?php the_title(); ?></h3>
						<span class="date"><?php the_time("F j, Y"); ?></span>
						<p><?php the_excerpt($post_id); ?></p>
					</aside>
				</div>
				<?php   } else { ?>
				<div class="col-sm-6 older-recent-post">
					<div class="row older-post-container">
							<?php the_post_thumbnail('medium'); ?>
							<aside>
								<h3><?php the_title(); ?></h3>
								<span class="date"><?php the_time("F j, Y"); ?></span>
								<p><?php the_excerpt(); ?><p>
							</aside>
						</div>
					</div>
						<?php } $i++;?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<?php endif; ?>

	</div>
	</div>

	</section>

	<section id="buffer">
		<div class="container">
			<h2 class="name-title">Abundant Living <span>Mommy</span> E Books</h2>
			<ul id="books">
					<?php echo do_shortcode('[featured_products per_page="5" columns="5"]');?>
			</ul>
		</div>
	</section>

	<section class="meal-post">
		<?php
			$args = [
				'post_type' => 'post',
				'posts_per_page' => 3,
				'post_status' => 'publish',
				'order' => 'DESC',
				'orderby' => 'date',
				'category_name' => 'meal_post',

			];
			?>
			<div class="container">
				<h2>Food Changes Everything</h2>
				<div class="row">
					<div class="col-sm-8 recipe-container">
			<?php
			$second_query = new WP_Query($args);
			if($second_query->have_posts()) : while($second_query->have_posts()) : $second_query->the_post();
			?>

				<div class="col-sm-12 recipe">
					<?php the_post_thumbnail('medium',['class'=>'img-responsive']);?>
					<article>
						<h3><?php the_title(); ?> </h3>
						<span class="date"><?php the_time("F j, Y"); ?></span>
						<p> <?php the_excerpt();?></p>
					</article>
				</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		<?php endif; ?>
	</div>
	<div class="col-sm-4 wendy-front-page">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/wendy4.jpg">
		<p>As a wife, mommy, health coach, writer gourmet healthy cook and natural life enthusiast I've prepared a plan for you. Please join me in transforming your family's life.</p>
		<a href="http://www.abundantlivingmommy.com/register/">Join me</a>
	</div>
</div>
</div>
</section>




	<section class="affiliate">
		<h2>What I Love</h2>
		<?php echo do_shortcode( '[js-loop]' ); ?>
	</section>

<?php get_footer(); ?>
