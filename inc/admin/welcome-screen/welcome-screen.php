<?php
/**
 * Welcome Screen Class
 */
class ossy_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'ossy_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'ossy_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'ossy_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'ossy_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'ossy_welcome', array( $this, 'ossy_welcome_getting_started' ), 	    10 );
		add_action( 'ossy_welcome', array( $this, 'ossy_welcome_actions_required' ),        20 );
		add_action( 'ossy_welcome', array( $this, 'ossy_welcome_github' ), 		            40 );
		add_action( 'ossy_welcome', array( $this, 'ossy_welcome_changelog' ), 				50 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_ossy_lite_dismiss_required_action', array( $this, 'ossy_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function ossy_welcome_register_menu() {
		add_theme_page( 'About ossy', 'About ossy', 'activate_plugins', 'ossy-welcome', array( $this, 'ossy_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function ossy_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'ossy_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function ossy_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing ossy! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'ossy' ), '<a href="' . esc_url( admin_url( 'themes.php?page=ossy-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=ossy-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with ossy', 'ossy' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function ossy_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_ossy-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'ossy-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'ossy-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array('jquery') );

			global $ossy_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('ossy_show_required_actions') ):
				$ossy_show_required_actions = get_option('ossy_show_required_actions');
			else:
				$ossy_show_required_actions = array();
			endif;

			if( !empty($ossy_required_actions) ):
				foreach( $ossy_required_actions as $ossy_required_action_value ):
					if(( !isset( $ossy_required_action_value['check'] ) || ( isset( $ossy_required_action_value['check'] ) && ( $ossy_required_action_value['check'] == false ) ) ) && ((isset($ossy_show_required_actions[$ossy_required_action_value['id']]) && ($ossy_show_required_actions[$ossy_required_action_value['id']] == true)) || !isset($ossy_show_required_actions[$ossy_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'ossy-welcome-screen-js', 'ossyLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no recomended actions for you right now.','ossy' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.8.2.4
	 */
	public function ossy_welcome_scripts_for_customizer() {

		wp_enqueue_style( 'ossy-welcome-screen-customizer-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome_customizer.css' );
		wp_enqueue_script( 'ossy-welcome-screen-customizer-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $ossy_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('ossy_show_required_actions') ):
			$ossy_show_required_actions = get_option('ossy_show_required_actions');
		else:
			$ossy_show_required_actions = array();
		endif;

		if( !empty($ossy_required_actions) ):
			foreach( $ossy_required_actions as $ossy_required_action_value ):
				if(( !isset( $ossy_required_action_value['check'] ) || ( isset( $ossy_required_action_value['check'] ) && ( $ossy_required_action_value['check'] == false ) ) ) && ((isset($ossy_show_required_actions[$ossy_required_action_value['id']]) && ($ossy_show_required_actions[$ossy_required_action_value['id']] == true)) || !isset($ossy_show_required_actions[$ossy_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'ossy-welcome-screen-customizer-js', 'ossyLiteWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=ossy-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','ossy'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @since 1.8.2.4
	 */
	public function ossy_dismiss_required_action_callback() {

		global $ossy_required_actions;

		$ossy_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $ossy_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($ossy_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('ossy_show_required_actions') ):

				$ossy_show_required_actions = get_option('ossy_show_required_actions');

				$ossy_show_required_actions[$ossy_dismiss_id] = false;

				update_option( 'ossy_show_required_actions',$ossy_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$ossy_show_required_actions_new = array();

				if( !empty($ossy_required_actions) ):

					foreach( $ossy_required_actions as $ossy_required_action ):

						if( $ossy_required_action['id'] == $ossy_dismiss_id ):
							$ossy_show_required_actions_new[$ossy_required_action['id']] = false;
						else:
							$ossy_show_required_actions_new[$ossy_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'ossy_show_required_actions', $ossy_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function ossy_welcome_screen() {

		?>

		<ul class="ossy-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','ossy'); ?></a></li>
			<li role="presentation" class="ossy-w-red-tab"><a href="#actions_required" aria-controls="actions_required" role="tab" data-toggle="tab"><?php esc_html_e( 'Actions recomended','ossy'); ?></a></li>
			<?php if ( defined("ossy_COMPANION") ) { ?>
				<li role="presentation"><a href="#demo_content" aria-controls="demo_content" role="tab" data-toggle="tab"><?php esc_html_e( 'Demo Content','ossy'); ?></a></li>
			<?php } ?>
			<li role="presentation"><a href="#github" aria-controls="github" role="tab" data-toggle="tab"><?php esc_html_e( 'Contribute','ossy'); ?></a></li>
			<li role="presentation"><a href="#changelog" aria-controls="changelog" role="tab" data-toggle="tab"><?php esc_html_e( 'Changelog','ossy'); ?></a></li>
		</ul>

		<div class="ossy-tab-content">

			<?php
			/**
			 * @hooked ossy_welcome_getting_started - 10
			 * @hooked ossy_welcome_actions_required - 20
			 * @hooked ossy_welcome_child_themes - 30
			 * @hooked ossy_welcome_github - 40
			 * @hooked ossy_welcome_changelog - 50
			 */
			do_action( 'ossy_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 * @since 1.8.2.4
	 */
	public function ossy_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Actions required
	 * @since 1.8.2.4
	 */
	public function ossy_welcome_actions_required() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/actions-required.php' );
	}

	/**
	 * Contribute
	 * @since 1.8.2.4
	 */
	public function ossy_welcome_github() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/github.php' );
	}

	/**
	 * Changelog
	 * @since 1.8.2.4
	 */
	public function ossy_welcome_changelog() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/changelog.php' );
	}
}

new ossy_Welcome();
