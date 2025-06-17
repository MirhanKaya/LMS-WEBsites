<?php
/**
 * The Header Layout 1.
 *
 * @since   1.0.0
 * @package edufix
 */

$meta = get_post_meta( get_the_ID(), 'edufix_page_options', true );
$container = $transparent = '';
$is_fixed = edufix_option('header_sticky');
$mobile_is_fixed = edufix_option('header_sticky_mobile');
$fixed_initial_offset = edufix_option('sticky_offset');
$transparent_menu = edufix_option('transparent_menu');
$sticky = edufix_option('sticky_logo');
$logo_contrast = !empty($sticky['url']) ? $sticky['url'] : '';
$transparent_menu_meta = isset($meta['meta-transparent_menu']) ? $meta['meta-transparent_menu'] : '';
$logo_contrast = !empty($meta['meta_sticky_logo']['url']) ? $meta['meta_sticky_logo']['url'] : $logo_contrast;
$header_type = isset($meta['meta_header_type']) ? $meta['meta_header_type'] : '';
$topbar = edufix_option('topbar_switch');

$header_classes = '';

if ($transparent_menu) {
    $header_classes = ' header-transparent';
}

if ( $header_type ) {
    $header_classes = $transparent_menu_meta ? $header_classes = ' header-transparent' : '';
    $topbar = $meta['meta_topbar_switch'];
}

?>

<header id="masthead" class="site-header header-2 header-width<?php echo esc_attr($header_classes); ?>"
    <?php if ($is_fixed && !empty($logo_contrast)) {
        echo ' data-header-fixed="true"';
    } ?>
    <?php if ($mobile_is_fixed) {
        echo ' data-mobile-header-fixed="true"';
    } ?> <?php if ($fixed_initial_offset) {
    echo ' data-fixed-initial-offset="' . $fixed_initial_offset . '"';
} ?>>

    <?php if ( $topbar == true ) : ?>
        <div id="topbar-wrap">
            <div class="topbar-wrap-layout">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="topbar-left">
                                <ul class="topbar-list">

                                    <?php
                                    if (!empty(edufix_option('open_time'))) { ?>
                                        <li>
                                            <div class="topbar-info">
                                                <i class="<?php echo esc_attr(edufix_option('opening_icon')); ?>"></i>
                                                <?php echo esc_html(edufix_option('open_time')); ?>
                                            </div>
                                        </li>
                                        <?php 
                                    } ?>

                                    <?php
                                    if (!empty(edufix_option('header_address'))) : ?>
                                        <li>
                                            <div class="topbar-info">
                                                <i class="<?php echo esc_attr(edufix_option('address_icon')); ?>"></i>
                                                <?php echo esc_html(edufix_option('header_address')); ?>
                                            </div>
                                        </li>
                                    <?php
                                    endif; ?>

                                    <?php
                                    if (!empty(edufix_option('phone_number'))) : ?>
                                        <li>
                                            <div class="topbar-info">
                                                <i class="<?php echo esc_attr(edufix_option('phone_icon')); ?>"></i>
                                                <a href="tel:<?php echo esc_html(edufix_option('phone_number')); ?>"></a><?php echo esc_html(edufix_option('phone_number')); ?>
                                            </div>
                                        </li>
                                    <?php
                                    endif; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="topbar-right justify-content-end  align-items-center">
                                <?php
                                $profail_link = edufix_option('social_links');
                                if (!empty($profail_link)) :
                                    echo '<ul class="header-social-link">'; ?>
                                        <li class='mr-5'>Follow Us:</li>
                                    <?php
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
        </div>
    <?php endif; ?>

    <div class="header-main-wrapper">
        <div class="container">
            <div class="header-inner">
                <nav id="site-navigation" class="main-nav">
                    <div class="site-logo">
                        <?php Edufix_Theme_Helper::branding_logo(); ?>
                    </div>

                    <div class="tt-hamburger" id="page-open-main-menu" tabindex="1">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>

                    <div class="menu-wrapper main-nav-container canvas-menu-wrapper" id="mega-menu-wrap">
                        <div class="close-menu" id="page-close-main-menu">
                            <i class="ti-close"></i>
                        </div>

                        <div class="menu-wrapper">
                            <?php
                            if (has_nav_menu('primary')) {
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                    )
                                );
                            } else {
                                echo '<ul class="add-menu clearfix"><li><a target="_blank" href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Add Menu', 'edufix') . '</a></li></ul>';
                            } ?>
                        </div>
                        <!-- /.main-menu -->

                    </div><!-- #menu-wrapper -->

                    <?php
                    $btn_link = edufix_option('button_link');
                    $btn_text = edufix_option('button_label');
                    $btn_icon = !empty(edufix_option('button_icon')) ? "<i class='". edufix_option('button_icon') . "'></i>" : ''; ?>

                    <div class="nav-right">
                        <?php
                        if ($btn_text) :
                            echo '<a href="' . $btn_link . '" class="at-btn nav-btn">' . $btn_text . $btn_icon . '</a>';
                        endif;
                        ?>
                        <div class="hamburger-area">
                            <button id='hamburger-btn' class="hamburger-btn at-btn"><i class="fas fa-bars"></i></button>
                            <div class="hamburger-content">
                                <div class="hamburger-inner">
                                    <div class="hamburger-close">
                                        <i class="fas fa-times"></i>
                                    </div>
                                    <?php
                                        if ( is_active_sidebar('sidebar_hamburger-sidebar') ) {
                                            dynamic_sidebar('sidebar_hamburger-sidebar');
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <!-- /.nav-right -->

                </nav><!-- #site-navigation -->
            </div><!-- /.header-inner -->
        </div><!-- /.container -->
    </div>
    <!-- /.header-main-wrapper -->
</header><!-- #masthead -->