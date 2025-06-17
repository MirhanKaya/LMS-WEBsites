<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>

	<div class="edufix-wproducts">
		<div class="edufixwpro-img" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>)">
			<?php woocommerce_show_product_loop_sale_flash(); ?>
				<div class="tafo-wpro-addtocart">
					<?php woocommerce_template_loop_add_to_cart(); ?>
				</div>
		</div>
		<div class="edufix-wpro-item-content">
			<div class="edufix-wpro-title">
				<a href="<?php the_permalink(); ?>"><?php woocommerce_template_loop_product_title(); ?></a>
			</div>
			<div class="edufix-wpro-rprice row">
				<?php woocommerce_template_loop_rating(); ?>
				<?php woocommerce_template_loop_price(); ?>
			</div>
			<div class="edufix-plist-dec">
				<p><?php echo wp_trim_words( get_the_content(), 30 ); ?></p>
			</div>
			<div class="edufix-wpro-btn">

				<div class="edufix-wpro-btn-compare">
					<a href="<?php echo esc_url(site_url()); ?>/?action=yith-woocompare-add-product&amp;id=<?php echo get_the_ID();?>" class="compare" data-product_id="<?php echo get_the_ID();?>" rel="nofollow"><span class="fa fa-retweet"></span></a>
				</div>
				<div class="edufix-wpro-wishlist-btn">
					<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
				</div>
				<div  class="edufix-quick-view">
					<a href="#" class="yith-wcqv-button" data-product_id="<?php echo get_the_ID();?>"><span class="fa fa-eye"></span></a>
				</div>
			</div>
		</div>
	</div>
</li>
