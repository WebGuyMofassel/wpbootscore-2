<?php
/**
 * Template Name: Portfolio Template
 *
 * @package wpbootscore
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

     <!-- Portfolio Section Starts -->
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
						'posts_per_page' => -1,
						'orderby' => 'menu_order',
						'order' => 'ASC',
				);
				$custom_query = new WP_Query($args);
				
				if ( $custom_query->have_posts() ) :
			?>

				<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

                  <div <?php post_class("mix portfolio-item col-sm-3 category-1"); ?>>
                    <img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/images/project.jpg" alt="project">
                    <h3 class="text-center"><?php the_title(); ?></h3>
                  </div>

			<?php endwhile; ?>

			<?php endif; wp_reset_query(); ?>



              <!--    <div class="mix portfolio-item col-sm-3 category-2">
                    <img class="img-responsive" src="<?php //echo get_template_directory_uri() ?>/images/project.jpg" alt="project">
                    <h3 class="text-center">Lorem ipsum dolor sit amet.2</h3>
                  </div>
                  <div class="mix portfolio-item col-sm-3 category-1">
                    <img class="img-responsive" src="<?php //echo get_template_directory_uri() ?>/images/project.jpg" alt="project">
                    <h3 class="text-center">Lorem ipsum dolor sit amet.3</h3>
                  </div>
                  <div class="mix portfolio-item col-sm-3 category-2">
                    <img class="img-responsive" src="<?php //echo get_template_directory_uri() ?>/images/project.jpg" alt="project">
                    <h3 class="text-center">Lorem ipsum dolor sit amet.4</h3>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Portfolio Section Ends -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
