<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package edufix
 */

$content       = apply_filters( 'the_content', get_the_content() );
$meta          = get_post_meta( get_the_ID(), 'edufix-post-video', true );
$videothumb    = ! empty( $meta['video-thumbnail'] ) ? $meta['video-thumbnail'] : '';
$meta_gallery  = get_post_meta( get_the_ID(), 'themename-post-gallery', true );
$category_list = get_the_category_list( ', ' );
?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-list entry-post' ); ?>>
    <header class="entry-header">

		<?php $category_list = get_the_category_list();

		$terms    = get_the_terms( get_the_ID(), 'category' );
		$cat_temp = '';

		if ( $terms && ! is_wp_error( $terms ) ) : ?>
            <div class="meta-category-wrapper">
				<?php foreach ( $terms as $term ) {
					$cat_temp .= '<a href="' . get_category_link( $term->term_id ) . '" class="at-blog-meta-category" rel="category tag">' . esc_html( $term->name ) . '</a>';
				}

                $allow_html = array(
                    'a' => array(
                        'href' => array(),
                        'title' => array(),
                        'class' => array(),
                    ),
                    'span' => array(
                        'class' => array(),
                    ),
                );

                echo wp_kses( $cat_temp, $allow_html ); ?>
            </div>

		<?php endif; ?>

		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
            <div class="post-meta-wrapper">
				<?php
				if ( 'post' === get_post_type() ) : ?>
                    <ul class="post-meta">
                        <li class="author-simple">
                            <i class="far fa-user"></i>
							<?php echo Edufix_Theme_Helper::edufix_posted_by(); ?>
                        </li>
                        <li><i class="fas fa-calendar-alt"></i><?php Edufix_Theme_Helper::edufix_posted_on(); ?></li>
                        <li>
                            <i class="fas fa-comments"></i><?php Edufix_Theme_Helper::edufix_entry_comments( get_the_ID() ); ?>
                        </li>
                    </ul><!-- .entry-meta -->
				<?php endif; ?>
            </div><!-- .entry-meta -->
		<?php endif; ?>

    </header><!-- .entry-header -->

	<?php Edufix_Theme_Helper::edufix_post_thumbnail(); ?>

    <div class="blog-content">
        <div class="entry-content">
            <p>
				<?php echo Edufix_Theme_Helper::edufix_substring( get_the_content(), 45, '...' ); ?>
            </p>

            <footer class="blog-footer">
                <a href="<?php the_permalink(); ?>" class="at-btn">
					<?php echo esc_html__( 'Read More', 'edufix' ); ?>
                </a>
            </footer>

			<?php if ( is_singular() ) {
				wp_link_pages();
			} ?>
        </div>
    </div><!-- /.entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
