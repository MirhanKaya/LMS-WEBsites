<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    //
    // Set a unique slug-like ID
    $prefix = 'edufix_page_options';

    //
    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title' => esc_html__('Page Option', 'edufix'),
        'context' => 'normal',
        'post_type' => array('post', 'page'),
        'theme' => 'dark',

    ));

    // Header Menu
    CSF::createSection($prefix, array(
        'title' => esc_html__('Header', 'edufix'),
        'icon' => 'fa fa-home',
        'fields' => array(

            array(
                'id' => 'meta_header_type',
                'type' => 'switcher',
                'title' => __('Header Style', 'edufix'),
                'text_on' => __('Yes', 'edufix'),
                'text_off' => __('No', 'edufix'),
                'default' => false
            ),

            array(
                'id' => 'meta-header-layout',
                'type' => 'image_select',
                'title' => esc_html__('Header Style', 'edufix'),
                'options' => array(
                    'style-1' => EDUFIX_THEME_URI . '/assets/images/layout/header-one.png',
                    'style-2' => EDUFIX_THEME_URI . '/assets/images/layout/header-two.png',
                    'style-3' => EDUFIX_THEME_URI . '/assets/images/layout/header-three.png',
                ),
                'default' => 'style-1',
                'desc' => esc_html__('You can choose the header style.', 'edufix'),
                'dependency' => array('meta_header_type', '==', 'true'),
            ),

            array(
                'id' => 'meta_topbar_switch',
                'type' => 'switcher',
                'title' => esc_html__('Top Bar On/Of', 'edufix'),
                'default' => true,
                'dependency' => array('meta_header_type', '==', 'true'),
            ),
            array(
                'id' => 'meta_top_bar_bg',
                'type' => 'color',
                'title' => esc_html__('Top Bar Background Color', 'edufix'),
                'desc' => esc_html__('You can change top bar background color.', 'edufix'),
                'output' => array(
                    'background-color' => '.site-header:not(.mobile-header) #topbar-wrap',
                ),
                'dependency' => array('meta_topbar_switch', '==', 'true'),
            ),
            array(
                'id' => 'meta_top_bar_text_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Text Color', 'edufix'),
                'output' => array(
                    'color' => '.site-header .topbar-info, .site-header .topbar-info i, .site-header .header-social-link li a',
                ),
                'dependency' => array('meta_topbar_switch', '==', 'true'),
                'output_important' => true,
            ),
            array(
                'id' => 'meta-transparent_menu',
                'type' => 'switcher',
                'title' => esc_html__('Transparent Menu', 'edufix'),
                'default' => true,
                'dependency' => array('meta_header_type', '==', 'true'),
            ),

            array(
                'id' => 'meta_main_logo',
                'type' => 'media',
                'title' => esc_html__('Main Logo', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'desc' => esc_html__('Upload logo for Header', 'edufix'),
                'dependency' => array('meta_header_type', '==', 'true'),
            ),

            array(
                'id' => 'retina_logo',
                'type' => 'media',
                'title' => esc_html__('Main Retina Logo @2x', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'desc' => esc_html__('Upload logo for Header', 'edufix'),
                'dependency' => array('meta_header_type', '==', 'true'),
            ),

            array(
                'id' => 'meta_sticky_logo',
                'type' => 'media',
                'title' => esc_html__('Sticky Logo', 'edufix'),
                'desc' => esc_html__('Upload logo for Header Sticky and Inner Page.', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'dependency' => array('meta_header_type', '==', 'true'),

            ),

            array(
                'id' => 'retina_logo_sticky',
                'type' => 'media',
                'title' => esc_html__('Sticky Retina Logo @2x', 'edufix'),
                'desc' => esc_html__('Upload Retina logo for Header Sticky.', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'dependency' => array('meta_header_type', '==', 'true'),
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__('Header Menu Style', 'edufix'),
            ),


            array(
                'id' => 'menu_color',
                'type' => 'color',
                'title' => esc_html__('Menu Text Color', 'edufix'),
                'desc' => esc_html__('You can change menu text color.', 'edufix'),
                'output' => array(
                    'color' => '
                    .site-header:not(.mobile-header) .menu > li > a',
                ),
                'output_important' => true
            ),
            array(
                'id' => 'menu_color_hover',
                'type' => 'color',
                'title' => esc_html__('Menu Text Hover Color', 'edufix'),
                'desc' => esc_html__('You can change menu text hover color.', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'output' => array(
                    'color' => '.site-header:not(.mobile-header) .menu > li > a:hover, .site-header:not(.mobile-header) .menu > li.current-menu-item > a'
                ),
                'output_important' => true
            ),
            array(
                'id' => 'menu_color_dropdown',
                'type' => 'color',
                'title' => esc_html__('Menu Dropdown Text Color', 'edufix'),
                'desc' => esc_html__('You can change menu text color.', 'edufix'),
                'output' => '
                    .site-header:not(.mobile-header) .menu li.has-submenu .sub-menu li a,
                    .site-header .site-main-menu li .sub-menu li a,
                    .menu-transperant .site-header .site-main-menu li .sub-menu li a',
                'output_important' => true
            ),

            array(
                'id' => 'menu_color_hover_dropdown',
                'type' => 'color',
                'title' => esc_html__('Menu Dropdown Text Hover Color', 'edufix'),
                'desc' => esc_html__('You can change menu text hover color.', 'edufix'),
                'output' => array(
                    'color' => '
                        .site-header:not(.mobile-header) .menu li.has-submenu .sub-menu li a:hover,
                        .site-header .site-main-menu li .sub-menu li a:hover,
                        .site-header:not(.mobile-header) .menu li.current-menu-parent .sub-menu li.current-menu-item a',
                    'background-color' => '.site-header:not(.mobile-header) .menu li.has-submenu .sub-menu li a:after',
                ),
                'output_important' => true,
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__('Header Sticky Menu Style', 'edufix'),
            ),

            array(
                'id' => 'sticky_menu_color',
                'type' => 'color',
                'title' => esc_html__('Menu Text Color', 'edufix'),
                'desc' => esc_html__('You can change menu text color.', 'edufix'),
                'output_important' => true,
                'output' => '.site-header.header-fixed.showed .menu>li>a'
            ),

            array(
                'id' => 'sticky_menu_color_hover',
                'type' => 'color',
                'output_important' => true,
                'title' => esc_html__('Menu Text Hover Color', 'edufix'),
                'desc' => esc_html__('You can change menu text hover color.', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'output' => array(
                    'color' => '
                    .site-header.header-fixed.showed .menu>li>a:hover,
                    .site-header.header-fixed.showed .menu>li.current-menu-item>a',
                )
            ),

        )
    ));

    // Page Header
    CSF::createSection($prefix, array(
        'title' => 'Page Header',
        'icon' => 'fa fa-picture-o',
        'fields' => array(

            array(
                'id' => 'meta_page_header',
                'type' => 'button_set',
                'title' => esc_html__('Page Header Option', 'edufix'),
                'options' => array(
                    'default' => esc_html__('Default', 'edufix'),
                    'enabled' => esc_html__('Enabled', 'edufix'),
                    'disabled' => esc_html__('Disabled', 'edufix'),
                ),
                'default' => 'default'
            ),


            array(
                'id' => 'header_image',
                'type' => 'background',
                'title' => esc_html__('Header Image', 'edufix'),
                'desc' => esc_html__('Default: Featured image, if fail will get image from global settings.', 'edufix'),
                'dependency' => array('meta_page_header', '==', 'enabled'),
                'output' => '.page-header',
                'output_important' => true,
            ),

            array(
                'id' => 'custom_title',
                'type' => 'text',
                'title' => esc_html__('Custom Title', 'edufix'),
                'desc' => esc_html__('Set custom title for the page header. Default: The post title.', 'edufix'),
                'dependency' => array('meta_page_header', '==', 'enabled'),
            ),
            array(
                'id' => 'custom_title_typography',
                'type' => 'typography',
                'title' => esc_html__('Title Typography', 'edufix'),
                'output' => '.page-banner .page-title',
                'dependency' => array('page_header', '==', 'enabled'),
            ),
            array(
                'id' => 'custom_title_color',
                'type' => 'color',
                'title' => esc_html__('Title Color', 'edufix'),
                'output' => '.page-banner .page-title, .page-header .page-header_title',
                'dependency' => array('meta_page_header', '==', 'enabled'),
            ),

            array(
                'id' => 'breadcrumbs',
                'type' => 'switcher',
                'title' => esc_html__('Header Breadcrumbs', 'edufix'),
                'desc' => esc_html__('Display breadcrumbs on the page header', 'edufix'),
                'dependency' => array('meta_page_header', '==', 'enabled'),
                'default' => true,
            ),

        ),
    ));


    // Footer Menu
    CSF::createSection($prefix, array(
        'title' => esc_html__('Footer', 'edufix'),
        'icon' => 'fa fa-home',
        'fields' => array(

            array(
                'id' => 'meta_footer_type',
                'type' => 'switcher',
                'title' => __('Footer Style', 'edufix'),
                'text_on' => __('Yes', 'edufix'),
                'text_off' => __('No', 'edufix'),
                'default' => false
            ),

            array(
                'id' => 'footer_image',
                'type' => 'background',
                'title' => esc_html__('Footer Image', 'edufix'),
                'desc' => esc_html__('Default: Featured image, if fail will get image from global settings.', 'edufix'),
                'dependency' => array('meta_footer_type', '==', 'true'),
                'output' => '.site_footer',
                'output_important' => true,
            ),

            array(
                'id' => 'meta_footer_padding_top',
                'type' => 'spacing',
                'title' => __('Padding Top', 'edufix'),
                'output' => '.site-footer .footer-wrapper',
                'output_mode' => 'padding', //
                'left' => false,
                'right' => false,
                'dependency' => array('meta_footer_type', '==', 'true'),
            ),
        )
    ));
}