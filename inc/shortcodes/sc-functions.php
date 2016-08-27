<?php

// Shortcode [wpbs_button] support
function wpbs_button_shortcode($atts, $content=null){
  extract( $atts = shortcode_atts(
    array(
      'link'       => '#',
      'color'       => 'red',
      ), $atts, 'wpbs_button' ) );
  ob_start();
?>
<style>
#red {
background: red;
}
#blue {
background: blue;
}
</style>
<a href="<?php echo esc_url($link); ?>">
<button id="<?php echo $color; ?>" class="btn btn-primary btn-lg"><?php echo $content; ?></button></a>
<?php
  return ob_get_clean();
}
add_shortcode('wpbs_button', 'wpbs_button_shortcode');


// [wpbs_button link="google.com"]Buy Now[/wpbs_button]
//[single]
//[double par=""]content[/double]


// Shortcode [wpbs_progressbar] support
function wpbs_progressbar_shortcode($atts, $content=null){
  extract( $atts = shortcode_atts(
    array(
      'color'       => 'success',
      'percentage'       => '50',
      ), $atts, 'wpbs_progressbar' ) );
  ob_start();
?>
<div class="progress">
  <div class="progress-bar progress-bar-<?php echo $color; ?> progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%">
    <span class="sr-only"><?php echo $percentage; ?>% Complete (success)</span>
  </div>
</div>

<?php
  return ob_get_clean();
}
add_shortcode('wpbs_progressbar', 'wpbs_progressbar_shortcode');

// Shortcode [wpbs_brand_logo] support
function wpbs_brand_logo_shortcode($atts, $content=null){
  extract( $atts = shortcode_atts(
    array(
      ''      => '',
      ), $atts, 'wpbs_brand_logo' ) );

  $id = rand(99, 999);

  ob_start();
?>
  <section id="brand-logo">
    <div class="container">
      <h1 class="text-center">Brand</h1>
      <div class="row">

        <div class="col-sm-12">

         <!-- brand-logo -->
         <div id="brand-carousel-<?php echo $id; ?>" class="owl-carousel owl-theme">
<?php $args = array (
                'post_type' => 'wpbs_brand',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'DESC',
            );
            $custom_query = new WP_Query($args);
            
            if ( $custom_query->have_posts() ) :
          ?>
          
            <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
          
              <div class="item">
            <?php the_post_thumbnail( 'thumbnail' ); ?>
            
          </div>
          
            <?php endwhile; ?>
          
          <?php endif; wp_reset_query(); ?>          
          

        </div>

        <div class="brand-navigation">
          <a class="btn prev">Previous</a>
          <a class="btn next">Next</a>
          <a class="btn play">Autoplay</a>
          <a class="btn stop">Stop</a>
        </div>

      </div>

    </div>

  </div>
</section> 
<script>
(function($){
var owl = $("#brand-carousel-<?php echo $id; ?>");
     
      owl.owlCarousel({
          items : 5, //10 items above 1000px browser width
          itemsDesktop : [1000,5], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,3], // betweem 900px and 601px
          itemsTablet: [600,2], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      });
     
      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })
  })(jQuery);
</script>
<?php
  return ob_get_clean();
}
add_shortcode('wpbs_brand_logo', 'wpbs_brand_logo_shortcode');



// Shortcode [wpbs_portfolio] support
function wpbs_portfolio_shortcode($atts, $content=null){
  extract( $atts = shortcode_atts(
    array(
      'posts_per_page'      => -1,
      'taxonomy'      => '',
      ), $atts, 'wpbs_portfolio' ) );

  ob_start();
?>

          <section id="portfolio" class="">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                <nav class="portfolio-filter">
                  <ul class="nav navbar-nav">

           <?php $portfolio_filters = get_terms( 'portfolio-filter' ); 

            //var_dump($portfolio_filters);
           ?> 

                    <li class="filter" data-filter="all">Show All</li>
          <?php foreach ($portfolio_filters as $portfolio_filter) : ?>

                    <li class="filter" data-filter=".<?php echo $portfolio_filter->slug; ?>"><?php echo $portfolio_filter->name; ?></li>

                    <?php endforeach ?>



                  </ul>
                  </nav>
                </div>

                <div id="portfolio-items">


      <?php $args = array (
            'post_type' => 'wpbs_portfolio',
            'posts_per_page' => $posts_per_page,
            'portfolio-filter' => $taxonomy,
            'orderby' => 'menu_order',
            'order' => 'ASC',
        );
        $custom_query = new WP_Query($args);
        
        if ( $custom_query->have_posts() ) :
      ?>

        <?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                  <div <?php post_class("mix portfolio-item col-sm-3 category-1"); ?>>
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/<?php echo get_template_directory_uri(); ?>/images/project.jpg" alt="project">
                    <h3 class="text-center"><?php the_title(); ?></h3>
                  </div>

      <?php endwhile; ?>

      <?php endif; wp_reset_query(); ?>

                </div>
              </div>
            </div>
          </section>
<?php
  return ob_get_clean();
}
add_shortcode('wpbs_portfolio', 'wpbs_portfolio_shortcode');


/**
* Shortcode Support in various places
**/
add_filter( 'the_excerpt', 'do_shortcode');
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'comment_text', 'do_shortcode' );

/**
* Fixing issues of unexpected p or br tag around shortcodes
**/
if( !function_exists('bootwp_fix_shortcodes') ) {
  function bootwp_fix_shortcodes($content){   
    $array = array (
      '<p>[' => '[', 
      ']</p>' => ']', 
      ']<br />' => ']'
    );
    $content = strtr($content, $array);
    return $content;
  }
  add_filter('the_content', 'bootwp_fix_shortcodes');
}

/**
* Load Shortcode mce-buttons Support File.
**/
require get_template_directory() . '/inc/shortcodes/mce-button/mce-functions.php';



