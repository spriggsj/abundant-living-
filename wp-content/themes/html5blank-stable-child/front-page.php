<?php get_header(); ?>
	
	<header class="hero-banner">
		<div class="container">
			<h1>living <span>healthy</span> should be easy</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod dolores harum fugiat praesentium corrupti illo ducimus, velit non! Quod dolores harum fugiat praesentium corrupti illo ducimus, velit non! Quod dolores harum fugiat praesentium corrupti illo ducimus, velit non!</p>
			<a href="http://localhost:8080/register/">Let's Get Started</a>
		</div>
	</header>
	
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
				<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/natural-beauty-guide.jpg" class="img-responsive"></a></li>
			</ul>
		</div>
	</section>

	<section class="meal-post">
		<?php echo do_shortcode( '[meal-loop]' ); ?>
	</section>

<?php get_footer(); ?>