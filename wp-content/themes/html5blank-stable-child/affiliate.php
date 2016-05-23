<?php get_header(); ?>
	<div class="container">
		<div class="row main-content">
			
			<!-- CONTENT -->


			<!--DISPLAY CUSTOM POSTS-->

			<?php $loop = new WP_Query( array( 'post_type' => 'people_custom_post', 'posts_per_page' => 10 ) ); ?> 




			<?php 
		if (have_posts()) : while (have_posts()) : the_post(); // start of the loop
			$name_title = get_post_meta(get_the_ID(), 'name_title',true);
			


		if (isset($name_title)){
			?>

			<div><?php echo  $name_title ?> </div>
			<?php
			
		}

		
		endwhile; endif;



			?>


			<!--END CUSTOM POSTS-->
				
				

				
			
		</div>
	</div>
<?php get_footer(); ?>