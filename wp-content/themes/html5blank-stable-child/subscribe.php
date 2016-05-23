<!-- THIS PAGE IS CONNECTED TO THE _members-blog-page.scss -->

<?php get_header(); ?>

	<div class="container">
		<div class="row main-content">
			<div class="members-single-page">
			<!-- CONTENT -->
			
			<!-- 	<?php //if ( has_post_thumbnail() ) {the_post_thumbnail();} the_content();?>
				<!--DISPLAY CUSTOM POSTS-->
				
				<?php $loop = new WP_Query( array( 'post_type' => 'members_posts', 'posts_per_page' => 10 ) ); ?> 
					
				<?php 
					if (have_posts()) : while (have_posts()) : the_post(); // start of the loop
				
					$content = '';
					$content .= '<div class="members-title">';
						$content .= '<h2>';
							$content .= get_the_title();
						$content .= '</h2>';
					$content .= '</div>';

					$content .= '<div class="members-img">';
						$content .= get_the_post_thumbnail();
						$content .= '<p>';
							$content .= get_the_content();
						$content .= '</p>';
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