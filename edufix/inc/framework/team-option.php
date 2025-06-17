<?php

// Control core classes for avoid errors
if (class_exists('CSF')) {

    // Set a unique slug-like ID
    $prefix = 'team_options';


    // Create a metabox
    CSF::createMetabox($prefix, array(
        'title' => __('Team Options', 'edufix'),
        'post_type' => 'team',
        'context' => 'normal', // The context within the screen where the boxes should display. `normal`, `side`, `advanced`
    ));


    // Create a section
    CSF::createSection($prefix, array(
        'title' => esc_html__('Team Info', 'edufix'),
        'fields' => array(

            array(
                'id' => 'designation',
                'type' => 'text',
                'default' => __('General Manager', 'edufix'),
                'title' => __('Designation', 'edufix'),
            ),

            array(
                'id' => 'member_info',
                'type' => 'textarea',
                'title' => __('Member Information', 'edufix'),
                'default' =>
                    '<strong>Speciality:</strong> Senior Digital Strategist
                    <strong>Experience:</strong> 10 Years<br>
                    <strong>Email:</strong> demo@mail.com<br>
                    <strong>Phone:</strong> +8 (123) 985 789<br>
                    <strong>Fax:</strong> +8 (123) 985 788',
            ),

            array(
                'id' => 'teams_social_link',
                'type' => 'group',
                'title' => esc_html__('Social Links', 'edufix'),
                'fields' => array(
                    array(
                        'id' => 'title',
                        'type' => 'text',
                        'title' => __('Social Title', 'edufix'),
                        'add_title' => __('Add Link', 'edufix'),
                    ),

                    array(
                        'id' => 'social_icon',
                        'type' => 'icon',
                        'title' => __('Social Icon', 'edufix'),
                    ),

                    array(
                        'id' => 'social_link',
                        'type' => 'text',
                        'title' => __('Social Link', 'edufix'),
                        'add_title' => __('Add Link', 'edufix'),
                    ),

                    array(
                        'id' => 'link_bg',
                        'type' => 'color',
                        'title' => __('Link Background Color', 'edufix'),
                        'output' => [
                            'background-color' => '.member-social a',
                        ]
                    ),


                ),

                'default' => array(
                    array(
                        'title' => __('Facebook', 'edufix'),
                        'social_icon' => 'fab fa-facebook-f',
                        'social_link' => '#',
                        'link_bg' => '#3b5998'
                    ),
                    array(
                        'title' => __('Instagram', 'edufix'),
                        'social_icon' => 'fab fa-instagram',
                        'social_link' => '#',
                        'link_bg' => '#cb2027'
                    ),
                    array(
                        'title' => __('Pinterest', 'edufix'),
                        'social_icon' => 'fab fa-pinterest-p',
                        'social_link' => '#',
                        'link_bg' => '#cb2027'
                    ),
                    array(
                        'title' => __('Linked', 'edufix'),
                        'social_icon' => 'fab fa-linkedin-in',
                        'social_link' => '#',
                        'link_bg' => '#0e76a8'
                    ),
                ),
            ),

            array(
                'id' => 'professional',
                'type' => 'fieldset',
                'title' => __('Professional Info', 'edufix'),
                'fields' => array(
                    array(
                        'id' => 'professional_title',
                        'type' => 'text',
                        'title' => __('Title', 'edufix'),
                    ),

                    array(
                        'id' => 'professional_des',
                        'type' => 'textarea',
                        'title' => __('Description', 'edufix'),
                    ),
                ),
            ),

            array(
                'id' => 'skills_title',
                'type' => 'text',
                'title' => __('Skills Title', 'edufix'),
            ),
         
            array(
                'id' => 'skills',
                'type' => 'group',
                'title' => esc_html__('Skills', 'edufix'),
                'fields' => array(
                    array(
                        'id' => 'skill_title',
                        'type' => 'text',
                        'title' => __('Skill Title', 'edufix'),
                    ),

                    array(
                        'id' => 'percentage',
                        'type' => 'text',
                        'title' => __('Skill Percentage', 'edufix'),
                    ),

                    array(
                        'id' => 'link_bg',
                        'type' => 'color',
                        'title' => __('Link Background Color', 'edufix'),
                        'output' => [
                            'background-color' => '.member-social a',
                        ]
                    ),
                ),

                'default' => array(
                    array(
                        'skill_title' => __('SEO Analysis', 'edufix'),
                        'percentage' => '85%',

                    ),
                    array(
                        'skill_title' => __('SEO Audit', 'edufix'),
                        'percentage' => '65%',

                    ),
                    array(
                        'skill_title' => __('Optimization', 'edufix'),
                        'percentage' => '94%',
                    ),
                    array(
                        'skill_title' => __('Development', 'edufix'),
                        'percentage' => '73%',
                    ),
                ),
            ),

            array(
                'id' => 'technical_information',
                'type' => 'fieldset',
                'title' => __('Technical Information', 'edufix'),
                'fields' => array(
                    array(
                        'id' => 'technical_title',
                        'type' => 'text',
                        'title' => __('Title', 'edufix'),
                    ),

                    array(
                        'id' => 'technical_des',
                        'type' => 'textarea',
                        'title' => __('Description', 'edufix'),
                    ),
                ),
            ),

            array(
                'id' => 'member-cont-form',
                'type' => 'select',
                'title' => 'Select Contact Form',
                'options' => 'posts',
                'query_args' => array(
                    'post_type' => 'wpcf7_contact_form',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                ),
                'default_option' => 'Select a Contact Form',
            ),
        )
    ));
}
  