<?php

/* Password protected? ----------------------------------------------------------*/
    if ( post_password_required() )
		return;
?>

<div id="comments">

<?php

//==========================================================================
//================== Display the Comments & Pings  =========================
//==========================================================================



	if ( have_comments() ) :

        /* Display Comments ---------------------------------------------------------*/
        if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>


<div class="content-comment">


<div class='fancy_one'>
	<span>
	<?php comments_number(
			   __('0 Comments', 'ilgelo'),
			   __('1 Comment', 'ilgelo'),
			   __('% Comments', 'ilgelo')
			   ); ?>
	</span>
</div>



		<?php
   function format_comment($comment, $args, $depth) {

       $GLOBALS['comment'] = $comment; ?>

        <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">


        <div class="thecomment">

				<div class="author-img">
	      			<?php echo  get_avatar(get_comment_author_email($comment->comment_ID), 100); ?>

					</div>

				<div class="comment-text">
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</span>

					<h4 class="author margin-0"><?php printf(__('%s','ilgelo'), get_comment_author()) ?>
</h4>
					<div class="ig_meta_post_classic">
							<span class="date"><?php printf(__('%1$s','ilgelo'), get_comment_date(), get_comment_time()) ?></span>
					</div>





					<?php if ($comment->comment_approved == '0') : ?>
						<em>

						<?php echo _e('Your comment is awaiting moderation.', 'ilgelo')  ?>

						</em><br />
					<?php endif; ?>
					<?php comment_text(); ?>

				</div>

			</div>

   <?php } ?>





		<ol class="commentlist">
    <?php wp_list_comments('type=comment&callback=format_comment'); ?>
</ol>







</div>
        <?php endif; // end normal comments


/*  Comment Navigation */

		if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    		<div class="comment-navigation">
    			<div class="nav-previous"><?php previous_comments_link( sprintf( '&larr; %s', __('Older Comments', 'ilgelo') ) ); ?></div>
                <div class="nav-next"><?php next_comments_link( sprintf( '%s &rarr; ', __('Newer Comments', 'ilgelo') ) ); ?></div>
    		</div>
		<?php endif; // end comment pagination check ?>

        <?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>

		<p class="nocomments"><?php _e('Comments are closed.', 'ilgelo') ?></p>

		<?php endif; ?>

    <?php endif; // have_comments() ?>
















<!--//==========================================================================
//==========================  Form  ============================================
//==========================================================================-->



<?php

$indie_fields['new'] = '';

function my_fields($indie_fields) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$indie_fields['new'] = '
		<div class="row indie_comments floating-labels">



		<div class="col-md-4 indie-form comment-form-author"><label  class="cd-label" for="author">' . __( 'Name', 'ilgelo' ) . '</label>
		<input class="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .'" size="30"' . $aria_req . ' />
		</div>


		<div class="col-md-4 indie-form comment-form-email"><label  class="cd-label" for="email">' . __( 'Email', 'ilgelo' ) . '</label>
		<input class="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
		'" size="30"' . $aria_req . ' />
		</div>


		<div class="col-md-4 indie-form comment-form-url"><label  class="cd-label" for="url">' . __( 'Website', 'ilgelo' ) . '</label>' .
		'<input class="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" />
		</div>


	   <div class="margin-40"></div>
	   <p class="col-md-12 comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
		'</textarea></p>
		</div>
		';
	return $indie_fields;
}
add_filter('comment_form_default_fields','my_fields');


	if ( comments_open() ) :

	    $fields = array(


		  'logged_in_as' => ' <p class="logged-in-as">' .
    sprintf(
    __( 'Logged in as', 'ilgelo' ) .' <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">'. __( 'Log out?', 'ilgelo' ) .'</a>',
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>
   <p class="col-md-12 comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
    '</textarea></p>
',
            'fields'=> apply_filters( 'comment_form_default_fields', $indie_fields ),
            'comment_field' =>  '',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'title_reply' => __('<div class="fancy_one"><span>'. __( 'LEAVE A COMMENT', 'ilgelo' ) .'</span></div>', 'ilgelo'),
            'title_reply_to' => __('Leave a Reply to %s', 'ilgelo'),
            'cancel_reply_link' => __('/ Cancel Reply', 'ilgelo'),
            'label_submit' => __('Submit Comment', 'ilgelo')
	    );

	    comment_form($fields);

	 endif; // end if comments open check ?>







  		<script type="text/javascript">


	jQuery(document).ready(function($){
	if( $('.floating-labels').length > 0 ) floatLabels();

	function floatLabels() {
		var inputFields = $('.floating-labels .cd-label').next();
		inputFields.each(function(){
			var singleInput = $(this);
			//check if user is filling one of the form fields
			checkVal(singleInput);
			singleInput.on('change keyup', function(){
				checkVal(singleInput);
			});
		});
	}

	function checkVal(inputField) {
		( inputField.val() == '' ) ? inputField.prev('.cd-label').removeClass('float') : inputField.prev('.cd-label').addClass('float');
	}
});
		</script>





</div>