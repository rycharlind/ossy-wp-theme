<?php
/**
 *    Sets up theme defaults and registers support for various WordPress features.
 *
 *    Note that this function is hooked into the after_setup_theme hook, which
 *    runs before the init hook. The init hook is too late for some features, such
 *    as indicating support for post thumbnails.
 */
if ( ! function_exists( 'ossy_setup' ) ) {
	add_action( 'after_setup_theme', 'ossy_setup' );
	function ossy_setup() {

		// Extras
		require_once trailingslashit( get_template_directory() ) . 'inc/extras.php';

		// Customizer
		require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer.php';

		// JetPack
		require_once trailingslashit( get_template_directory() ) . 'inc/jetpack.php';

		// TGM Plugin Activation
		require_once trailingslashit( get_template_directory() ) . 'inc/tgm-plugin-activation/tgm-plugin-activation.php';

		// Components
		require_once trailingslashit( get_template_directory() ) . 'inc/components/entry-meta/class.mt-entry-meta.php';
		require_once trailingslashit( get_template_directory() ) . 'inc/components/author-box/class.mt-author-box.php';
		require_once trailingslashit( get_template_directory() ) . 'inc/components/related-posts/class.mt-related-posts.php';
		require_once trailingslashit( get_template_directory() ) . 'inc/components/nav-walker/class.mt-nav-walker.php';


		// Load Theme Textdomain
		load_theme_textdomain( 'ossy', get_template_directory() . '/languages' );

		// Add Theme Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-background' );
		add_theme_support( 'custom-logo', array(
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'custom-header', array(
			'default-image'  => esc_url( get_template_directory_uri() . '/layout/images/blog/blog-header.png' ),
			'width'          => 1920,
			'height'         => 532,
			'flex-height'    => true,
			'random-default' => false,
			'header-text'    => false,
		) );

		// Add Image Size
		add_image_size( 'ossy-blog-list', 750, 500, true );
		add_image_size( 'ossy-widget-recent-posts', 70, 70, true );
		add_image_size( 'ossy-blog-post-related-articles', 240, 206, true );
		add_image_size( 'ossy-front-page-latest-news', 360, 213, true );
		add_image_size( 'ossy-front-page-testimonials', 127, 127, true );
		add_image_size( 'ossy-front-page-projects', 476, 476, true );
		add_image_size( 'ossy-front-page-person', 125, 125, true );

		// Register Nav Menus
		register_nav_menus( array(
			'primary-menu' => __( 'Primary Menu', 'ossy' ),
		) );

		/**
		 *  Back compatible
		 */
		require get_template_directory() . '/inc/back-compatible.php';

		/*******************************************/
		/*************  Welcome screen *************/
		/*******************************************/

		if ( is_admin() ) {

			global $ossy_required_actions;

			/*
			 * id - unique id; required
			 * title
			 * description
			 * check - check for plugins (if installed)
			 * plugin_slug - the plugin's slug (used for installing the plugin)
			 *
			 */
			$ossy_required_actions = array(
				array(
					"id"          => 'ossy-req-ac-install-ossy-companion',
					"title"       => esc_html__( 'Install ossy Companion', 'ossy' ),
					"description" => esc_html__( '', 'ossy' ),
					"check"       => defined( "ossy_COMPANION" ),
					"plugin_slug" => 'ossy-companion',
				),
				array(
					"id"          => 'ossy-req-ac-frontpage-latest-news',
					"title"       => esc_html__( 'Get the one page template', 'ossy' ),
					"description" => esc_html__( 'If you just installed ossy, and are not able to see the one page template, you need to go to Settings -> Reading , Front page displays and select "Static Page".', 'ossy' ),
					"check"       => ossy_is_not_latest_posts(),
				),
				array(
					"id"          => 'ossy-req-ac-install-contact-forms',
					"title"       => esc_html__( 'Install Contact Form 7', 'ossy' ),
					"description" => esc_html__( 'ossy works perfectly with Contact Form 7. Please install it & make sure you create at least 1 contact form before trying to set it on the front-page.', 'ossy' ),
					"check"       => defined( "WPCF7_PLUGIN" ),
					"plugin_slug" => 'contact-form-7',
				),
				array(
					"id"          => 'ossy-req-import-content',
					"title"       => esc_html__( 'Import Content', 'ossy' ),
					"description" => esc_html__( 'Import our demo content from Demo Content tab', 'ossy' ),
					"check"       => ossy_is_not_imported(),
				),
				array(
					"id"          => 'ossy-req-insert-content',
					"title"       => esc_html__( 'My content is missing', 'ossy' ),
					"description" => esc_html__( 'If you\'re viewing your website while being logged-out and you notice some of your settings / texts might be missing, that\'s happening because WordPress.org does not allow us to use demo content. 
					The best we could do is make it available for admins so that they at least know how the site might look with demo content. 
					This can be easily fixed in two ways: import our demo content, by going to the Import Demo Content tab, or by going through each setting in the customizer, editing it (adding a space and deleting it will do it) and clicking on save. We are sorry for the inconvenience.', 'ossy' ),
					"check"       => ossy_is_not_imported(),
				),
			);

			require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
		}

	}

	// Add Editor Style
	add_editor_style( 'ossy-google-fonts' );

}

if ( ! function_exists( 'ossy_is_not_latest_posts' ) ) {
	function ossy_is_not_latest_posts() {
		return ( 'page' == get_option( 'show_on_front' ) ? true : false );
	}
}

if ( ! function_exists( 'ossy_is_not_imported' ) ) {
	function ossy_is_not_imported() {

		if ( defined( "ossy_COMPANION" ) ) {
			$ossy_show_required_actions = get_option( 'ossy_show_required_actions' );
			if ( isset( $ossy_show_required_actions['ossy-req-import-content'] ) ) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}

	}
}


/**
 *    Set the content width in pixels, based on the theme's design and stylesheet.
 *
 *    Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if ( ! function_exists( 'ossy_content_width' ) ) {
	add_action( 'after_setup_theme', 'ossy_content_width', 0 );
	function ossy_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'ossy_content_width', 640 );
	}
}

/**
 *    WP Enqueue Stylesheets
 */
if ( ! function_exists( 'ossy_enqueue_stylesheets' ) ) {
	add_action( 'wp_enqueue_scripts', 'ossy_enqueue_stylesheets' );

	function ossy_enqueue_stylesheets() {

		// Google Fonts
		$google_fonts_args = array(
			'family' => 'Source+Sans+Pro:400,900,700,300,300italic',
		);

		// WP Register Style
		wp_register_style( 'ossy-google-fonts', add_query_arg( $google_fonts_args, 'https://fonts.googleapis.com/css' ), array(), null );

		// WP Enqueue Style
		if ( get_theme_mod( 'ossy_preloader_enable', 1 ) == 1 ) {
			wp_enqueue_style( 'ossy-pace', get_template_directory_uri() . '/layout/css/pace.min.css', array(), '', 'all' );
		}

		wp_enqueue_style( 'ossy-google-fonts' );
		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/layout/css/bootstrap.min.css', array(), '3.3.6', 'all' );
		wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/layout/css/bootstrap-theme.min.css', array(), '3.3.6', 'all' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/layout/css/font-awesome.min.css', array(), '4.5.0', 'all' );
		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/layout/css/owl-carousel.min.css', array(), '2.0.0', 'all' );
		wp_enqueue_style( 'ossy-main', get_template_directory_uri() . '/layout/css/main.css', array(), '', 'all' );
		wp_enqueue_style( 'ossy-custom', get_template_directory_uri() . '/layout/css/custom.min.css', array(), '', 'all' );
		wp_enqueue_style( 'ossy-style', get_stylesheet_uri(), array(), '1.0.16', 'all' );
	}
}


/**
 *    WP Enqueue JavaScripts
 */
if ( ! function_exists( 'ossy_enqueue_javascripts' ) ) {
	add_action( 'wp_enqueue_scripts', 'ossy_enqueue_javascripts' );

	function ossy_enqueue_javascripts() {
		if ( get_theme_mod( 'ossy_preloader_enable', 1 ) == 1 ) {
			wp_enqueue_script( 'ossy-pace', get_template_directory_uri() . '/layout/js/pace/pace.min.js', array( 'jquery' ), '', false );
		}
		wp_enqueue_script( 'jquery-ui-progressbar', '', array( 'jquery' ), '', true );
		wp_enqueue_script( 'ossy-bootstrap', get_template_directory_uri() . '/layout/js/bootstrap/bootstrap.min.js', array( 'jquery' ), '3.3.6', true );
		wp_enqueue_script( 'ossy-owl-carousel', get_template_directory_uri() . '/layout/js/owl-carousel/owl-carousel.min.js', array( 'jquery' ), '2.0.0', true );
		wp_enqueue_script( 'ossy-count-to', get_template_directory_uri() . '/layout/js/count-to/count-to.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'ossy-visible', get_template_directory_uri() . '/layout/js/visible/visible.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'ossy-plugins', get_template_directory_uri() . '/layout/js/plugins.min.js', array( 'jquery' ), '1.0.16', true );
		wp_enqueue_script( 'ossy-scripts', get_template_directory_uri() . '/layout/js/scripts.min.js', array( 'jquery' ), '1.0.16', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}


/**
 *    Widgets
 */
if ( ! function_exists( 'ossy_widgets' ) ) {
	add_action( 'widgets_init', 'ossy_widgets' );

	function ossy_widgets() {

		// Blog Sidebar
		register_sidebar( array(
			'name'          => __( 'Blog Sidebar', 'ossy' ),
			'id'            => 'blog-sidebar',
			'description'   => __( 'The widgets added in this sidebar will appear in blog page.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );

		// Page Sidebar
		register_sidebar( array(
			'name'          => __( 'Page Sidebar', 'ossy' ),
			'id'            => 'page-sidebar',
			'description'   => __( 'The widgets added in this sidebar will appear on single pages.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );

		// Footer Sidebar 1
		register_sidebar( array(
			'name'          => __( 'Footer Sidebar 1', 'ossy' ),
			'id'            => 'footer-sidebar-1',
			'description'   => __( 'The widgets added in this sidebar will appear in first block from footer.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );

		// Footer Sidebar 2
		register_sidebar( array(
			'name'          => __( 'Footer Sidebar 2', 'ossy' ),
			'id'            => 'footer-sidebar-2',
			'description'   => __( 'The widgets added in this sidebar will appear in second block from footer.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );

		// Footer Sidebar 3
		register_sidebar( array(
			'name'          => __( 'Footer Sidebar 3', 'ossy' ),
			'id'            => 'footer-sidebar-3',
			'description'   => __( 'The widgets added in this sidebar will appear in third block from footer.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title"><h3>',
			'after_title'   => '</h3></div>',
		) );

		// About Sidebar
		register_sidebar( array(
			'name'          => __( 'Front page - About Sidebar', 'ossy' ),
			'id'            => 'front-page-about-sidebar',
			'description'   => __( 'The widgets added in this sidebar will appear in about section from front page.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-0 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

		// Projects Sidebar
		register_sidebar( array(
			'name'          => __( 'Front page - Projects Sidebar', 'ossy' ),
			'id'            => 'front-page-projects-sidebar',
			'description'   => __( 'The widgets added in this sidebar will appear in projects section from front page.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="col-sm-3 col-xs-6 no-padding %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

		// Services Sidebar
		register_sidebar( array(
			'name'          => __( 'Front page - Services Sidebar', 'ossy' ),
			'id'            => 'front-page-services-sidebar',
			'description'   => __( 'The widgets added in this sidebar will appear in services section from front page.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="col-sm-4 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

		// Counter Sidebar
		register_sidebar( array(
			'name'          => __( 'Front page - Counter Sidebar', 'ossy' ),
			'id'            => 'front-page-counter-sidebar',
			'description'   => __( 'The widgets added in this sidebar will appear in counter section from front page.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="col-sm-4 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

		// Team Sidebar
		register_sidebar( array(
			'name'          => __( 'Front page - Team Sidebar', 'ossy' ),
			'id'            => 'front-page-team-sidebar',
			'description'   => __( 'The widgets added in this sidebar will appear in team section from front page.', 'ossy' ),
			'before_widget' => '<div id="%1$s" class="col-sm-4 col-sm-offset-0 col-xs-10 col-xs-offset-1 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

		// WooCommerce Sidebar
		if ( class_exists( 'WooCommerce' ) ) {
			register_sidebar( array(
				'name'          => __( 'WooCommerce Sidebar', 'ossy' ),
				'id'            => 'woocommerce-sidebar',
				'description'   => __( 'The widgets added in this sidebar will appear in WooCommerce pages.', 'ossy' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="widget-title"><h3>',
				'after_title'   => '</h3></div>',
			) );
		}
	}
}


/**
 *  Checkbox helper function
 */
if ( ! function_exists( 'ossy_value_checkbox_helper' ) ) {
	function ossy_value_checkbox_helper( $value ) {
		if ( $value == 1 ) {
			return 1;
		} else {
			return 0;
		}
	}
}

add_action( 'ossy_after_content_above_footer', "ossy_pagination", 1 );

function ossy_pagination() {
	the_posts_pagination( array(
		'prev_text'          => '<i class="fa fa-angle-left"></i>',
		'next_text'          => '<i class="fa fa-angle-right"></i>',
		'screen_reader_text' => '',
	) );
}


if ( !function_exists( 'ossy_get_tgmpa_url' ) ) {
	function ossy_get_tgmpa_url() {
		return add_query_arg(
			array(
				'page' => urlencode( 'tgmpa-install-plugins' ),
			),
			self_admin_url( 'themes.php' )
		);
	}
}
