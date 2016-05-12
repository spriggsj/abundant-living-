<?php get_header(); ?>
	
	<header class="hero-banner">
		<div class="container">
			<h1>living <span>healthy</span> should be easy</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod dolores harum fugiat praesentium corrupti illo ducimus, velit non!</p>
			<input type="submit" value="submit">
		</div>
	</header>
	
	<div><?php echo do_shortcode( '[custom-loop]' ); ?></div>
	<section id="buffer">
	
		<h1 class="name-title"><?php include 'logo.php'; ?>Abundant Living <span>Mommy</span> E Books</h1>
		<ul id="books">
			<li><a href="#"><img src="http://placehold.it/250x250"></a></li>
			<li><a href="#"><img src="http://placehold.it/250x250"></a></li>
			<li><a href="#"><img src="http://placehold.it/250x250"></a></li>
			<li><a href="#"><img src="http://placehold.it/250x250"></a></li>
		</ul>
	</section>
	<div><?php echo do_shortcode( '[meal-loop]' ); ?></div>
<?php get_footer(); ?>