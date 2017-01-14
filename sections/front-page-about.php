<?php
/**
 *	The template for displaying about section in front page.
 *
 *	@package WordPress
 *	@subpackage ossy
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$general_title = get_theme_mod( 'ossy_about_general_title', __( 'About', 'ossy' ) );
	$general_entry = get_theme_mod( 'ossy_about_general_entry', __( 'It is an amazing one-page theme with great features that offers an incredible experience. It is easy to install, make changes, adapt for your business. A modern design with clean lines and styling for a wide variety of content, exactly how a business design should be. You can add as many images as you want to the main header area and turn them into slider.', 'ossy' ) );
}else{
	$general_title = get_theme_mod( 'ossy_about_general_title' );
	$general_entry = get_theme_mod( 'ossy_about_general_entry' );
}
?>

<?php if ( $general_title != '' || $general_entry != '' || is_active_sidebar( 'front-page-about-sidebar' ) ) { ?>

<section id="about" class="front-page-section" style="<?php if( !$general_title && !$general_entry ): echo 'padding-top: 130px;'; endif; ?>">
	<?php if( $general_title || $general_entry ): ?>
		<div class="section-header">
			<div class="container">
				<div class="row">
					<?php if( $general_title ): ?>
						<div class="col-sm-12">
							<h3><?php echo ossy_sanitize_html( $general_title ); ?></h3>
						</div><!--/.col-sm-12-->
					<?php endif; ?>
					<?php if( $general_entry ): ?>
						<div class="col-sm-10 col-sm-offset-1">
							<p><?php echo ossy_sanitize_html( $general_entry ); ?></p>
						</div><!--/.col-sm-10.col-sm-offset-1-->
					<?php endif; ?>
				</div><!--/.row-->
			</div><!--/.container-->
		</div><!--/.section-header-->
	<?php endif; ?>
	<div class="section-content">
		<div class="container">
			<div class="row">
				<?php
				if( is_active_sidebar( 'front-page-about-sidebar' ) ):
					dynamic_sidebar( 'front-page-about-sidebar' );
				elseif( current_user_can( 'edit_theme_options' ) & defined("ossy_COMPANION") ):
					$the_widget_args = array(
						'before_widget'	=> '<div class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-0 widget_ossy_skill">',
						'after_widget'	=> '</div>',
						'before_title'	=> '',
						'after_title'	=> ''
					);

					the_widget( 'ossy_Widget_Skill', 'title='. __( 'Typography', 'ossy' ) .'&percentage=60&icon=fa-font&color=#f18b6d', $the_widget_args );
					the_widget( 'ossy_Widget_Skill', 'title='. __( 'Design', 'ossy' ) .'&percentage=82&icon=fa-pencil&color=#f1d204', $the_widget_args );
					the_widget( 'ossy_Widget_Skill', 'title='. __( 'Development', 'ossy' ) .'&percentage=86&icon=fa-code&color=#6a4d8a', $the_widget_args );
				endif;
				?>
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.section-content-->
</section><!--/#about.front-page-section-->

<?php } ?>