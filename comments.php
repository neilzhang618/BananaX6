<?php

if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

    <div class="comment-header">
        <h3 class="comment-title"><?php comments_number( '暂无评论', '1 条评论', '% 条评论' ); ?></h3>
    </div>

	<?php if ( have_comments() ) : ?>
        <ul class="comments-list">
			<?php
			wp_list_comments( array(
				'style'       => 'ul',
				'short_ping'  => true,
				'avatar_size' => 0,
                'callback'    => 'bananax6_comments'
			) );
			?>
        </ul>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <div id="comments-nav">
				<?php paginate_comments_links( 'prev_text=上一页&next_text=下一页' ); ?>
            </div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
        <p class="no-comments"><?php _e( 'Comments are closed.' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</div>