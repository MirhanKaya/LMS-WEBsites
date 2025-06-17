<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    /*Edufix Contact Widget*/

    CSF::createWidget('edufix_widget_about', array(
        'title' => __('Edufix About Widget', 'edufix'),
        'classname' => 'about-widget_wrapper',
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => __('Widget Title', 'edufix'),
            ),
            array(
                'id' => 'widget_logo',
                'type' => 'media',
                'title' => esc_html__('Logo', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
            ),
            array(
                'id' => 'about_text',
                'type' => 'textarea',
                'title' => 'Footer About Text',
                'default' => __('Dynamically re-engineer high standards in functiona with alternative paradigms.', 'edufix'),
            ),
            array(
                'id' => 'opt-switcher',
                'type' => 'switcher',
                'title' => 'Social Link',
            ),
        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if (!function_exists('edufix_widget_about')) {
        function edufix_widget_about($args, $instance)
        {

            echo wp_kses_post($args['before_widget']);

            if (!empty($instance['title'])) {
                echo wp_kses_post($args['before_title']) . apply_filters('widget_title', $instance['title']) . wp_kses_post($args['after_title']);
            }


            if (!empty($instance['widget_logo'])) { ?>
                <img src="<?php echo esc_url($instance['widget_logo']['url']); ?>" class="footer-logo"
                     alt="<?php esc_attr__('Footer Logo', 'edufix') ?>">
            <?php }

            if (!empty(wp_kses_post($instance['about_text']))) { ?>
                <p class="about_text"><?php echo esc_html($instance['about_text']); ?></p>
            <?php }

            if (!empty($instance['opt-switcher'])) {
                echo '<h4 class="widget-title">' . esc_html__('Follow Us', 'edufix') . '</h4>';
                $profail_link = edufix_option('social_links');

                if (!empty($profail_link)) :
                    echo '<ul class="footer-social-link">';
                    foreach ($profail_link as $item) : ?>
                        <li>
                            <a href="<?php echo esc_url($item['url']); ?>">
                                <i class="<?php echo esc_attr($item['icon']); ?>"></i>
                            </a>
                        </li>
                    <?php
                    endforeach;
                    echo '</ul>';
                endif;
            }
            echo wp_kses_post($args['after_widget']);
        }
    }
}
