<?php
/**
 * The header for our theme.
 *
 * @package wpbootscore
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<!-- <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png"> -->

<?php $favicon = ot_get_option('site_favicon');  ?>
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url($favicon); ?>">

<?php wp_head(); ?>

<style>
    .navbar-logo > img {
  height: 60px;
  width: 200px;
}

<?php $custom_scripts = ot_get_option('custom_css');
    echo($custom_scripts);
 ?>
</style>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wpbootscore' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <?php 

        $site_logo = ot_get_option('site_logo');

        if ( $site_logo ) : ?>

        <a class="navbar-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo esc_url( $site_logo ); ?>" alt="<?php bloginfo('name'); ?>">
            </a>


    <?php else : ?>

      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <?php bloginfo('name'); ?>
            </a>
    <?php endif; ?>

    </div>

        <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
        'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav navbar-right',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
    </div>
</nav>
	</header><!-- #masthead -->

    <!-- Slider -->
    <?php get_template_part('template-parts/tp-slider'); ?>

	<div id="content" class="site-content container">
		<div class="row">
