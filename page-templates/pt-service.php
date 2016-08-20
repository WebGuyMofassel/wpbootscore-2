<?php
/**
 * Template Name: Service Template
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
<?php 
	global $post;
	$args = array (
			'post_type' => 'wpbs_service',
			'posts_per_page' => -1,
			'wpbs_service_cat' => '',
			'orderby' => 'menu_order',
			'order' => 'DESC',
	);
	$custom_query = get_posts($args);
?>

	<?php foreach ($custom_query as $post) : setup_postdata($post); ?>

		<div class="col-sm-4">
			<article class="service-item text-center">
				<header class="entry-header">
					<div class="service-icon entry-meta">
						<?php the_post_thumbnail( 'thumbnail' ); ?>
						
					</div><!-- .entry-meta -->
					<a href="<?php the_permalink(); ?>">
						<h2 class="service-title entry-title">
							<?php the_title(); ?></h2>
						</a>
					</header><!-- .entry-header -->

					<div class="service-content entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article>
			</div>

	<?php endforeach ?>

<?php wp_reset_query(); ?>





                </div>
              </div>

          </section>
          <!-- Service Section Ends -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
