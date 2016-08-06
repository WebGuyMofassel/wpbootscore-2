<?php
/**
 * The template for displaying all single posts.
 *
 * @package wpbootscore
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

	          <!-- Service Section Starts -->
      <section id="services" class="">

        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <header class="service-header text-center">
                <h1 class="section-title">
                  Our Services
                </h1>
                <p class="section-description">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ipsum rerum pariatur unde, quam quos, molestiae quas cum, tempore aliquid officiis delectus. Modi, esse asperiores.
                </p>
              </header>
            </div>

<?php if ( have_posts() ) : ?> 

	<?php while ( have_posts() ) : the_post() ?>
		
		        <div class="col-sm-4">
                  <article class="service-item text-center">
                    <header class="entry-header">
                     
                        <h2 class="service-title entry-title">
                          <?php the_title(); ?></h2>
                    
                      </header><!-- .entry-header -->

                     <div class="service-icon entry-meta">
                        <?php the_post_thumbnail( 'large' ); ?>
                        
                      </div><!-- .entry-meta -->

                      <div class="service-content entry-content">
                        <?php the_content(); ?>
                      </div><!-- .entry-content -->
                    </article>
                  </div>

		

	<?php endwhile; ?>


	<?php else : ?>

	<!-- 404 not found! -->
	<h3>Not found!</h3>

<?php endif; ?>

                </div>
              </div>

          </section>
          <!-- Service Section Ends -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
