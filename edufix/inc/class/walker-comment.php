<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
/**
* Edufix Walker Comment
*
*
* @class        Edufix_Walker_Comment
* @version      1.0
* @category     Class
* @author       Xcodexe
*/

if (!class_exists('Edufix_Walker_Comment')) {
    class Edufix_Walker_Comment extends Walker_Comment {
        public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
            $depth++;
            $GLOBALS['comment_depth'] = $depth;
            $GLOBALS['comment']       = $comment;
            if ( ! empty( $args['callback'] ) ) {
                ob_start();
                call_user_func( $args['callback'], $comment, $args, $depth );
                $output .= ob_get_clean();
                return;
            }
            if ( ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) && $args['short_ping'] ) {
                ob_start();
                $this->ping( $comment, $depth, $args );
                $output .= ob_get_clean();
            } else {
                ob_start();
                $this->comment( $comment, $depth, $args );
                $output .= ob_get_clean();
            }
        }


        protected function ping( $comment, $depth, $args ) {
            $tag = ( 'div' == $args['style'] ) ? 'div' : 'li'; ?>

            <<?php echo Edufix_Theme_Helper::render_html($tag); ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( '', $comment ); ?>>
                <div class="comment-body stand_comment">
                    <?php esc_html_e( 'Pingback:', 'edufix' ); ?> <?php comment_author_link( $comment ); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'edufix' ), '<span class="edit-link">', '</span>' ); ?>
                </div>
        <?php }

        protected function comment( $comment, $depth, $args ) {
            $max_depth_comment = ($args['max_depth'] > 4 ? 4 : $args['max_depth']);

            $GLOBALS['comment'] = $comment; ?>
            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment-body">
             
                <div class="comment-avatar">
                    <?php echo get_avatar($comment->comment_author_email, 70); ?>
                </div>
                <div class="comment_info">
                    <div class="comment_author_says"><?php printf('%s', get_comment_author_link()) ?></div>
                    <?php comment_reply_link(array_merge( $args, array('reply_text' =>   esc_html__('Reply', 'edufix'),  'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                    <div class="meta-wrapper">
                        <span><?php printf('%1$s', get_comment_date()) ?></span>
                        <?php edit_comment_link('<span>('.esc_html__('Edit', 'edufix').')</span>', '  ', '') ?>
                    </div>

                    <div class="comment_content">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <p><?php esc_html_e('Your comment is awaiting moderation.', 'edufix'); ?></p>
                    <?php endif; ?>
                    <?php comment_text() ?>
                </div>
                </div>
            </div>
            <?php

        }
    }
}