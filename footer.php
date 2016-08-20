<?php
/**
 * The template for displaying the footer.
 */

?>
		</div> <!-- /.row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wpbootscore' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'wpbootscore' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'wpbootscore' ), 'wpbootscore', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
