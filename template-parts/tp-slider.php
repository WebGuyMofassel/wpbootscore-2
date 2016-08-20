<div id="myCarousel" class="carousel slide" data-ride="carousel">


<?php $args = array (
      'post_type' => 'wpbs_slide',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'DESC',
  );
  $slide_query = new WP_Query($args);
  
  if ( $slide_query->have_posts() ) :
?>
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <?php while ( $slide_query->have_posts() ) : $slide_query->the_post(); 

        ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $slide_query->current_post; ?>" class=""></li>
          <?php endwhile; ?>
      </ol>


      <div class="carousel-inner" role="listbox">


  <?php while ( $slide_query->have_posts() ) : $slide_query->the_post(); 
    $image_link = get_post_meta($post->ID, 'wpbs_image_link', true);
  ?>

        <div class="item">
          <?php if($image_link) : ?>
            <a href="<?php echo esc_url($image_link); ?>">
              <?php the_post_thumbnail( 'slide_img' ); ?>
            </a>
          <?php else : ?>
            <?php the_post_thumbnail( 'slide_img' ); ?>
          <?php endif; ?>
              <div class="container">
                <div class="carousel-caption">
                      <?php the_content(); ?>
                      <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                </div>
              </div>
        </div>


  <?php endwhile; ?>


      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
           <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>

  <?php endif; wp_reset_query(); ?>
</div> <!-- /.carousel -->

<script>
  (function($){
    $(".carousel-inner .item:first").addClass("active");
    $(".carousel-indicators li:first").addClass("active");
  })(jQuery);
</script>