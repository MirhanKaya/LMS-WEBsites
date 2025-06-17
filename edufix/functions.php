<?php
/**
 * edufix functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package edufix
 */

/**
* Path Define
*/

define( 'EDUFIX_THEME_DIR', get_template_directory() );
define( 'EDUFIX_THEME_URI', get_template_directory_uri() );


/**
 * Implement the Custom Header feature.
 */
require EDUFIX_THEME_DIR . '/inc/custom-header.php';

/**
 * Load All Classes.
 */
require_once EDUFIX_THEME_DIR .'/inc/class/theme-autoload.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require EDUFIX_THEME_DIR . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require EDUFIX_THEME_DIR . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require EDUFIX_THEME_DIR . '/inc/jetpack.php';
}

/**
 * Filter the categories archive widget to add a span around post count
 */
function edufix_cat_count_span($links) {
	$links = str_replace('</a> ', ' <span class="post-count">', $links);
	$links = str_replace(')', ')</span></a>', $links);
	return $links;
}

add_filter('wp_list_categories', 'edufix_cat_count_span');

/**
 * Filter the archives widget to add a span around post count
 */
function edufix_archive_count_span($links) {
	$links = str_replace('</a>&nbsp;(', '<span class="post-count">(', $links);
	$links = str_replace(')', ')</span></a>', $links);
	return $links;
}

add_filter('get_archives_link', 'edufix_archive_count_span');

add_filter( 'get_archives_link', 'edufix_archive_count_span' );

if (!function_exists('edufix_reorder_comment_fields')) {
    function edufix_reorder_comment_fields($fields ) {
        $new_fields = array();

        $myorder = array('author', 'email', 'url', 'comment');

        foreach( $myorder as $key ){
            $new_fields[ $key ] = isset($fields[ $key ]) ? $fields[ $key ] : '';
            unset( $fields[ $key ] );
        }

        if( $fields ) {
            foreach( $fields as $key => $val ) {
                $new_fields[ $key ] = $val;
            }
        }

        return $new_fields;
    }
}

add_filter('comment_form_fields', 'edufix_reorder_comment_fields');

/** Woocommerce Include ***/
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Disable Gutenberg block editor for widgets
add_filter( 'use_widgets_block_editor', '__return_false' );
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

if( class_exists('LearnPress') ) :
    add_filter( 'learn-press/override-templates', function(){ return true; } );
    remove_action( 'learn-press/before-main-content', LearnPress::instance()->template( 'general' )->func( 'breadcrumb' ) );
endif;