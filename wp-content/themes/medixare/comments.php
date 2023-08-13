<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area single-blog-bottom">
    <?php
		if ( have_comments() ):
		$medixare_comment_count = get_comments_number();
		$medixare_comments_text = number_format_i18n( $medixare_comment_count ) . ' ';
		if ( $medixare_comment_count > 1 && $medixare_comment_count != 0 ) {
			$medixare_comments_text .= esc_html__( 'Comments', 'medixare' );
		} else if ( $medixare_comment_count == 0 ) {
			$medixare_comments_text .= esc_html__( 'Comment', 'medixare' );
		} else {
			$medixare_comments_text .= esc_html__( 'Comment', 'medixare' );
		}
	?>
		<h4><?php echo esc_html( $medixare_comments_text );?></h4>
	<?php
		$medixare_avatar = get_option( 'show_avatars' );
	?>
		<ul class="comment-list<?php echo empty( $medixare_avatar ) ? ' avatar-disabled' : '';?>">
		<?php
			wp_list_comments(
				array(
					'style'             => 'ul',
					'callback'          => 'MedixareTheme_Helper::comments_callback',
					'reply_text'        => esc_html__( 'Reply', 'medixare' ),
					'avatar_size'       => 105,
					'format'            => 'html5',
					)
				);
		?>
		</ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav class="pagination-area comment-navigation">
				<ul>
					<li><?php previous_comments_link( esc_html__( 'Older Comments', 'medixare' ) ); ?></li>
					<li><?php next_comments_link( esc_html__( 'Newer Comments', 'medixare' ) ); ?></li>
				</ul>
			</nav><!-- #comment-nav-below -->
		<?php endif; // Check for comment navigation.?>

	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'medixare' ); ?></p>
	<?php endif;?>
	<div>
	<?php
		$medixare_commenter = wp_get_current_commenter();
		$medixare_req = get_option( 'require_name_email' );
		$medixare_aria_req = ( $medixare_req ? " required" : '' );

		$medixare_fields =  array(
			'author' =>
			'<div class="row"><div class="col-sm-6"><div class="form-group comment-form-author"><input type="text" id="author" name="author" value="' . esc_attr( $medixare_commenter['comment_author'] ) . '" placeholder="'. esc_attr__( 'Name', 'medixare' ).( $medixare_req ? ' *' : '' ).'" class="form-control"' . $medixare_aria_req . '></div></div>',

			'email' =>
			'<div class="col-sm-6 comment-form-email"><div class="form-group"><input id="email" name="email" type="email" value="' . esc_attr(  $medixare_commenter['comment_author_email'] ) . '" class="form-control" placeholder="'. esc_attr__( 'Email', 'medixare' ).( $medixare_req ? ' *' : '' ).'"' . $medixare_aria_req . '></div></div></div>',
			);

		$medixare_args = array(
			'class_submit'      => 'submit btn-send ghost-on-hover-btn',
			'submit_field'         => '<div class="form-group form-submit">%1$s %2$s</div>',
			'comment_field' =>  '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Comment *', 'medixare' ).'" class="textarea form-control" rows="10" cols="40"></textarea></div>',
			'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after' => '</h4>',
			'fields' => apply_filters( 'comment_form_default_fields', $medixare_fields ),
			);

	?>
	<?php comment_form( $medixare_args );?>
	</div>
</div>