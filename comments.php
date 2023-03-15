<div id="comments">
  <h5 class="upper"><?php
    // 5 Comments | Example
    $cometpro_comments_count =  get_comments_number();
    if ( $cometpro_comments_count < 1 ) {
      echo $cometpro_comments_count . ' ' . __( 'Comment', 'cometpro' );
    } else {
      echo $cometpro_comments_count . ' ' . __( 'Comments', 'cometpro' );
    };
  ?></h5>

  <?php
  /**
   * Comment List
   */
  wp_list_comments( array(
      'walker'  => new Cometpro_Comment_Walker(),
  ) );

  /**
   * Comment Form
   */
  comment_form( array(
      //Define Fields
      'fields'               => array(
          //Author/Name field
          'author'  => '<div class="form-double">
                        <div class="form-group">
                            <input name="author" type="text" placeholder="Name*" class="form-control" required>
                        </div>',
          //Email Field
          'email'   =>   '<div class="form-group last">
                              <input name="email" type="text" placeholder="Email*" class="form-control" required>
                          </div>
                        </div>',
          //URL Field
          'url'     => '<p class="comment-form-url"><br /><input id="url" name="url" placeholder="Your Website"></input></p>',
          //Cookies
          'cookies' => '<p class="comment-form-cookies-consent">
                            <input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes">
                            <label for="wp-comment-cookies-consent">Save my name, email, and website in this browser for the next time I comment.</label>
                        </p>',
      ),
      // Redefine your own textarea (the comment body).
      'comment_field'        => '<div class="form-group">
                                  <textarea name="comment" placeholder="Comment*" class="form-control" required></textarea>
                                 </div>',
      // Change the title of send button
      'label_submit'         => __( 'Post Comment', 'cometpro' ),
      // Change the title of the reply section
      'title_reply'          => __( 'Leave a comment', 'cometpro' ),
      // Change the title of the reply section
      'title_reply_to'       => __( 'Reply', 'cometpro' ),
      //Cancel Reply Text
      'cancel_reply_link'    => __( 'Cancel Reply', 'cometpro' ),
      //Message Before Comment
      'comment_notes_before' => '',
      // Remove "Text or HTML to be displayed after the set of comment fields".
      'comment_notes_after'  => '',
      //Submit Button ID
      'id_submit'            => __( 'comment-submit' ),
  ) );
  ?>

</div>