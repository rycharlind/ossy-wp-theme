<?php
/**
 * Getting started template
 */

$customizer_url = wp_customize_url() ;
?>

<div id="getting_started" class="ossy-tab-pane active">

	<div class="ossy-tab-pane-center">

		<h1 class="ossy-welcome-title"><?php _e('Welcome to ossy!', 'ossy'); ?> <?php if( !empty($ossy_lite['Version']) ): ?> <sup id="ossy-theme-version"><?php echo esc_attr( $ossy_lite['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php esc_html_e( 'Our most popular free one page WordPress theme, ossy!','ossy'); ?></p>
		<p><?php esc_html_e( 'We want to make sure you have the best experience using ossy and that is why we gathered here all the necessary information for you. We hope you will enjoy using ossy, as much as we enjoy creating great products.', 'ossy' ); ?>

	</div>

	<hr />

	<div class="ossy-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'ossy' ); ?></h1>

		<h4><?php esc_html_e( 'Customize everything in a single place.' ,'ossy' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'ossy' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'ossy' ); ?></a></p>

	</div>

	<hr />

</div>
