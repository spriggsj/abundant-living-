<?php get_header(); ?>
	
	<header class="hero-banner">
		<div class="container">
			<h1>Helping woman and moms is my passion</h1>
			<p>I invite you to join me on this journey.  I am a real mom with the same challenges you have.  I have a messy, imperfect life.  But everyday we are given we have another opportunity to change, grow, transform ourselves and families.  As woman we are the center of the home and have the opportunity to mold and teach.  We have power in numbers.  I'd love to get to know you so we can encourage each other.  As a wellness coach and mommy I've put together simple, raw, healthy meals, toxic free tips for your home and family. Lets do Life together.</p>
			<a href="http://localhost:8080/register/">Let's Get Started</a>
		</div>
	</header>

	<section class="health-tip-post">
		<?php echo do_shortcode( '[tip-custom-loop]' ); ?>
	</section>
	
	<section class="recent-post">
		<?php echo do_shortcode( '[custom-loop]' ); ?>
	</section>

	<section id="buffer">
		<div class="container">
			<h2 class="name-title">Abundant Living <span>Mommy</span> E Books</h2>
			<ul id="books">
				<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/detoxyourhomehandbook.jpg" class="img-responsive"></a></li>
				<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/healthy-pregnancy-guide.jpg" class="img-responsive"></a></li>
				<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-remedies-handbook.jpg" class="img-responsive"></a></li>
			</ul>
		</div>
	</section>

	<section class="meal-post">
		<?php echo do_shortcode( '[meal-loop]' ); ?>
	</section>

	<section class="affiliate">
		<h2>What I Love</h2>
		<?php echo do_shortcode( '[js-loop]' ); ?>
	</section>

<?php get_footer(); ?>