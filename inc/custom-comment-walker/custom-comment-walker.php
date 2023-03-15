<?php

class Cometpro_Comment_Walker extends Walker_Comment {

    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );

    // constructor – wrapper for the comments list
    function __construct() { ?>

      <ul class="comments-list">

    <?php }

    // start_lvl – wrapper for child comments list
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 2; ?>

        <ul class="children">

    <?php }

    // end_lvl – closing wrapper for child comments list
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 2; ?>

        </ul>

    <?php }

    // start_el – HTML for comment template
    function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment;
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' );

        if ( 'article' == $args['style'] ) {
            $tag = 'article';
            $add_below = 'comment';
        } else {
            $tag = 'article';
            $add_below = 'comment';
        } ?>

        <li <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?> id="comment-<?php comment_ID() ?>">

            <div class="comment">
                <div class="comment-pic"><?php
                    echo get_avatar( $comment, 65, '', '', array(
                        'class' => 'img-circle',
                    ) );
                ?></div>
                <div class="comment-text">
                <?php edit_comment_link('<p class="comment-meta-item">Edit this comment</p>','',''); ?>
                <h5 class="upper">
                    <a class="comment-author-link" href="<?php comment_author_url(); ?>" itemprop="author"><?php comment_author(); ?></a>
                </h5><span class="comment-date">Posted on <?php comment_date('jS F Y'); ?> at <?php comment_time(); ?></span>
                <?php comment_text() ?><?php
                echo preg_replace(
                    '/comment-reply-link/',
                    'comment-reply-link ' . 'comment-reply',
                    get_comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ),
                    1,
                ); ?>
                </div>
            </div>

    <?php }

    // end_el – closing HTML for comment template
    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>

        </li>

    <?php }

    // destructor – closing wrapper for the comments list
    function __destruct() { ?>

      </ul>

    <?php }

}

//Comment Field Order
function mo_comment_fields_custom_order( $fields ) {
    $comment_field = $fields['comment'];
    $author_field = $fields['author'];
    $email_field = $fields['email'];
    $cookies_field = $fields['cookies'];
    unset( $fields['comment'] );
    unset( $fields['author'] );
    unset( $fields['email'] );
    unset( $fields['url'] );
    unset( $fields['cookies'] );
    // the order of fields is the order below, change it as needed:
    $fields['author'] = $author_field;
    $fields['email'] = $email_field;
    $fields['comment'] = $comment_field;
    $fields['cookies'] = $cookies_field;
    // done ordering, now return the fields:
    return $fields;
}
add_filter( 'comment_form_fields', 'mo_comment_fields_custom_order' );

// Cometpro Comment Reply JS
function cometpro_enqueue_comments_reply() {
    if ( is_singular() && comments_open() && ( get_option( 'thread_comments' ) == 1) ) {
        // Load comment-reply.js (into footer)
        wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
    }
}
add_action(  'wp_enqueue_scripts', 'cometpro_enqueue_comments_reply' );