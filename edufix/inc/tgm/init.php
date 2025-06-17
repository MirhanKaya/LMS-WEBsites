<?php
/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Edufix
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */

require get_parent_theme_file_path( '/inc/tgm/class-tgm-plugin-activation.php' );

add_action( 'tgmpa_register', 'edufix_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function edufix_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Corpox Addons Plugin
		array(
			'name'     => esc_attr__( 'Edufix Core', 'edufix' ),
			'slug'     => 'edufix-core',
			'source'   => ( 'https://wp.xcodexe.com/edufix/plugins/edufix-core.zip' ),
			'required' => true,
			'version'  => '1.0.0',
		),	

		// Codestar Framework
		array(
			'name'     => esc_attr__( 'Codestar Framework', 'edufix' ),
			'slug'     => 'codestar-framework',
			'source'   => ( 'https://xcodexe.com/codestar-framework/codestar-framework.zip' ),
			'required' => true,
		),	

		// Elementor
		array(
			'name'     => esc_attr__( 'Elementor', 'edufix' ),
			'slug'     => 'elementor',
			'required' => true,
		),

		// Contact Form 7
		array(
			'name'     => esc_attr__( 'Contact Form 7', 'edufix' ),
			'slug'     => 'contact-form-7',
			'required' => true,
		),

		// One Click Demo Import
		array(
			'name'     => esc_attr__( 'One Click Demo Import', 'edufix' ),
			'slug'     => 'one-click-demo-import',
			'required' => false,
		),

		// Mailchimp for WordPress
		array(
			'name'     => esc_attr__( 'MC4WP: Mailchimp for WordPress', 'edufix' ),
			'slug'     => 'mailchimp-for-wp',
			'required' => false,
		),

		// Learnpress
		array(
			'name'     => esc_attr__( 'Learnpress', 'edufix' ),
			'slug'     => 'learnpress',
			'required' => true,
		),

	);

	/*
	 * Config for TGMPA
	 */
	$config = array(
		'id'           => 'edufix',
		'default_path' => '',
		'menu'         => 'edufix-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}