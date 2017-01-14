<?php
/**
 *    The template for dispalying the footer.
 *
 * @package    WordPress
 * @subpackage ossy
 */
?>
<?php

if ( current_user_can( 'edit_theme_options' ) ) {
	$footer_copyright  = get_theme_mod( 'ossy_footer_copyright', __( '&copy; Copyright 2016. All Rights Reserved.', 'ossy' ) );
	$img_footer_logo   = get_theme_mod( 'ossy_img_footer_logo', esc_url( get_template_directory_uri() . '/layout/images/footer-logo.png' ) );
} else {
	$footer_copyright  = get_theme_mod( 'ossy_footer_copyright' );
	$img_footer_logo   = get_theme_mod( 'ossy_img_footer_logo' );
}
?>
<footer id="footer">
	<div class="container">
		<div class="row">
			<?php
			$the_widget_args = array(
				'before_widget' => '<div class="widget">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h3>',
				'after_title'   => '</h3></div>',
			);
			?>
			<div class="col-sm-12">
				<p class="copyright">
					<span data-customizer="copyright-credit"><?php printf( '%s <a href="%s" title="%s" target="_blank">%s</a>.', __( 'Theme:', 'ossy' ), esc_url( 'http://www.optimalsystemsolutions.com' ), __( 'ossy', 'ossy' ), __( 'ossy', 'ossy' ) ); ?> by <a href='http://www.optimalsystemsolutions.com'>Optimal System Solutions</a></span>
				</p>
				<span><?php echo ossy_sanitize_html( $footer_copyright ); ?></span>
				<?php if ( $img_footer_logo ): ?>
					<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" class="footer-logo"><img src="<?php echo esc_url( $img_footer_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a>
				<?php endif; ?>
			</div><!--/.col-sm-3-->
		</div><!--/.row-->
	</div><!--/.container-->
</footer><!--/#footer-->
<?php wp_footer(); ?>
</body>
</html>