<?php
/**
 * Template Name: Portfolio Template
 *
 * @package wpbootscore
 */

get_header(); ?>

	<div id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

      <?php echo do_shortcode( '[wpbs_portfolio]' ); ?> 

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
