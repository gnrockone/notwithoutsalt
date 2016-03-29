<?php
/**
 * [realest_custom_comment - this is a custom function to open and display comments]
 * @param  [object] $comment [the wp_comment object]
 * @param  [array] $args     [the arguments in the wp_list_comments]
 * @param  [int] $depth      [description]
 * @return [type]            [returns comment display]
 */
function realest_custom_comment($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
		<?php endif; ?>

			<!--the avatar-->
			<div class="wrapper comment-avatar vcard col-sm-2 col-md-2 col-lg-2">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'], null, null, array( 'class' => 'img-circle avatar') ); ?>
			</div>

			<!--the other side-->
			<div class="wrapper col-sm-10 col-md-10 col-lg-10 clearfix">
				<!--author-->
				<div class="comment-author">
					<?php printf( __( '<span class="fn"><strong>%s</strong></span>'), get_comment_author_link() ); ?>
				</div>

				<!--if comment approved-->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
					<br />
				<?php endif; ?>

				<!--comment meta data, data and time-->
				<div class="comment-meta commentmetadata">
					<?php
						/* translators: 1: date, 2: time */
						printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
					?>
				</div>

				<!--comment text-->
				<div class="comment-text">
					<?php comment_text(); ?>
				</div>

				<!--reply-->
				<div class="reply pull-right">
				<?php comment_reply_link( array_merge( $args, array( 
				'add_below' => $add_below, 
				'depth' => $depth,
				'max_depth' => $args['max_depth'],
				'after' => '<i class="fa fa-reply"></i>'))); 
				?>
				</div>

			</div><!--.the other side-->
		<?php if ( 'div' != $args['style'] ) : ?>
		</div><!--#div-comment-->
	<?php endif; ?>
<?php
}

function bootstrap3_comment_form_fields( $fields ) {
    $commenter = wp_get_current_commenter();
    
    $req      = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
    $fields   =  array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
        'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                    '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
        'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
                    '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'        
    );
    
    return $fields;
}

function bootstrap3_comment_form( $args ) {
    $args['comment_field'] = '<div class="form-group comment-form-comment">
            <label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
            <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
        </div>';
    $args['class_submit'] = 'btn btn-default'; // since WP 4.1
    
    return $args;
}


//Uncomment this if you want to use bootstrap style for comments
// function bootstrap3_comment_form_fields( $fields ) {
//     $commenter = wp_get_current_commenter();
    
//     $req      = get_option( 'require_name_email' );
//     $aria_req = ( $req ? " aria-required='true'" : '' );
//     $html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;
    
//     $fields   =  array(
//         'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
//                     '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
//         'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
//                     '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
//         'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
//                     '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'        
//     );
    
//     return $fields;
// }

// function bootstrap3_comment_form( $args ) {
//     $args['comment_field'] = '<div class="form-group comment-form-comment">
//             <label for="comment">' . _x( 'Comment', 'noun' ) . '</label> 
//             <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
//         </div>';
//     $args['class_submit'] = 'btn btn-default'; // since WP 4.1
    
//     return $args;
// }


?>