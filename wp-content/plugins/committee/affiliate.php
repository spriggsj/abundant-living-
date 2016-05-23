<?php get_header(); ?>
	<div class="container">
		<div class="row main-content">
			
			<!-- CONTENT -->


			<!--DISPLAY CUSTOM POSTS-->

			<?php $loop = new WP_Query( array( 'post_type' => 'people_custom_post', 'posts_per_page' => 10 ) ); ?> 




			<?php 
		if (have_posts()) : while (have_posts()) : the_post(); // start of the loop
			$product1 = esc_html(get_post_meta(get_the_ID(), 'product_1',true));
			


		if (isset($product1)){
			echo "<div>" . $product1 . "</div>";
		}

		
		endwhile; endif;



			?>


			<!--END CUSTOM POSTS-->
				
				

				
			
		</div>
	</div>
<?php get_footer(); ?>