<?php
/**
 * header.php
 *
 * The header for the theme.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}

do_action( 'edufix_after_body' ); ?>

<div id="site-content" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'edufix' ); ?></a>

	<?php
	get_template_part( 'template-parts/popup-search' );
	//Site Header
	$meta         = get_post_meta( get_the_ID(), 'edufix_page_options', true );
	$header_style = edufix_option( 'header-layout', 'style-1' );
	$header_type  = isset( $meta['meta_header_type'] ) ? $meta['meta_header_type'] : '';

	if ( $header_type == '1' ) {
		$header_style = $meta['meta-header-layout'] ? $meta['meta-header-layout'] : '';
	}

	//            $header_style = $meta['meta-header-layout'] ? $meta['meta-header-layout'] : $header_style;

	if ( ! empty( $header_style ) ) {
		get_template_part( 'template-parts/header/header', $header_style );
	}

	if ( ! is_singular( 'post' ) ) {
		get_template_part( 'template-parts/header/page-header' );
	}

	?>

	<main id="main" class="site-main">