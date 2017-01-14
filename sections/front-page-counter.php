<?php
/**
 *	The template for displaying the counter section in front page.
 *
 *	@package WordPress
 *	@subpackage ossy
 */
?>

<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$counter_background_type = get_theme_mod( 'ossy_counter_background_type', 'image' );
	$counter_background_image = get_theme_mod( 'ossy_counter_background_image', esc_url( get_template_directory_uri() . '/layout/images/front-page/front-page-counter.jpg' ) );
	$counter_background_color = get_theme_mod( 'ossy_counter_background_color', '#000000' );
}else{
	$counter_background_type = get_theme_mod( 'ossy_counter_background_type' );
	$counter_background_image = get_theme_mod( 'ossy_counter_background_image' );
	$counter_background_color = get_theme_mod( 'ossy_counter_background_color' );	
}

?>

<?php
if( $counter_background_type == 'image' ):
	$counter_style = 'background-image: url('. esc_url( $counter_background_image ) .');';
elseif( $counter_background_type == 'color' ):
	$counter_style = 'background-color:' . $counter_background_color;
else :
	$counter_style = '';
endif;
?>

<?php if ( is_active_sidebar( 'front-page-counter-sidebar' ) ) { ?>

<section id="counter" class="front-page-section" style="<?php echo $counter_style; ?>">
	<div class="counter-overlay"></div>
	<div class="container">
		<div class="row inline-columns">
			<?php
			if( is_active_sidebar( 'front-page-counter-sidebar' ) ):
				dynamic_sidebar( 'front-page-counter-sidebar' );
			elseif( current_user_can( 'edit_theme_options' ) & defined("ossy_COMPANION") ):
				$the_widget_args = array(
					'before_widget'	=> '<div class="col-sm-4 widget_ossy_counter">',
					'after_widget'	=> '</div>',
					'before_title'	=> '',
					'after_title'	=> ''
				);

				the_widget( 'ossy_Widget_Counter', 'title='. __( 'Projects', 'ossy' ) .'&data_from=1&data_to=260&data_speed=2000&data_refresh_interval=100', $the_widget_args );
				the_widget( 'ossy_Widget_Counter', 'title='. __( 'Clients', 'ossy' ) .'&data_from=1&data_to=120&data_speed=2000&data_refresh_interval=100', $the_widget_args );
				the_widget( 'ossy_Widget_Counter', 'title='. __( 'Coffes', 'ossy' ) .'&data_from=1&data_to=260&data_speed=2000&data_refresh_interval=100', $the_widget_args );
			endif;
			?>
		</div><!--/.row-->
	</div><!--/.container-->
</section><!--/#counter.front-page-section-->

<?php } ?>