<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Edufix Theme Support
 *
 *
 * @class        Edufix_Theme_Support
 * @version      1.0
 * @category     Class
 * @author       Xcodexe
 */

if ( ! class_exists( 'Edufix_Theme_Support' ) ) {
	class Edufix_Theme_Support {

		private static $instance = null;

		public static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function __construct() {
			//Register Nav Menu
			add_action( 'init', array( $this, 'register_my_menus' ) );
			//Add translation file
			add_action( 'init', array( $this, 'enqueue_translation_files' ) );
			//Add widget support
			add_action( 'widgets_init', array( $this, 'sidebar_register' ) );

			add_action( 'after_setup_theme', array( $this, 'edufix_setup' ) );
			add_action( 'after_setup_theme', array( $this, 'edufix_content_width' ) );
			add_action( 'after_switch_theme', [ $this, 'add_cpt_support' ] );


			add_theme_support( 'align-wide' );
			add_theme_support( 'wp-block-styles' );
			add_theme_support( "responsive-embeds" );
			add_theme_support( 'editor-styles' );
			add_editor_style( 'style-editor.css' );
		}


		function edufix_setup() {

			if ( function_exists( 'add_theme_support' ) ) {
				add_theme_support( 'post-thumbnails' );
				set_post_thumbnail_size( 770, 465, array( 'center', 'center' ) ); // Hard crop center center

				add_theme_support( 'automatic-feed-links' );
				add_theme_support( 'revisions' );
				add_theme_support( 'title-tag' );
				add_theme_support( 'post-formats', array( 'gallery', 'video', 'quote', 'audio', 'link' ) );
				add_theme_support( 'html5', array(
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption'
				) );
				add_theme_support( 'woocommerce' );


				// Set up the WordPress core custom background feature.
				add_theme_support( 'custom-background', apply_filters( 'edufix_custom_background_args', array(
					'default-color' => 'ffffff',
					'default-image' => '',
				) ) );

				/**
				 * Add support for core custom logo.
				 *
				 * @link https://codex.wordpress.org/Theme_Logo
				 */
				add_theme_support( 'custom-logo', array(
					'height'      => 50,
					'width'       => 200,
					'flex-width'  => true,
					'flex-height' => true,
				) );

				//Image Size		
				add_image_size( 'edufix-recent-post-thumb', 100, 100, true );
				add_image_size( 'edufix-470x285', 470, 285, true );
				add_image_size( 'edufix-470x535', 470, 535, true );
				add_image_size( 'edufix-portfolio', 530, 400, true );
				add_image_size( 'edufix-portfolio-grid', 480, 480, true );
				add_image_size( 'edufix-portfolio-carousel', 540, 700, true );
				add_image_size( 'edufix-370x425', 370, 425, true );
				add_image_size( 'edufix-670x600', 670, 600, true );
			}
		}


		public function register_my_menus() {
			register_nav_menus(
				array(
					'primary' => esc_html__( 'Primary Menu', 'edufix' ),
					'footer' => esc_html__( 'Footer Menu', 'edufix' ),
				)
			);
		}

		public function enqueue_translation_files() {
			load_theme_textdomain( 'edufix', get_template_directory() . '/languages/' );
		}

		public function sidebar_register() {

			// Default wrapper for widget and title
			$wrapper_before = '<div id="%1$s" class="widget edufix_widget %2$s">';
			$wrapper_after  = '</div>';
			$title_before   = '<h3 class="widget-title">';
			$title_after    = '</h3>';

			register_sidebar( array(
				'name'          => esc_html( 'Sidebar Main', 'edufix' ),
				'id'            => "sidebar_main-sidebar",
				'description'   => esc_html__( 'Add widget here to appear it in sidebar.', 'edufix' ),
				'before_widget' => $wrapper_before,
				'after_widget'  => $wrapper_after,
				'before_title'  => $title_before,
				'after_title'   => $title_after,
			));

			// Register Footer Sidebar
			$footer_columns = array(
				array(
					'name' => esc_html__( 'Footer Column 1', 'edufix' ),
					'id'   => 'footer_column_1'
				),
				array(
					'name' => esc_html__( 'Footer Column 2', 'edufix' ),
					'id'   => 'footer_column_2'
				),
				array(
					'name' => esc_html__( 'Footer Column 3', 'edufix' ),
					'id'   => 'footer_column_3'
				),
				array(
					'name' => esc_html__( 'Footer Column 4', 'edufix' ),
					'id'   => 'footer_column_4'
				),
			);

			foreach ( $footer_columns as $key => $footer_column ) {
				register_sidebar( array(
					'name'          => $footer_column['name'],
					'id'            => $footer_column['id'],
					'description'   => esc_html__( 'This area will display in footer like a column. Add widget here to appear it in footer column.', 'edufix' ),
					'before_widget' => $wrapper_before,
					'after_widget'  => $wrapper_after,
					'before_title'  => $title_before,
					'after_title'   => $title_after,
				) );
			}

			register_sidebar( array(
				'name'          => esc_html( 'Sidebar Shop', 'edufix' ),
				'id'            => "sidebar_shop-sidebar",
				'description'   => esc_html__( 'Add widget here to appear it in sidebar.', 'edufix' ),
				'before_widget' => $wrapper_before,
				'after_widget'  => $wrapper_after,
				'before_title'  => $title_before,
				'after_title'   => $title_after,
			));

			register_sidebar( array(
				'name'          => esc_html( 'Sidebar Hamburger', 'edufix' ),
				'id'            => "sidebar_hamburger-sidebar",
				'description'   => esc_html__( 'Add widget here to appear it in sidebar.', 'edufix' ),
				'before_widget' => $wrapper_before,
				'after_widget'  => $wrapper_after,
				'before_title'  => $title_before,
				'after_title'   => $title_after,
			));
		}

		/**
		 * Set the content width in pixels, based on the theme's design and stylesheet.
		 *
		 * Priority 0 to make it available to lower priority callbacks.
		 *
		 * @global int $content_width
		 */
		function edufix_content_width() {
			// This variable is intended to be overruled from themes.
			// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
			// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
			$GLOBALS['content_width'] = apply_filters( 'edufix_content_width', 1170 );
		}

		/**
		 * Enable default Elementor Editor for custom post type.
		 */
		public function add_cpt_support() {
			//if exists, assign to $cpt_support var.
			$cpt_support = get_option( 'elementor_cpt_support' );

			//check if option DOESN'T exist in db.
			if ( ! $cpt_support ) {
				// Create array of our default supported post types.
				$cpt_support = [
					'page',
					'post',
					'portfolio',
				];
				update_option( 'elementor_cpt_support', $cpt_support );

			} else {

				if ( ! in_array( 'portfolio', $cpt_support ) ) {
					$cpt_support[] = 'portfolio';
				}

				update_option( 'elementor_cpt_support', $cpt_support );
			}
		}

	}

	new Edufix_Theme_Support();
}
