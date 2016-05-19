<?php get_header(); ?>

<div class="container">
		<div class="row main-content">
			<div class="col-md-12 health">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<div class="health-title">
		<?php echo the_title() ; ?> <!--this displays the title of the post -->
	</div>
	<div class="col-sm-6 col-md-6 col-center health-img">
		<?php echo the_post_thumbnail(); ?> <!-- this is the featured image-->
	</div>
	<div class="health-content">
		<?php echo the_content(); ?> <!-- this is the media insert and content -->
	</div>
	
<?php endwhile; endif; ?>

			</div>				
		</div>
	</div>

<?php get_footer(); ?>