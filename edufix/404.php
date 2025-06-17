<?php
/**
 * The template for displaying 404 pages (Not Found).
 * @package edufix
 * by Xcodexe
 */

$image = edufix_option( 'error_image');
$error_title = edufix_option( 'error_title');
$error_content = edufix_option( 'error_description' );

get_header();

?>

<section class="error_page">
	<div class="container">
        <div class="error_page_wrapper text-center">
            <div class="error-page-content">
                <?php if ( ! empty( $image )) : ?>
                    <div class="error-image">                   
                        <img src="<?php echo esc_url($image['url']) ?>" alt="<?php echo esc_attr( bloginfo('name') ); ?>">
                    </div>
                <?php endif; ?>

                <div class="error-info">
                    <?php if ( ! empty( $error_title )) : ?>
                        <h2 class="error-title"><?php echo esc_html($error_title); ?></h2>
                    <?php endif; ?>
                    <?php if ( ! empty( $error_content )) : ?>
                        <p class="lead"><?php echo esc_html($error_content); ?></p>
                    <?php endif; ?>

                    <a href="<?php echo esc_url(home_url('/')); ?>" class="at-btn"><?php echo esc_html__('Back to Home', 'edufix') ?></a>
                </div>
            </div>
        </div>
	</div>
</section>

<?php

get_footer();

