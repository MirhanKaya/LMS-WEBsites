<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package edufix
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php Edufix_Theme_Helper::edufix_post_thumbnail(); ?>

    <div class="entry-content">
		<?php
			the_content();

			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'edufix'),
				'after' => '</div>',
			));
		?>
    </div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
