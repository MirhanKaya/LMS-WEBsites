<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

    /*Edufix Contact Widget*/

    CSF::createWidget('edufix_widget_author', array(
        'title' => __('Edufix Author Widget', 'edufix'),
        'classname' => 'author-about-widget',
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => __('Widget Title', 'edufix'),
            ),
            array(
                'id' => 'author_image',
                'type' => 'media',
                'title' => esc_html__('Author Image', 'edufix'),
                'add_title' => esc_html__('Upload', 'edufix'),
            ),
            array(
                'id' => 'author_name',
                'type' => 'text',
                'title' => __('Author Name', 'edufix'),
                'default' => __('Georges Embolo', 'edufix'),
            ),
            array(
                'id' => 'about_text',
                'type' => 'textarea',
                'title' => __('About Author description', 'edufix'),
                'default' => __('Hi! I`m an authtor of this blog. Read our post - be in trend!', 'edufix'),
            ),
            array(
                'id' => 'opt-switcher',
                'type' => 'switcher',
                'title' => 'Switcher',
            ),
        )
    ));

    //
    // Front-end display of widget example 1
    // Attention: This function named considering above widget base id.
    //
    if (!function_exists('edufix_widget_author')) {
        function edufix_widget_author($args, $instance)
        {

            echo wp_kses_post($args['before_widget']);

            if (!empty($instance['title'])) {
                echo wp_kses_post($args['before_title']) . apply_filters('widget_title', $instance['title']) . wp_kses_post($args['after_title']);
            }


            if (!empty($instance['author_image'])) { ?>
                 <div class="author-image">
                    <img src="<?php echo esc_url($instance['author_image']['url']); ?>" class="footer-logo" alt="<?php esc_attr__('Footer Logo', 'edufix') ?>">
                </div>
            <?php }

            if (!empty( $instance['author_name'] ) ) { ?>
                <h3 class="author_name"><?php echo wp_kses_post( $instance['author_name'] ); ?></h3>
            <?php }

            if (!empty( wp_kses_post($instance['about_text']))) { ?>
                <p class="about_text"><?php echo wp_kses_post($instance['about_text']); ?></p>
            <?php }

            if (!empty($instance['opt-switcher'])) {
                $profail_link = edufix_option('social_links');

                if (!empty( $profail_link) ) :
                    echo '<ul class="author-social-link">';
                    foreach ( $profail_link as $item) : ?>
                        <li>
                            <a href="<?php echo esc_url( $item['url'] ); ?>">
                                <i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
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
