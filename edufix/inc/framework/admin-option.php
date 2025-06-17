<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'edufix_framework';

    // Create options
    CSF::createOptions($prefix, array(
        'menu_title' => esc_html__('Theme Option', 'edufix'),
        'menu_slug' => 'edufix-framework',
        'framework_title' => esc_html__('Theme Settings', 'edufix'),
        'theme' => 'light',
        'sticky_header' => 'true',
    ));

    // General Setting
    CSF::createSection($prefix, array(
        'title' => esc_html__('General', 'edufix'),
        'icon' => 'fa fa-building-o',
        'fields' => array(
            array(
                'id' => 'preloader_switch',
                'type' => 'switcher',
                'title' => esc_html__('Enable Preloader', 'edufix'),
            ),
            array(
                'id' => 'preloader-type',
                'type' => 'select',
                'title' => esc_html__('Preloader type', 'edufix'),
                'options' => array(
                    'css' => esc_html__('CSS', 'edufix'),
                    'images' => esc_html__('Media', 'edufix')
                ),
                'dependency' => array('preloader_switch', '==', true),
            ),
            array(
                'id' => 'preloader-images',
                'type' => 'media',
                'title' => esc_html__('Preloader Image', 'edufix'),
                'add_title' => esc_html__('Upload Your Image', 'edufix'),
                'dependency' => array('preloader_switch|preloader-type', '==', 'true|images'),
            ),
            array(
                'id' => 'preloader',
                'type' => 'select',
                'title' => esc_html__('Preloader Style', 'edufix'),
                'class' => 'chosen',
                'dependency' => array('preloader_switch|preloader-type', '==', 'true|css'),
                'options' => array(
                    'ball-pulse-3' => esc_html__('Ball Pulse', 'edufix'),
                    'ball-grid-pulse-9' => esc_html__('Ball Grid Pulse', 'edufix'),
                    'ball-clip-rotate-1' => esc_html__('Ball Clip Rotate', 'edufix'),
                    'ball-clip-rotate-pulse-2' => esc_html__('Ball Clip Rotate Pulse', 'edufix'),
                    'ball-clip-rotate-multiple-2' => esc_html__('Ball Clip Rotate Multiple', 'edufix'),
                    'ball-pulse-rise-6' => esc_html__('Ball Pulse Rise', 'edufix'),
                    'ball-pulse-sync-3' => esc_html__('Ball Pulse Sync', 'edufix'),
                    'ball-beat-3' => esc_html__('Ball Beat', 'edufix'),
                    'ball-grid-beat-9' => esc_html__('Ball Gird Beat', 'edufix'),
                    'ball-rotate-1' => esc_html__('Ball Rotate', 'edufix'),
                    'ball-zig-zag-2' => esc_html__('Ball Zig-Zag', 'edufix'),
                    'ball-zig-zag-deflect-2' => esc_html__('Ball-Zig-Zag Deflect', 'edufix'),
                    'ball-triangle-path-3' => esc_html__('Ball Triangle Path', 'edufix'),
                    'ball-scale-1' => esc_html__('Ball Scale', 'edufix'),
                    'ball-scale-ripple-1' => esc_html__('Ball Scale Ripple', 'edufix'),
                    'ball-scale-multiple-3' => esc_html__('Ball Scale Multiple', 'edufix'),
                    'ball-scale-ripple-multiple-3' => esc_html__('Ball Scale Ripple Multiple', 'edufix'),
                    'ball-spin-fade-loader-8' => esc_html__('Ball Spin Fade Loader', 'edufix'),
                    'square-spin-1' => esc_html__('Square Spin', 'edufix'),
                    'cube-transition-2' => esc_html__('Cube Transition', 'edufix'),
                    'line-scale-5' => esc_html__('Line Scale', 'edufix'),
                    'line-scale-party-4' => esc_html__('Line Scale Party', 'edufix'),
                    'line-scale-pulse-out-5' => esc_html__('Line Scale Pulse Out', 'edufix'),
                    'line-scale-pulse-out-rapid-5' => esc_html__('Line Scale Pulse Out Rapid', 'edufix'),
                    'line-spin-fade-loader-8' => esc_html__('Line Spin Fade Loader', 'edufix'),
                    'triangle-skew-spin-1' => esc_html__('Triangle Skew Spin', 'edufix'),
                    'pacman-5' => esc_html__('Pacman', 'edufix'),
                    'semi-circle-spin-5' => esc_html__('Semi Circle Spin', 'edufix'),
                ),
            ),
            array(
                'id' => 'preloader_color',
                'title' => esc_html__('Preloader background', 'edufix'),
                'type' => 'color',
                'default' => 'rgba(150,41,230,0.97)',
                'dependency' => array('preloader_switch', '==', 'true'),
            ),
            // array(
            //     'id' => 'back_to_top',
            //     'type' => 'switcher',
            //     'title' => esc_html__('Display Back To Top Button', 'edufix'),
            //     'default' => true
            // ),
            array(
                'id' => 'smooth_scroll',
                'type' => 'switcher',
                'title' => esc_html__('Enable Enable/Disable Smooth Scroll', 'edufix'),
                'default' => false
            ),
            array(
                'id' => 'custom-css',
                'type' => 'code_editor',
                'title' => 'CSS Editor',
                'settings' => array(
                    'theme' => 'mbo',
                    'mode' => 'css',
                ),
                'default' => '.element{ color: #ffbc00; }',
            )
        )
    ));

    // Header Setting
    CSF::createSection($prefix, array(
        'title' => esc_html__('Header', 'edufix'),
        'icon' => 'fa fa-home',
        'fields' => array(

            array(
                'id' => 'header-layout',
                'type' => 'image_select',
                'title' => esc_html__('Header Style', 'edufix'),
                'options' => array(
                    'style-1' => EDUFIX_THEME_URI . '/assets/images/layout/header-one.png',
                    'style-2' => EDUFIX_THEME_URI . '/assets/images/layout/header-two.png',
                    'style-3' => EDUFIX_THEME_URI . '/assets/images/layout/header-three.png',
                    // 'style-1' => 'style 1',
                    // 'style-2' => 'style 2',
                    // 'style-3' => 'style 3',
                ),
                'default' => 'style-3',
                'desc' => esc_html__('You can choose the header style.', 'edufix'),
            ),

            array(
                'id' => 'header_sticky',
                'type' => 'switcher',
                'title' => esc_html__('Enable Header Sticky', 'edufix'),
                'default' => false,
            ),

            array(
                'id' => 'transparent_menu',
                'type' => 'switcher',
                'title' => esc_html__('Transparent Menu', 'edufix'),
                'default' => false,
            ),
            array(
                'id' => 'header_bg',
                'type' => 'background',
                'title' => esc_html__('Top Bar Background Color', 'edufix'),
                'desc' => esc_html__('You can change header background.', 'edufix'),
                'output' => '.site-header:not(.mobile-header)',
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__('Top Bar Settings', 'edufix'),
            ),
            array(
                'id' => 'topbar_switch',
                'type' => 'switcher',
                'title' => esc_html__('Top Bar On/Off', 'edufix'),
                'default' => false,
            ),
            array(
                'id' => 'top_bar_bg',
                'type' => 'color',
                'title' => esc_html__('Top Bar Background Color', 'edufix'),
                'desc' => esc_html__('You can change top bar background color.', 'edufix'),
                'output' => array(
                    'background-color' => '.site-header:not(.mobile-header) #topbar-wrap',
                ),
            ),
            array(
                'id' => 'top_bar_text_color',
                'type' => 'color',
                'title' => esc_html__('Top Bar Text Color', 'edufix'),
                'output' => array(
                    'color' => '.site-header .topbar-info, .site-header .topbar-info i, .site-header .header-social-link li a',
                )
            ),
            array(
                'id' => 'opening_icon',
                'type' => 'icon',
                'title' => esc_html__('Opening Time Icon', 'edufix'),
                'desc' => esc_html__('Choose an icon from the library.', 'edufix'),
                'default' => 'far fa-clock',
            ),
            array(
                'id' => 'open_time',
                'type' => 'text',
                'title' => esc_html__('Opening Time', 'edufix'),
                'default' => __('Mon - Sat 8.00 - 18.00.', 'edufix'),
            ),
            array(
                'id' => 'address_icon',
                'type' => 'icon',
                'title' => esc_html__('Address Icon', 'edufix'),
                'desc' => esc_html__('Choose an icon from the library.', 'edufix'),
                'default' => 'fas fa-map-marker-alt',
            ),
            array(
                'id' => 'header_address',
                'type' => 'text',
                'title' => esc_html__('Address', 'edufix'),
                'default' => __('30 Commercial Road, USA.', 'edufix'),
            ),
            array(
                'id' => 'phone_icon',
                'type' => 'icon',
                'title' => esc_html__('Phone Icon', 'edufix'),
                'desc' => esc_html__('Choose an icon from the library.', 'edufix'),
                'default' => 'fas fa-phone-alt',
            ),
            array(
                'id' => 'phone_number',
                'type' => 'text',
                'title' => esc_html__('Phone Number', 'edufix'),
                'default' => __('+001- 548-415- 5478', 'edufix'),
            ),
            array(
                'id' => 'gmail_icon',
                'type' => 'icon',
                'title' => esc_html__('Gmail Icon', 'edufix'),
                'desc' => esc_html__('Choose an icon from the library.', 'edufix'),
                'default' => 'fas fa-envelope',
            ),
            array(
                'id' => 'header_gmail',
                'type' => 'text',
                'title' => esc_html__('Gmail', 'edufix'),
                'default' => 'Info@gmail.com',
            ),

            array(
                'id' => 'header_social_switch',
                'type' => 'switcher',
                'title' => esc_html__('Social Link  On/Off', 'edufix'),
                'default' => true,
            ),


            array(
                'type' => 'subheading',
                'content' => esc_html__('Logo Settings', 'edufix'),
            ),

            array(
                'id' => 'main_logo',
                'type' => 'media',
                'title' => esc_html__('Main Logo', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'desc' => esc_html__('Upload logo for Header', 'edufix'),
            ),

            array(
                'id' => 'retina_logo',
                'type' => 'media',
                'title' => esc_html__('Main Retina Logo @2x', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'desc' => esc_html__('Upload logo for Header', 'edufix'),
            ),

            array(
                'id' => 'sticky_logo',
                'type' => 'media',
                'title' => esc_html__('Sticky Logo', 'edufix'),
                'desc' => esc_html__('Upload logo for Header Sticky and Inner Page.', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
            ),

            array(
                'id' => 'retina_logo_sticky',
                'type' => 'media',
                'title' => esc_html__('Sticky Retina Logo @2x', 'edufix'),
                'desc' => esc_html__('Upload Retina logo for Header Sticky.', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Header Nav Right', 'edufix'),
            ),

            array(
                'id' => 'button_label',
                'type' => 'text',
                'title' => esc_html__('Button Label', 'edufix'),
                'default' => __('Get In Touch', 'edufix'),
            ),

            array(
                'id' => 'button_icon',
                'type' => 'icon',
                'title' => esc_html__('Button Icon', 'edufix'),
                'desc' => esc_html__('Choose an icon from the library.', 'edufix'),
                'default' => 'fas fa-angle-double-right',
            ),

            array(
                'id' => 'button_link',
                'type' => 'text',
                'title' => esc_html__('Button Link', 'edufix'),
                'default' => '#',
            ),
            array(
                'id' => 'contact_icon',
                'type' => 'icon',
                'title' => esc_html__('Contact Icon', 'edufix'),
                'desc' => esc_html__('Choose an icon from the library.', 'edufix'),
                'default' => 'fas fa-phone-alt',
            ),
            // array(
            //     'id' => 'contact_title',
            //     'type' => 'text',
            //     'title' => esc_html__('Contact Title', 'edufix'),
            //     'default' => __('Call Us Any Time', 'edufix'),
            // ),
            array(
                'id' => 'contact_number',
                'type' => 'text',
                'title' => esc_html__('Contact Number', 'edufix'),
                'default' => __('+123456789', 'edufix'),
            ),

            array(
                'type' => 'heading',
                'content' => esc_html__('Header Menu Style', 'edufix'),
            ),

            array(
                'id' => 'menu_color',
                'type' => 'color',
                'title' => esc_html__('Menu Text Color', 'edufix'),
                'desc' => esc_html__('You can change menu text color.', 'edufix'),
                'output' => array(
                    'color' => '
					.site-header:not(.mobile-header) .menu > li > a,
					.menu-transperant .site-header .site-main-menu li > a'
                )
            ),

            array(
                'id' => 'menu_color_hover',
                'type' => 'color',
                'title' => esc_html__('Menu Text Hover Color', 'edufix'),
                'desc' => esc_html__('You can change menu text hover color.', 'edufix'),
                'output' => array(
                    'color' => '.site-header:not(.mobile-header) .menu li.current-menu-item a, .site-header:not(.mobile-header) .menu li.current-menu-parent a,
                    .site-header:not(.mobile-header) .menu > li > a:hover',
                )
            ),
            array(
                'id' => 'menu_color_dropdown',
                'type' => 'color',
                'title' => esc_html__('Menu Dropdown Text Color', 'edufix'),
                'desc' => esc_html__('You can change menu text color.', 'edufix'),
                'output' => '.site-header:not(.mobile-header) .menu li.has-submenu .sub-menu li a'
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
                'output_important' => false,
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
                'output' => '.site-header.header-fixed.showed .menu>li>a'
            ),

            array(
                'id' => 'sticky_menu_color_hover',
                'type' => 'color',
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

    //Footer Setting
    CSF::createSection($prefix, array(
        'title' => esc_html__('Footer', 'edufix'),
        'icon' => 'fa fa-support',
        'fields' => array(

            array(
                'id' => 'show_newsletter',
                'type' => 'switcher',
                'title' => esc_html__('Footer Newsletter Enable', 'datahub'),
                'default' => false,
            ),
            array(
                'id' => 'footer_newsletter_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'dependency' => array('show_newsletter', '==', true),
            ),
            array(
                'id' => 'newsletter_shortcode',
                'type' => 'textarea',
                'title' => esc_html__('Newsletter Shortcode', 'datahub'),
                'placeholder' => '[shortcode_id]',
                'dependency' => array('show_newsletter', '==', true),
            ),
            array(
                'id' => 'newsletter_bg_color',
                'type' => 'color',
                'title' => esc_html__('Newsletter Background Color', 'datahub'),
                'output' => '.footer-newsletter-inner',
                'output_mode' => 'background',
                'dependency' => array('show_newsletter', '==', true),
            ),
            array(
                'id' => 'newsletter_margin',
                'type' => 'spacing',
                'title' => esc_html__('Margin', 'datahub'),
                'desc' => esc_html__('Adjust spacing for Newsletter Area.', 'datahub'),
                'unit' => 'px',
                'output_mode' => 'margin',
                'output' => array('.footer-newsletter-area'),
                'dependency' => array('show_newsletter', '==', true),
            ),
            array(
                'id' => 'newsletter_padding',
                'type' => 'spacing',
                'title' => esc_html__('Padding', 'datahub'),
                'desc' => esc_html__('Adjust spacing for Newsletter Area.', 'datahub'),
                'unit' => 'px',
                'output_mode' => 'padding',
                'output' => array('.footer-newsletter-inner'),
                'dependency' => array('show_newsletter', '==', true),
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__(' Footer Top Info Area', 'edufix'),
            ),
            array(
                'id' => 'show_footer_top',
                'type' => 'switcher',
                'title' => esc_html__('Show Footer Top', 'edufix'),
                'default' => false,
            ),
            array(
                'id' => 'footer_top_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
                'dependency' => array('show_footer_top', '==', true),
            ),
            array(
                'id' => 'footer_top_text',
                'type' => 'textarea',
                'default' => 'We want to know what consumers are looking for, what their values are, and how can we meet their needs. It’s not just about Big Data; it’s about translating that into the truth.',
                'title' => esc_html__('Footer Top Text', 'edufix'),
                'dependency' => array('show_footer_top', '==', true),
            ),
            array(
                'id' => 'footer_top_padding',
                'type' => 'spacing',
                'title' => __('Footer Top Padding', 'edufix'),
                'output' => '.site-footer .footer-top-info',
                'output_mode' => 'padding',
                'left' => false,
                'right' => false,
                'default' => array(             
                    'unit' => 'px',
                ),
                'dependency' => array('show_footer_top', '==', true),
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__(' Footer Widget Area Option', 'edufix'),
            ),
            array(
                'id' => 'footer_widget_bg',
                'type' => 'background',
                'title' => esc_html__('Widget Area Backgrund', 'edufix'),
                'output' => '.site-footer .footer-wrapper',
            ),
            array(
                'id' => 'footer_padding_top',
                'type' => 'spacing',
                'title' => __('Widgets Area Padding Top/Bottom', 'edufix'),
                'output' => '.site-footer .footer-wrapper',
                'output_mode' => 'padding',
                'left' => false,
                'right' => false,
                'default' => array(             
                    'unit' => 'px',
                ),
            ),
            array(
                'id' => 'footer-widget',
                'type' => 'color',
                'title' => esc_html__('Widget Title Color', 'edufix'),
                'output' => '.site-footer .widget-title',
            ),
            array(
                'type' => 'subheading',
                'content' => esc_html__(' Footer Copyright Option', 'edufix'),
            ),
            array(
                'id' => 'footer_copyright_style',
                'type' => 'select',
                'title' => esc_html__('Copyright Style', 'edufix'),
                'options' => array(
                    'copy_text_center' => esc_html__('Copyright text center', 'edufix'),
                    'text_menu' => esc_html__('Left copyright text right menu', 'edufix'),
                ),
                'default' => 'copy_text_center',
            ),
            array(
                'id' => 'copyright_text',
                'type' => 'textarea',
                'title' => esc_html__('Copyright Text', 'edufix'),
            ),
            array(
                'id' => 'footer_copyright_bg',
                'type' => 'color',
                'title' => esc_html__('Copyright Background Color', 'edufix'),
                'output' => '.site-info',
                'output_mode' => 'background',
            ),
            array(
                'id' => 'copyright_padding',
                'type' => 'spacing',
                'title' => esc_html__('Padding', 'edufix'),
                'desc' => esc_html__('Adjust spacing for Newsletter Area.', 'edufix'),
                'unit' => 'px',
                'output' => array('.newsletter-inner'),
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__(' Footer Style', 'edufix'),
            ),

            array(
                'id' => 'footer_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'edufix'),
                'output' => '.site-footer',
                'output_mode' => 'background',
            ),
			array(
                'id' => 'footer_bg_image',
                'type' => 'background',
                'title' => esc_html__('Footer Background Image', 'edufix'),
                'desc' => esc_html__('Default: Featured image, if fail will get image from global settings.', 'edufix'),
                'output' => '.site-footer',
                'background_gradient' => true,
                'background_origin' => true,
                'background_clip' => true,
                'background_blend_mode' => true,
                'default' => array(
                    'background-gradient-direction' => 'to right',
                    'background-size' => 'cover',
                    'background-position' => 'center center',
                    'background-repeat' => 'no-repeat',
                ),
            ),
        )
    ));

    //Page Header
    CSF::createSection($prefix, array(
        'title' => esc_html__('Page Header', 'edufix'),
        'icon' => 'fa fa-picture-o',
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => esc_html__(' Page Header Settings', 'edufix'),
            ),
            array(
                'id' => 'page_header',
                'type' => 'switcher',
                'title' => esc_html__('Page Header Enable', 'edufix'),
                'default' => true,
            ),
            array(
                'id' => 'breadcrumb-text-color',
                'type' => 'color',
                'title' => 'Breadcrumb Text Color',
                'output' => [
                    'color' => '.page-header .page-header_title, .page-header .breadcrumbs .separator, .single-post-header-bg .single-post-title, .single-post-header-bg .at-blog-meta-category',
                    'border-color' => '.single-post-header-bg .at-blog-meta-category',
                ]
            ),
            array(
                'id' => 'breadcrumb-link-color',
                'type' => 'link_color',
                'title' => 'Breadcrumb Link Color',
                'output' => [
                    'color' => '.page-header .breadcrumbs a',
                ]
            ),
            array(
                'id' => 'breadcrumb-current-color',
                'type' => 'color',
                'title' => 'Breadcrumb Current Text Color',
                'output' => [
                    'color' => '.page-header .breadcrumbs span:not(.separator)',
                ]
            ),
            array(
                'id' => 'banner_height',
                'type' => 'slider',
                'title' => __('Banner Height', 'edufix'),
                'min' => 250,
                'max' => 550,
                'step' => 1,
                'unit' => 'px',
                'default' => 300,
                'output' => [
                    'min-height' => '.page-header',
                ]
            ),
            array(
                'id' => 'page_header_default_title',
                'type' => 'text',
                'title' => esc_html__('Default Title', 'edufix'),
                'desc' => esc_html__('Set the default title for the page header', 'edufix'),
            ),
            array(
                'id' => 'custom_title_typography',
                'type' => 'typography',
                'title' => esc_html__('Title Typography', 'edufix'),
                'output' => array(
                    'color' => '.page-banner .page-title-wrapper .page-title, .page-banner .saaspik_breadcrumbs li a',
                ),
            ),
			array(
                'id' => 'page_header_alignment',
                'type' => 'select',
                'title' => esc_html__('Page Title Alignment', 'edufix'),
                'options' => array(
                    'text-left' => esc_html__('Left', 'edufix'),
                    'text-center' => esc_html__('Center', 'edufix'),
                    'text-right' => esc_html__('Right', 'edufix'),
                ),
                'default' => 'left',
                'output' => array(
                    '.page-header' => 'text-align'
                )
            ),
            array(
                'id' => 'spacing_control',
                'type' => 'spacing',
                'title' => esc_html__('Padding', 'edufix'),
                'desc' => esc_html__('Adjust spacing for page header.', 'edufix'),
                'unit' => 'px',
                'output' => array('.page-header'),
            ),
            array(
                'id' => 'page_header_image',
                'type' => 'background',
                'title' => esc_html__('Header Background', 'edufix'),
                'desc' => esc_html__('Default: Featured image, if fail will get image from global settings.', 'edufix'),
                'output' => '.page-header',
                'background_gradient' => true,
                'background_origin' => true,
                'background_clip' => true,
                'background_blend_mode' => true,
                'default' => array(
                    'background-gradient-direction' => 'to right',
                    'background-size' => 'cover',
                    'background-position' => 'center center',
                    'background-repeat' => 'no-repeat',
                ),
            ),
            array(
                'id' => 'header-background-overlay',
                'type' => 'color',
                'title' => 'Background Overlay Color',
                'output' => [
                    'background-color' => '.page-header::before',
                ]
            ),
        )
    ));

    //Blog Setting
    CSF::createSection($prefix, array(
        'title' => esc_html__('Blog', 'edufix'),
        'icon' => 'fa fa-file-text-o',
        'fields' => array(

            array(
                'id' => 'blog-masonry-column',
                'type' => 'image_select',
                'title' => esc_html__('Columns', 'edufix'),
                'desc' => esc_html__('Display number of post per row', 'edufix'),
                'radio' => true,
                'options' => array(
                    '6' => EDUFIX_THEME_URI . '/assets/images/layout/2cols.png',
                    '4' => EDUFIX_THEME_URI . '/assets/images/layout/3cols.png',
                ),
                'default' => '6',
                'dependency' => array('blog-style_masonry', '==', true),
            ),

            array(
                'id' => 'blog_sidebar_layout',
                'type' => 'image_select',
                'title' => esc_html__('Layout', 'edufix'),
                'radio' => true,
                'options' => array(
                    'left' => EDUFIX_THEME_URI . '/assets/images/layout/left-sidebar.png',
                    'no-sidebar' => EDUFIX_THEME_URI . '/assets/images/layout/no-sidebar.png',
                    'right' => EDUFIX_THEME_URI . '/assets/images/layout/right-sidebar.png',
                ),
                'default' => 'right',
            ),

            array(
                'id' => 'blog_sidebar_def_width',
                'type' => 'button_set',
                'title' => esc_html__('Blog Archive Sidebar Width', 'edufix'),
                'options' => array(
                    '9' => '25%',
                    '8' => '33%',
                ),
                'default' => '8',
                'required' => array('blog_sidebar_layout', '!=', 'none'),
            ),

            array(
                'id' => 'blog_sidebar_gap',
                'type' => 'select',
                'title' => esc_html__('Blog Archive Sidebar Side Gap', 'edufix'),
                'options' => array(
                    'def' => 'Default',
                    '0' => '0',
                    '15' => '15',
                    '20' => '20',
                    '25' => '25',
                    '30' => '30',
                    '35' => '35',
                    '40' => '40',
                    '45' => '45',
                    '50' => '50',
                ),
                'default' => '15',
                'required' => array('blog_sidebar_layout', '!=', 'none'),
            ),

            array(
                'id' => 'author_info',
                'type' => 'switcher',
                'title' => esc_html__('Display Author Bio Box', 'edufix'),
                'default' => false
            ),

            array(
                'id' => 'share_post',
                'type' => 'switcher',
                'title' => esc_html__('Share On Post', 'edufix'),
                'default' => false
            ),

            array(
                'id' => 'blog_list_meta_author',
                'type' => 'switcher',
                'title' => esc_html__('Hide post-meta author?', 'edufix'),
                'default' => false,
            ),
            array(
                'id' => 'blog_list_meta_comments',
                'type' => 'switcher',
                'title' => esc_html__('Hide post-meta comments?', 'edufix'),
                'default' => false,
            ),
            array(
                'id' => 'blog_list_meta_categories',
                'type' => 'switcher',
                'title' => esc_html__('Hide post-meta categories?', 'edufix'),
                'default' => false,
            ),
            array(
                'id' => 'blog_list_meta_date',
                'type' => 'switcher',
                'title' => esc_html__('Hide post-meta date?', 'edufix'),
                'default' => false,
            ), 
            
            array(
                'type' => 'subheading',
                'content' => esc_html__(' Single Post', 'edufix'),
            ),
            
            array(
                'id' => 'single_post_nav',
                'type' => 'switcher',
                'title' => esc_html__('Hide Post Navigation?', 'edufix'),
                'default' => false,
            ),

            array(
                'id' => 'single_related_post',
                'type' => 'switcher',
                'title' => esc_html__('Hide Related Post?', 'edufix'),
                'default' => false,
            ),

            array(
                'id' => 'related_title',
                'type' => 'text',
                'title' => esc_html__('Related Post Title', 'edufix'),
                'default' => __('Related Posts', 'edufix'),
            ),

        )
    ));

	//Portfolio
    CSF::createSection($prefix, array(
        'title' => esc_html__('Portfolio', 'edufix'),
        'icon' => 'fa fa-picture-o',
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => esc_html__('Portfolio Page Title', 'edufix'),
            ),

            array(
                'id' => 'header_portfolio',
                'type' => 'switcher',
                'title' => esc_html__('Page Header Enable', 'edufix'),
                'default' => true,
            ),


            array(
                'id' => 'page_portfolio_title',
                'type' => 'text',
                'title' => esc_html__('Portfolio Details Title', 'edufix'),
                'desc' => esc_html__('Set the default title for the page header', 'edufix'),
            ),      
            array(
                'id' => 'port_custom_title_typography',
                'type' => 'typography',
                'title' => esc_html__('Title Typography', 'edufix'),
                'output' => '.single-saaspik_portfolio .page-banner .page-title, .page-banner .saaspik_breadcrumbs li a',
            ),
            array(
                'id' => 'header_image_portfolio',
                'type' => 'background',
                'title' => esc_html__('Header Background', 'edufix'),
                'desc' => esc_html__('Default: Featured image, if fail will get image from global settings.', 'edufix'),
                'output' => '.header-bg-portfolio',
                'dependency' => array('page_header_portfolio_style_main', '==', 'background_portfolio_main'),
            ),
    

            array(
                'id' => 'portfolio_slug',
                'type' => 'text',
                'title' => esc_html__('Portfolio Slug', 'edufix'),
                'desc' => esc_html__('Set the default title for the page header', 'edufix'),
            ),

            array(
                'type' => 'subheading',
                'content' => esc_html__(' Related Portfolio Details', 'edufix'),
            ),

            array(
                'id' => 'releted_portfolio',
                'type' => 'switcher',
                'title' => esc_html__('Related Post Show/Hide', 'edufix'),
                'default' => true
            ),
            
            array(
                'id'      => 'relpost_count',
                'type'    => 'text',
                'title'   => esc_html__('Related Post Show Limit', 'edufix'),
                'default' => 3,
              ),

            array(
                'type' => 'text',
                'title' => esc_html__('Title', 'edufix'),
                'id' => 'port_title',
                'default' => esc_html__('Related Portfolio', 'edufix'),
            ),
         
        )
    ));

    //Social Link
    CSF::createSection($prefix, array(
        'title' => esc_html__('Social Link', 'edufix'),
        'icon' => 'fa fa-globe',
        'desc' => esc_html__('This social profiles will display in your whole site.', 'edufix'),
        'fields' => array(

            array(
                'id' => 'social_links',
                'type' => 'group',
                'title' => esc_html__('Saaspik Social links', 'edufix'),
                'desc' => esc_html__('This social profiles will display in your whole site.', 'edufix'),
                'button_title' => esc_html__('Add New', 'edufix'),
                'fields' => array(

                    array(
                        'id' => 'name',
                        'type' => 'text',
                        'title' => esc_html__('Name', 'edufix'),
                    ),
                    array(
                        'id' => 'url',
                        'type' => 'text',
                        'title' => esc_html__('Url', 'edufix')
                    ),
                    array(
                        'id' => 'icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'edufix')
                    )

                ),

                'default' => array(
                    array(
                        'name' => esc_html__('Facebook', 'edufix'),
                        'url' => esc_url('#'),
                        'icon' => 'fab fa-facebook-f'
                    ),

                    array(
                        'name' => esc_html__('Instagram', 'edufix'),
                        'url' => esc_url('#'),
                        'icon' => 'fab fa-instagram'
                    ),

                    array(
                        'name' => esc_html__('Dribbble', 'edufix'),
                        'url' => esc_url('#'),
                        'icon' => 'fab fa-dribbble'
                    )

                ),
                array(
                    'type' => 'notice',
                    'class' => 'info',
                    'content' => esc_html__('This social profiles will display in your whole site.', 'edufix'),
                ),
            ),
        )
    ));

    //Error Page
    CSF::createSection($prefix, array(
        'title' => esc_html__('404 Page', 'edufix'),
        'icon' => 'fa fa-exclamation',
        'fields' => array(

            array(
                'id' => 'error_image',
                'type' => 'media',
                'title' => esc_html__('Image', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
            ),

            array(
                'type' => 'text',
                'title' => esc_html__('Error Title', 'edufix'),
                'id' => 'error_title',               
                'default' => esc_html__('Page not Found', 'edufix'),
            ),

            array(
                'type' => 'textarea',
                'title' => esc_html__('Description', 'edufix'),
                'id' => 'error_description',                
                'default' => esc_html__('There many variations of passages available but the majority have suffered alteration in that that injected humour.', 'edufix'),
            ),
        )
    ));

    //Typography
    CSF::createSection($prefix, array(
        'title' => esc_html__('Typography', 'edufix'),
        'icon' => 'fa fa-font',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => esc_html__('Body Font Settings', 'edufix'),
            ),

            array(
                'id' => 'body-font',
                'type' => 'typography',
                'title' => esc_html__('Body', 'edufix'),
                'output' => 'body',
            ),
            array(
                'type' => 'subheading',
                'content' => esc_html__('Heading Font Settings', 'edufix'),
            ),
            array(
                'id' => 'heading-h1',
                'type' => 'typography',
                'title' => esc_html__('Heading H1', 'edufix'),
                'output' => 'h1',
            ),
            array(
                'id' => 'heading-h2',
                'type' => 'typography',
                'title' => esc_html__('Heading H2', 'edufix'),
                'output' => 'h2',
            ),
            array(
                'id' => 'heading-h3',
                'type' => 'typography',
                'title' => esc_html__('Heading H3', 'edufix'),
                'output' => 'h3',

            ),
            array(
                'id' => 'heading-h4',
                'type' => 'typography',
                'title' => esc_html__('Heading H4', 'edufix'),
                'output' => 'h4',
            ),
            array(
                'id' => 'heading-h5',
                'type' => 'typography',
                'title' => esc_html__('Heading H5', 'edufix'),
                'output' => 'h5',
            ),

            array(
                'id' => 'heading-h6',
                'type' => 'typography',
                'title' => esc_html__('Heading H6', 'edufix'),
                'output' => 'h6',
            ),
        )
    ));

    //Color Scheme
    CSF::createSection($prefix, array(
        'title' => esc_html__('Color Scheme', 'edufix'),
        'icon' => 'fa fa-star',
        'icon' => 'fa fa-paint-brush',
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => esc_html__('General Color', 'edufix'),
            ),
            array(
                'id' => 'main_primary_color',
                'type' => 'color',
                'title' => esc_html__('Primary Color', 'edufix'),
                'desc' => esc_html__('Main Color Scheme', 'edufix'),
                'output' => array(
                    '--edufix-primary-color' => ':root',
                ),
            ),
			array(
                'id' => 'main_secondary_color',
                'type' => 'color',
                'title' => esc_html__('Secondary Color', 'edufix'),
                'desc' => esc_html__('Secondary Color Scheme', 'edufix'),
                'output' => array(
                    '--edufix-secondary-color' => ':root',
                ),
            ),
            array(
                'id' => 'body-color',
                'type' => 'color',
                'title' => esc_html__('Body Color', 'edufix'),
				'output' => array(
                	'--edufix-text-color' => ':root',
				),
            ),
            array(
                'id' => 'body-bg-color',
                'type' => 'color',
                'title' => esc_html__('Body Background Color', 'edufix'),
				'output' => array(
                	'--edufix-bg-color' => ':root',
				),
            ),
            array(
                'id' => 'main_heading-color',
                'type' => 'color',
                'title' => esc_html__('Heading Color', 'edufix'),
				'output' => array(
                	'--edufix-title-color' => ':root',
				),
            ),
            array(
                'id' => 'stock_color',
                'type' => 'color',
                'title' => 'Stock Color',
				'output' => array(
                	'--edufix-stock-color' => ':root',
				),
            ),
            array(
                'type' => 'subheading',
                'content' => esc_html__('Section Background Color', 'edufix'),
            ),
        )
    ));

    //Backup
    CSF::createSection($prefix, array(
        'title' => esc_html__('Backup', 'edufix'),
        'icon' => 'fa fa-download',
        'fields' => array(
            array(
                'type' => 'backup',
            ),
        )
    ));
}