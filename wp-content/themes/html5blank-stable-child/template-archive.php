<?php
/*
Template Name: Archives Posts
*/
?>

<?php get_header(); ?>


  <div class="container blog__content">
    <div class="row">



<?php

  $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
  $args = [
    'post_type' => 'post',
    'posts_per_page' => 10,
    'paged' => $paged,
  ];

  $blog_query = new WP_Query($args);

    if($blog_query->have_posts()) : while($blog_query->have_posts()) : $blog_query->the_post();
?>

      <a href="<?php the_permalink();?>">
      <div class="col-lg-3">
        <?php the_post_thumbnail('full',['class'=>'img-responsive']);?>

      </div>
      <div class="col-lg-6 blog__paragraph ">


          <h1><?php the_title();?></h1>
          <?php the_time('F j, Y'); ?>

          <p><?php the_excerpt();?></p>
          <a href="<?php the_permalink(); ?>"</a>
      </div>
      </a>
      <div class="clear"></div>
      <hr>

  <?php endwhile;?>
  </div>
</div>

  <div class="container numbers">
    <div class="row">
      <div class="col-lg-12">
        <?php
          if (function_exists(custom_pagination)) {
            custom_pagination($blog_query->max_num_pages,"",$paged);
          }
        ?>
      </div>
    </div>
  </div>

<?php wp_reset_postdata(); ?>

<?php else:  ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
