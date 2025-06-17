<?php
/**
 * Template Name: Edufix Full Width
 *
 */

get_header();
the_post();

?>
<div class="content-area">
    <div class="container-fluid">
        <div class="row">
            <div id='main-content' class="col-12">
                <?php
				the_content(esc_html__( 'Read more!', 'edufix' ));
                wp_link_pages(array('before' => '<div class="page-links">' . esc_html__( 'Pages', 'edufix' ) . ': ', 'after' => '</div>'));
                

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) : ?>                   
                       
                    <div class="comment-wrapper">
                        <?php comments_template(); ?>
                    </div>
                    <!-- /.comment-wrapper -->
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php

get_footer();