<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package edufix
 */

    $meta = get_post_meta( get_the_ID(), 'edufix_page_options', true );
    /**
     * Displays footer widgets if assigned
     */

    $overlay_bg = edufix_option('footer__overlay_bg');

    ?>

        </main><!-- /#site-main -->
    </div><!-- /#site-content -->
    <footer id="site_footer" class="site-footer">
        <?php if (!empty($overlay_bg['url'])) : ?>
            <div class="overlay-bg" data-bg-image="<?php echo esc_url($overlay_bg['url']); ?>"></div>
        <?php endif;


		/**
         * Displays footer newsletter area
         */
        if(edufix_option('show_newsletter') == true) { ?>
            <div class="footer-newsletter-area">
                <div class="container">
                    <div class="footer-newsletter-inner">
                        <div class="row">
                            <div class="col-md-6 col-lg-7">
                                <div class="newsletter-logo">
									<?php
									$footer_newsletter_logo = edufix_option('footer_newsletter_logo');
									if( !empty($footer_newsletter_logo['url']) ) { ?>
										<a class='mb-3 mb-md-0 d-block' href="<?php echo esc_url( home_url( '/' ) ) ?>">
											<img src="<?php echo $footer_newsletter_logo['url']; ?>" alt="Logo">
										</a>
										<?php
									} ?>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-5 d-flex align-items-center">
                                <div class="newsletter-form w-100">
                                    <?php
                                    if(!empty( edufix_option('newsletter_shortcode') )) : 
										echo do_shortcode( edufix_option('newsletter_shortcode') );
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

		/**
         * Displays footer top info
         */
		$show_footer_top = edufix_option('show_footer_top');
		if($show_footer_top === '1') { ?>
			<div class="footer-top-info">
				<div class="container">
					<div class="row">
						<div class="col-lg-6">
							<div class="footer-top">
								<div class="footer-top-logo">
									<?php
									$footer_top_logo = edufix_option('footer_top_logo');
									$footer_top_cont = edufix_option('footer_top_text');
									if( !empty($footer_top_logo['url']) ) { ?>
										<a class='mb-2 d-block' href="<?php echo esc_url( home_url( '/' ) ) ?>">
											<img src="<?php echo $footer_top_logo['url']; ?>" alt="Logo">
										</a>
										<?php
									}
									
									if( !empty($footer_top_cont) ) {
										echo "<p>" . $footer_top_cont . "</p>";
									} ?>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="footer-top-cocials d-flex justify-content-end align-items-center">
								<?php
								$profail_link = edufix_option('social_links');
								if (!empty($profail_link)) :
									echo '<ul class="footer-social-link my-0">';
									foreach ($profail_link as $item) : ?>
										<li>
											<a href="<?php echo esc_url($item['url']); ?>">
												<i class="<?php echo esc_attr($item['icon']); ?>"></i>
											</a>
										</li>
									<?php
									endforeach;
									echo '</ul>';
								endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php 
		} ?>

        <?php
        if (is_active_sidebar('footer_column_1') ||
            is_active_sidebar('footer_column_2') ||
            is_active_sidebar('footer_column_3') ||
            is_active_sidebar('footer_column_4')) :
            ?>
            <div class="footer-wrapper">
                
                <div class="container">
                    <aside class="row">
                        <?php for ($i = 1; $i <= 4; $i++):
                            $area_display[] = get_theme_mod('edufix_widget_area_' . $i . '_display', true);
                            $area_1_column = get_theme_mod('edufix_widget_area_' . $i . '_column', 'col-lg-3');

                            ?>
                            <div class="col-sm-6 <?php echo esc_attr($area_1_column) ?>">
                                <?php
                                if (is_active_sidebar('footer_column_' . $i) && $area_1_column == true):
                                    dynamic_sidebar('footer_column_' . $i);
                                endif;
                                ?>
                            </div>
                        <?php endfor; ?>
                    </aside><!-- .widget-area -->
                </div><!-- .container -->
            </div><!-- /.footer-wrapper -->
        <?php endif;

        /**
         * Displays footer copyright area
         */

        ?>
        <div class="site-info">
            <div class="container">
            	<div class="site-info-wrapper">
					<?php
					$copyright_style = edufix_option('footer_copyright_style');

					if( $copyright_style === 'copy_text_center' ) { ?>
						<div class="copyright text-center">
							<p>
								<?php
								$copy_text = edufix_option('copyright_text');
								$allowed_html = array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'p' => array(),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
								);

								if (!empty($copy_text)) {
									echo wp_kses($copy_text, $allowed_html);
								} else {

									echo sprintf(
										esc_html__('&copy; %1$s %2$s - All Rights Reserved Made by %3$s', 'edufix'),
										date('Y'),
										get_bloginfo('name'),
										'<a href="' . esc_url('https://xcodexe.com/') . '">' . esc_html__('Xcodexe', 'edufix') . '</a>'
									);
								} ?>
							</p>
						</div>
					<?php
					} else { ?>
						<div class="copyright row">
							<div class='col-md-6 text-center text-md-left mb-1 mb-md-0'>
								<p>
									<?php
									$copy_text = edufix_option('copyright_text');
									$allowed_html = array(
										'a' => array(
											'href' => array(),
											'title' => array()
										),
										'p' => array(),
										'br' => array(),
										'em' => array(),
										'strong' => array(),
									);

									if (!empty($copy_text)) {
										echo $copy_text;
									} else {

										echo sprintf(
											esc_html__('&copy; %1$s %2$s - All Rights Reserved Made by %3$s', 'edufix'),
											date('Y'),
											get_bloginfo('name'),
											'<a href="' . esc_url('https://xcodexe.com/') . '">' . esc_html__('Xcodexe', 'edufix') . '</a>'
										);
									}
									?>
								</p>
							</div>
							<div class='col-md-6'>
								<div class="footer-copyright-menu-wraper text-right">
									<?php
									if (has_nav_menu('footer')) {
										wp_nav_menu(
											array(
												'theme_location' => 'footer',
											)
										);
									} else {
										echo '<ul class="add-menu clearfix mb-0 list-unstyled"><li><a target="_blank" href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Add Menu', 'edufix') . '</a></li></ul>';
									} ?>
								</div>
							</div>
						</div>
						<?php
					}
					?>

                </div>
                <!-- /.site-info-wrapper -->
            </div>
            <!-- /.container -->
        </div>

        <!-- back to top -->
        <div class="btt-wrap">
            <svg class="btt-circle svg-content" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
            </svg>
        </div>

    </footer><!-- #site-footer -->

    <?php
	wp_footer(); ?>
    </body>
</html>
