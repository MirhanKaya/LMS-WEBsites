<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * @class        Edufix_Enqueue_Script
 * @version      1.0
 * @category     Class
 * @author       Xcodexe
 */
class Edufix_Enqueue_Script {

    public $settings;
    protected static $instance = null;
    private $gtdu;
    private $use_minify;

    public static function instance() {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Return the Google font stylesheet URL if available.
     *
     * The use of Libre Franklin by default is localized. For languages that use
     * characters not supported by the font, the font can be disabled.
     *
     * @return string Font stylesheet or empty string if disabled.
     * @since edufix 1.2
     *
     */
    public function edufix_get_font_url() {
        $fonts_url = '';
        /* Translators: If there are characters in your language that are not
        * supported by Libre Franklin, translate this to 'off'. Do not translate
        * into your own language.
        */
        $roboto = _x('off', 'Roboto font: on or off', 'edufix');
        $inter = _x('on', 'Inter font: on or off', 'edufix');

        if ('off' !== $roboto || 'off' !== $inter) {
            $font_families = array();

            if ('off' !== $roboto) {
                $font_families[] = 'Roboto:400,500,600,700,800';
            }

            if ('off' !== $inter) {
                $font_families[] = 'Inter:400,500,600,700,800';
            }

            $query_args = array(
                'family' => urlencode(implode('|', $font_families)),
                'subset' => urlencode('latin,latin-ext'),
            );
            $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
        }
        return esc_url_raw($fonts_url);
    }


    public function register_script() {
        $this->gtdu = get_template_directory_uri();
        $this->use_minify =
            edufix_option('use_minify') ? '.min' : '';
        // Register action
        add_action('wp_enqueue_scripts', array($this, 'css_reg'));
        add_action('wp_enqueue_scripts', array($this, 'js_reg'));
        add_action('admin_enqueue_scripts', array($this, 'admin_css_reg'));
    }

    /* Register CSS */
    public function css_reg() {

        wp_enqueue_style('edufix-style_main', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

        /* Bootstrap CSS */
        wp_enqueue_style('bootstrap', $this->gtdu . '/assets/css/bootstrap.min.css');
        wp_enqueue_style('font-awesome-six', $this->gtdu . '/assets/css/all.min.css');
        wp_enqueue_style('preloder', $this->gtdu . '/assets/css/loader.min.css');
        wp_enqueue_style('themify', $this->gtdu . '/assets/css/themify-icons.css');
        wp_enqueue_style('venobox', $this->gtdu . '/assets/css/venobox.min.css');
        wp_enqueue_style('animate-css', $this->gtdu . '/assets/css/animate.css');
        wp_enqueue_style('slick', $this->gtdu . '/assets/css/slick.css');
        wp_enqueue_style('edufix-style', $this->gtdu . '/assets/css/app.css');

        $font_url = $this->edufix_get_font_url();
        if (!empty($font_url))
            wp_enqueue_style('edufix-fonts', esc_url_raw($font_url), array(), null);


        // Preloader CSS
        $preloader_opt = edufix_option('preloader');
        $preloader_color_opt = edufix_option('preloader_color');


        if (!empty($preloader_opt)) {
            $color = (!empty($preloader_color_opt)) ? $preloader_color_opt : 'rgba(150,41,230,0.97)';

            $preloader_css = '
                #preloader {
                    position: fixed;
                    top: 0;
                    left: 0;
                    bottom: 0;
                    right: 0;
                    background-color: ' . esc_attr($color) . ';
                    z-index: 9999999;
                }
    
                #loader {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }';

            wp_add_inline_style('edufix-style', $preloader_css);
        }

        $custom_css = edufix_option('custom-css');
        if (!empty($custom_css)) {
            $edufix_custom_css = $custom_css;
            wp_add_inline_style('edufix-style', $edufix_custom_css);
        }

    }

    /* Register JS */
    public function js_reg()
    {

        $smooth_scroll =
            edufix_option('smooth_scroll');

        wp_enqueue_script('bootstrap-js', $this->gtdu . '/assets/js/bootstrap.min.js', array('jquery'), '4.3.1', true);     
        wp_register_script('packery-mode', $this->gtdu . '/assets/js/packery-mode.pkgd.min.js', array(), '1.0.0', true);
        wp_register_script('isotope', $this->gtdu . '/assets/js/isotope.pkgd.min.js', array('jquery'), '3.1.12', true);
        wp_enqueue_script('wow', $this->gtdu . '/assets/js/wow.min.js', array('jquery'), '3.1.12', true);
        wp_register_script('grid-layout', $this->gtdu . '/assets/js/portfolio.js', array('jquery', 'imagesloaded','isotope','packery-mode'), '3.1.12', true);	
        wp_enqueue_script('waypoints', $this->gtdu . '/assets/js/jquery.waypoints.js', array('jquery'), '3.1.12', true);
        wp_enqueue_script('appear', $this->gtdu . '/assets/js/jquery.appear.js', array('jquery'), '3.1.12', true);
        wp_enqueue_script('venobox', $this->gtdu . '/assets/js/venobox.min.js', array('jquery'), '3.1.12', true);
        wp_enqueue_script('header-js', $this->gtdu . '/assets/js/header.js', array('jquery'), '3.1.12', true);    
        wp_enqueue_script('edufix-theme', $this->gtdu . '/assets/js/app.js', array('jquery'), false, true);
        wp_enqueue_script('grid-layout');	

        if ($smooth_scroll) {
            wp_enqueue_script('smoothscroll', $this->gtdu . '/assets/js/smoothscroll.min.js', array('jquery'), '3.1.12', true);
        }

        //Comment Reply
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }

    }

    public function admin_css_reg() {
        wp_enqueue_style('admin-font-awesome-five', $this->gtdu . '/assets/css/all.min.css');
    }

}

if (!function_exists('edufix_enqueue_script')) {
    function edufix_enqueue_script() {
        return Edufix_Enqueue_Script::instance();
    }
}

edufix_enqueue_script()->register_script();