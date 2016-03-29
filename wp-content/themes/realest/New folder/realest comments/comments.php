<?php 
/**
 * comments template
 */
//if password required, return
 if ( post_password_required() ) { 
 return; 
 } 
 ?>

<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">    
            <?php 
            /**
             * _nx($single,$plural,$number,$context,$domain)
             * @param - single - text that will be used if $number is 1
             * @param - plural - text that will be sued if $number is > 1
             * @param - number - number to compare
             * @param - context - context information for the translator
             * @param - domain - domain to retrieve the translated text
             */
            printf( 
            _nx( '%1$s Comment', '%1$s Comments', get_comments_number(), 'comments title', 'twentyfifteen' ), 
            number_format_i18n( get_comments_number() ), get_the_title() ); ?>
        </h2>
        <ol class="comment-list">
            <?php
                wp_list_comments( array(
                    'style'        => 'ol',
                    'short_ping'   => true,
                    'avatar_size'  => 56,
                    'reply_text'   =>'Reply',
                    'callback'     => null,
                    'end-callback' => null,
                    'walker'       => null
                ) );
            ?>
        </ol><!-- .comment-list -->
    <?php endif; // have_comments() 

    // If comments are closed and there are comments, let's leave a little note, shall we?
    if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments">
        <?php _e( 'Comments are closed.', 'twentyfifteen' ); ?>
        </p>
    <?php endif;
    
    //filter function can be seen in functions-comments.php
    add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
    add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
    
    //call the comment form
    comment_form(); 
    ?>
</div><!-- .comments-area -->



