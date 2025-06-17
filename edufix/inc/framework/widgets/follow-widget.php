<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    /*Edufix Contact Widget*/

    CSF::createWidget('edufix_widget_follow', array(
        'title' => __('Edufix Follow Us Widget', 'edufix'),
        'classname' => 'follow-widget_wrapper',
        'fields' => array(
            array(
                'id' => 'follow_text',
                'type' => 'text',
                'title' => 'Follow Us Text',
                'default' => __('Follow Us', 'edufix'),
            ),
            array(
                'id' => 'widget_image',
                'type' => 'media',
                'title' => esc_html__('Image', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
            ),
        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if (!function_exists('edufix_widget_follow')) {
        function edufix_widget_follow($args, $instance)
        {

            echo wp_kses_post($args['before_widget']); 
           ?>

            <div class="follow-us-wrapper">
                <?php
                if (!empty($instance['widget_image']['url'])) { ?>
                    <div class="follow-bg">
                        <img src="<?php echo esc_url($instance['widget_image']['url']); ?>" class="Follow-bg" alt="<?php esc_attr__('Follow bg', 'edufix') ?>">
                    </div>
                    <?php
                } ?>
                <div class="follow-cont <?php echo !empty($instance['widget_image']['url']) ? 'has-bg-img' : ''; ?>">
                    <?php
                        if (!empty(wp_kses_post($instance['follow_text']))) { ?>
                        <h4 class="follow_text"><?php echo esc_html($instance['follow_text']); ?></h4>
                    <?php }

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
                    endif; ?>
                </div>
            
            </div>
            <?php
            
            echo wp_kses_post($args['after_widget']);
        }
    }
}
