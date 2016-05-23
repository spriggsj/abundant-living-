<?php get_header(); ?>

	<div class="container">
		<div class="row main-content">
			<div class="bio">
				
				<?php $loop = new WP_Query( array( 'post_type' => 'members_posts', 'posts_per_page' => 10 ) ); ?> 

				<?php 
					if (have_posts()) : while (have_posts()) : the_post(); // start of the loop
				
						$content = '';
						$content .= '<div class="member-title">';
							$content .= the_title();
						$content .= '</div>';

						$content .= '<div class="member-img">';
							$content .= the_post_thumbnail();
							$content .= the_content();
						$content .= '</div>';

						echo do_shortcode('[restricted]' . $content . '[/restricted]');
					?>
	
				<?php	

				endwhile; endif;

				?>

				<!--END CUSTOM POSTS-->
					
				<!-- need to change page_id when site is live  -->
			</div>			
		</div>
	</div>
	
	
	
<?php get_footer(); ?>