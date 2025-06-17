<?php
/**
 * Single Post Layout One
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-single single-layout-two'); ?>>
    <?php Edufix_Theme_Helper::edufix_post_thumbnail('full'); ?>
	
	<div class='post_title mb-4'>
		<h3>
			<?php the_title() ?>
		</h3>
	</div>

    <div class="entry-header">
        <div class="post-meta-wrapper">
            <div class="meta-wrapper">
                <ul class="post-meta">
                    <li class="author-simple">
                        <i class="far fa-user"></i>
		                <?php echo Edufix_Theme_Helper::edufix_posted_by(); ?>
                    </li>
                    <li><i class="fas fa-calendar-alt"></i><?php Edufix_Theme_Helper::edufix_posted_on(); ?></li>
                    <li>
                        <i class="fas fa-comments"></i><?php Edufix_Theme_Helper::edufix_entry_comments(get_the_ID()); ?>
                    </li>
                </ul><!-- .entry-meta -->
                <?php if (edufix_option('share_post')) {
                	Edufix_Theme_Helper::render_post_list_share();
                } ?>
            </div>
            <!-- /.meta-wrapper -->
        </div><!-- .post-meta-wrapper -->
    </div>

    <div class="entry-content">
        <?php the_content();
        // Page Break
        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'edufix'),
            'after' => '</div>',
        )); ?>

        <?php if (edufix_option('author_info')) {
            Edufix_Theme_Helper::render_author_info();
        } ?>
    </div>
    <!-- /.entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
