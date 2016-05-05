
<?php get_header(); ?>

<div class="container">
		<div class="row main-content">
			<div class="col-md-12 bio">
			<!-- CONTENT -->

			<!-- 	<?php //if ( has_post_thumbnail() ) {the_post_thumbnail();} the_content();?>
				<!--DISPLAY CUSTOM POSTS-->
				
				<?php $loop = new WP_Query( array( 'post_type' => 'members_posts', 'posts_per_page' => 10 ) ); ?> 

				<?php 
					if (have_posts()) : while (have_posts()) : the_post(); // start of the loop
					
					echo '<div class="membertitle">';
					 the_title() ; 
					echo'</div>';
					

					echo '<div class="col-sm-6 col-md-6 col-center main-img">' ;
						the_post_thumbnail() ;
					echo '</div>';

					

					echo '<div class="membercontent">';
					 the_content();
					echo '</div>';
						  

						
					
					

				endwhile; endif;



				?>


				<!--END CUSTOM POSTS-->
					
					<!-- need to change page_id when site is live  -->

					

			</div>
					
		</div>
</div>
	
	
	
		<?php get_footer(); ?>