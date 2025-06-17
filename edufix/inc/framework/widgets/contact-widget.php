<?php
// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	/* Edufix Contact Widget */

	CSF::createWidget( 'edufix_widget_contact', array(
		'title'     => __( 'Edufix Contact Widget', 'edufix' ),
		'classname' => 'edufix-contact-widget',
		'fields'    => array(
			array(
				'id'    => 'title',
				'type'  => 'text',
				'title' => __( 'Widget Title', 'edufix' ),
			),
			array(
				'id'      => 'about_text',
				'type'    => 'textarea',
				'title'   => 'Footer About Text',
				'default' => __( 'Hans-Wilhelm-Gasse 0/3, 981 Schwarzenberg.', 'edufix' ),
			),
			array(
				'id'      => 'address',
				'type'    => 'text',
				'title'   => __( 'Address', 'edufix' ),
				'default' => __( '27 Division St, Brakuti, NY 121102, USA', 'edufix' ),
			),
			array(
				'id'      => 'phone_number',
				'type'    => 'text',
				'title'   => __( 'Phone Number', 'edufix' ),
				'default' => __( '+011-125-541-5515', 'edufix' ),
			),
			array(
				'id'      => 'email_id',
				'type'    => 'text',
				'title'   => __( 'Email ID', 'edufix' ),
				'default' => __( ' info@example.com', 'edufix' ),
			),

		)
	) );

	//
	// Front-end display of widget example 1
	// Attention: This function named considering above widget base id.
	//
	if ( ! function_exists( 'edufix_widget_contact' ) ) {
		function edufix_widget_contact( $args, $instance ) {

			echo wp_kses_post( $args['before_widget'] );

			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
			}

			if ( ! empty( wp_kses_post( $instance['about_text'] ) ) ) { ?>
				<p class="about_text"><?php echo wp_kses_post( $instance['about_text'] ); ?></p>
			<?php }

			echo '<ul class="footer-contact-info">';
			if ( ! empty( wp_kses_post( $instance['address'] ) ) ) { ?>
				<li class="address"><i class="fas fa-map-marker-alt"></i><?php echo wp_kses_post( $instance['address'] ); ?></li>
			<?php }

			if ( ! empty( wp_kses_post( $instance['phone_number'] ) ) ) { ?>
				<li class="phone"><i class="fas fa-phone-alt"></i><?php echo wp_kses_post( $instance['phone_number'] ); ?></li>
			<?php }

			if ( ! empty( wp_kses_post( $instance['email_id'] ) ) ) { ?>
				<li class="email"><i class="fas fa-envelope"></i><?php echo wp_kses_post( $instance['email_id'] ); ?></li>
			<?php }
			echo '</ul>';

			echo wp_kses_post( $args['after_widget'] );
		}
	}
}