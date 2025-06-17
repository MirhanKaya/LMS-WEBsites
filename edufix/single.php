<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package edufix
 */

get_header();

$sidebar = Edufix_Theme_Helper::render_sidebars('blog');
$row_class = $sidebar['row_class'];
$column = $sidebar['column'];

$breadcrumb_alignment = edufix_option('page_header_alignment');

while (have_posts()) :
       the_post(); ?>
    <div class="page-header <?php echo $breadcrumb_alignment; ?> single-post-header-bg">
        <div class="overlay-bg"></div>

        <div class="container">
            <div class="single-post-header text-center">
                
                <div class="post-meta-wrapper">
                    <?php $category_list = get_the_category_list();
                    $terms = get_the_terms(get_the_ID(), 'category');
                    $cat_temp = '';

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

                    if ($terms && !is_wp_error($terms)) :
                        foreach ($terms as $term) {
                            $cat_temp .= '<a href="' . get_category_link($term->term_id) . '" class="at-blog-meta-category" rel="category tag">' . esc_html($term->name) . '</a>';
                        }
                    endif;
                    echo wp_kses( $cat_temp, $allow_html ); ?>

                </div><!-- .post-meta-wrapper -->

                <h2 class="single-post-title"><?php echo the_title(); ?></h2>

                <div class="breadcrumb-wrapper">
                    <div class="breadcrumb-inner">
						<?php echo Edufix_Theme_Helper::edufix_breadcrumb(); ?>
                    </div><!-- /.breadcrumb-wrapper -->
                </div>
	
            </div>
        </div>
        <!-- /.container -->

	</div>
    <!-- /.feature-image-banner -->
 <?php endwhile; ?>


<div class="blog-content-area">
	<div class="container">
		<div class="blog-archive-wrapper">
			<div class="row <?php echo apply_filters('edufix_row_class', $row_class); ?>">
				<div class="col-lg-<?php echo apply_filters('edufix_column_class', $column); ?>">
					<?php while (have_posts()) :
						the_post();
						get_template_part('template-parts/post/single/post');
					endwhile; // End of the loop.


					if (edufix_option('single_post_nav') == true ) {
						Edufix_Theme_Helper::edufix_post_nav();
					}

					if (edufix_option('single_related_post') == true ) {
						Edufix_Theme_Helper::related_post();
					}

					if (comments_open() || get_comments_number()) :
						comments_template();
					endif; ?>

				</div><!-- /.col-md-8 -->
				<?php
				echo (isset($sidebar['content']) && !empty($sidebar['content'])) ? $sidebar['content'] : '';
			?>
			</div><!-- /.row -->
		</div>
		<!-- /.blog-archive-wrapper -->
	</div><!-- /.container -->
</div><!-- #primary -->

<?php
get_footer();