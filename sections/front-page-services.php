<?php
/**
 *	The template for displaying services section in front page.
 *
 *	@package WordPress
 *	@subpackage ossy
 */
?>
<?php
if ( current_user_can( 'edit_theme_options' ) ) {
	$services_general_title = get_theme_mod( 'ossy_services_general_title', __( 'Services', 'ossy' ) );
	$services_general_entry = get_theme_mod( 'ossy_services_general_entry', __( 'In order to help you grow your business, our carefully selected experts can advise you in in the following areas:', 'ossy' ) );
	
	$service_title_1 = get_theme_mod( 'ossy_service_title_1', __( 'Service 1', 'ossy' )  );
	$service_desc_1 = get_theme_mod( 'ossy_service_desc_1', __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'ossy' )  );
	$service_image_1   = get_theme_mod( 'ossy_service_image_1', esc_url( get_template_directory_uri() . '/layout/images/services/service-wheel.jpg' ) );
	
	$service_title_2 = get_theme_mod( 'ossy_service_title_2', __( 'Service 2', 'ossy' )  );
	$service_desc_2 = get_theme_mod( 'ossy_service_desc_2', __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'ossy' )  );
	$service_image_2   = get_theme_mod( 'ossy_service_image_2', esc_url( get_template_directory_uri() . '/layout/images/services/service-wheel.jpg' ) );

	$service_title_3 = get_theme_mod( 'ossy_service_title_3', __( 'Service 3', 'ossy' )  );
	$service_desc_3 = get_theme_mod( 'ossy_service_desc_3', __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'ossy' )  );
	$service_image_3   = get_theme_mod( 'ossy_service_image_3', esc_url( get_template_directory_uri() . '/layout/images/services/service-wheel.jpg' ) );

} else {
	$services_general_title = get_theme_mod( 'ossy_services_general_title' );
	$services_general_entry = get_theme_mod( 'ossy_services_general_entry' );
}

?>

<?php if ( $services_general_title != '' || $services_general_entry != '' || is_active_sidebar( 'front-page-services-sidebar' ) ) { ?>

<section id="services" class="front-page-section">
	<?php if( $services_general_title || $services_general_entry ): ?>
		<div class="section-header">
			<div class="container">
				<div class="row">
					<?php if( $services_general_title ): ?>
						<div class="col-sm-12">
							<h3><?php echo ossy_sanitize_html( $services_general_title ); ?></h3>
						</div><!--/.col-sm-12-->
					<?php endif; ?>
					<?php if( $services_general_entry ): ?>
						<div class="col-sm-10 col-sm-offset-1">
							<p><?php echo ossy_sanitize_html( $services_general_entry ); ?></p>
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
				if( is_active_sidebar( 'front-page-services-sidebar' ) ):
					dynamic_sidebar( 'front-page-services-sidebar' );
				elseif( current_user_can( 'edit_theme_options' ) & defined("ossy_COMPANION") ):
					$style1 = 'background-image: url(' . esc_url( $service_image_1 ) . ');';
					$style2 = 'background-image: url(' . esc_url( $service_image_2 ) . ');';
					$style3 = 'background-image: url(' . esc_url( $service_image_3 ) . ');';
				?>
					<div id="service1" class="col-md-4 service">
						<div class="service-title"><?php echo $service_title_1 ?></div>
						<div class="service-desc"><?php echo $service_desc_1 ?></div>
						<div class="service-image" style="<?php echo $style1 ?>"></div>
					</div>
					<div id="service2" class="col-md-4 service">
						<div class="service-title"><?php echo $service_title_2 ?></div>
						<div class="service-desc"><?php echo $service_desc_2 ?></div>
						<div class="service-image" style="<?php echo $style2 ?>"></div>
					</div>
					<div id="service3" class="col-md-4 service">
						<div class="service-title"><?php echo $service_title_3 ?></div>
						<div class="service-desc"><?php echo $service_desc_3 ?></div>
						<div class="service-image" style="<?php echo $style3 ?>"></div>
					</div>
					
					<!-- If you want to use the the_widget
					$the_widget_args = array(
						'before_widget'	=> '<div class="col-sm-4 widget_ossy_service">',
						'after_widget'	=> '</div>',
						'before_title'	=> '',
						'after_title'	=> ''
					);

					the_widget( 'ossy_Widget_Service', 'title='. __( 'Rent', 'ossy' ) .'&icon=fa-pencil&entry='. __( 'Consectetur adipiscing elit. Praesent molestie urna hendrerit erat tincidunt tempus. Aliquam a leo risus. Fusce a metus non augue dapibus porttitor at in mauris. Pellentesque commodo...', 'ossy' ) .'&color=#f18b6d', $the_widget_args );
					the_widget( 'ossy_Widget_Service', 'title='. __( 'Sell', 'ossy' ) .'&icon=fa-code&entry='. __( 'Consectetur adipiscing elit. Praesent molestie urna hendrerit erat tincidunt tempus. Aliquam a leo risus. Fusce a metus non augue dapibus porttitor at in mauris. Pellentesque commodo...', 'ossy' ) .'&color=#f1d204', $the_widget_args );
					the_widget( 'ossy_Widget_Service', 'title='. __( 'Buy', 'ossy' ) .'&icon=fa-search&entry='. __( 'Consectetur adipiscing elit. Praesent molestie urna hendrerit erat tincidunt tempus. Aliquam a leo risus. Fusce a metus non augue dapibus porttitor at in mauris. Pellentesque commodo...', 'ossy' ) .'&color=#6a4d8a', $the_widget_args );
					-->

				<?php
				endif;
				?>
			</div><!--/.row-->
		</div><!--/.container-->
	</div><!--/.section-content-->
</section><!--/#services.front-page-section-->

<?php } ?>