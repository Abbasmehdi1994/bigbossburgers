<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bigbossburgers
 */

?>

	</div><!-- #content -->
<!-- Restaurant address and information in footer -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			123 Fake Street, Toronto, Canada<br>
			<a href="tel:+16477800140">+647 780 0140</a>
			<span class="sep"> / </span>
			<a href="mailto:bigBoss@bigbossburgers.com">bigBoss@BigBossBurgers.com</a><br>
			Open Monday - Saturday [6pm - Late] <span class="sep"> / </span>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'bigbossburgers' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'bigbossburgers' ), 'WordPress' ); ?></a>
			<span class="sep"> / </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'bigbossburgers' ), 'bigbossburgers', '<a href="http://underscores.me/" rel="designer">Marcus, Anton & Abbas</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
