<?php
// Control core classes for avoid errors
if ( class_exists( 'CSF' ) ) {

	/*
	 * Recent Post Widget
	 */

	CSF::createWidget( 'project_widget', array(
		'title'       => __( 'Edufix Project Gallery', 'edufix' ),
		'classname'   => 'pix-gallery-posts',
		'description' => __( 'Display gallery posts', 'edufix' ),
		'fields'      => array(
			array(
				'id'    => 'title',
				'type'  => 'text',
				'title' => __( 'Title', 'edufix' ),
			),
			array(
				'id'    => 'postcount',
				'type'  => 'text',
				'title' => __( 'Number of posts to show', 'edufix' ),
			),

		)
	) );

	//
	// Front-end display of widget example 1
	// Attention: This function named considering above widget base id.
	//
	if ( ! function_exists( 'project_widget' ) ) {
		function project_widget( $args, $instance ) {
			echo wp_kses_post( $args['before_widget'] );

			if ( ! empty( $instance['title'] ) ) {
				echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', esc_html( $instance['title'] ) ) . wp_kses_post( $args['after_title'] );
			}


			$project = new WP_Query( array(
				 'post_type'      => 'portfolio',
				 'post_status'    => 'publish',
				 'posts_per_page' => $instance['postcount'],
				 'orderby'        => 'title',
				 'order'          => 'ASC',

			) );

			if ( $project->have_posts() ) : ?>
				<div class="edufix-project-widget">
					<?php while ( $project->have_posts() ) : $project->the_post();
						?>
						<div class="widget-post edufix-widget-project-posts">

							<?php if ( has_post_thumbnail() ): ?>
								<div class="galley-posts-image_wrapper">
									<a href="<?php echo esc_url( get_permalink() ); ?>">
										<?php the_post_thumbnail( 'edufix-project-post-thumb', array(
											'alt' => the_title_attribute( array( 'echo' => false ) ),
										) ); ?>
									</a>
								</div>
							<?php endif; ?>

						</div>

					<?php endwhile; ?>
				</div>
				<?php wp_reset_postdata();
			endif;

			echo wp_kses_post( $args['after_widget'] );
		}
	}
}
