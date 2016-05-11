<?php /* Template Name: Home Page Template */ get_header(); ?>

<header class="hero-banner">
		<div class="container">
			<h1>living <span>healthy</span> should be easy</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod dolores harum fugiat praesentium corrupti illo ducimus, velit non!</p>
			<input type="submit" value="submit">
		</div>
	</header>
	
	<div><?php echo do_shortcode( '[custom-loop]' ); ?></div>
	<div><?php echo do_shortcode( '[meal-loop]' ); ?></div>
<?php get_footer(); ?>