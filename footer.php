<?php
/**
 * The template for displaying the footer.
 */

?>
		</div> <!-- /.row -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer container-fluid" role="contentinfo">
		<div class="site-info">

		<?php $copyright_text = ot_get_option('copyright_text'); 
			if ( $copyright_text ) :
		?>

		<p><?php echo $copyright_text; ?></p>

		<?php else : ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wpbootscore' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'wpbootscore' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'wpbootscore' ), 'wpbootscore', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		<?php endif; ?>

		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>


<script>
<?php $custom_scripts = ot_get_option('custom_scripts');
	echo($custom_scripts);
 ?>
</script>
</body>
</html>
