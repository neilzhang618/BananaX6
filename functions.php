<?php
function bananax6_register_menus() {
	register_nav_menus( array(
		'header-menu' => '顶部导航菜单'
	) );
}

add_action( 'after_setup_theme', 'bananax6_register_menus' );

function bananax6_comments( $comment, $args, $depth ) {

	$GLOBALS['comment'] = $comment;
	$comment_post       = get_post( $comment->comment_post_ID );
	?>
    <li id="comment-<?php echo $comment->comment_ID; ?>" <?php comment_class(); ?>>
		<?php
		$avatar_size = 48;
		?>
        <!--<div class="commentator-avatar-wrap">
			<div class="commentator-avatar">
				<?php /*echo get_avatar($comment,$avatar_size); */ ?>
			</div>
		</div>-->
        <div class="comment-body">
            <div class="comment-heading">
                <span class="comment-author"><?php comment_author(); ?></span>
                <span>&bull;</span>
                <span class="comment-meta"><?php echo get_comment_date() . ' ' . get_comment_time(); ?></span>
                <span>&bull;</span>
                <span class="comment-reply"><?php comment_reply_link( array_merge( $args, array(
						'depth'     => $depth,
						'max_depth' => $args['max_depth']
					) ) ); ?></span>
				<?php
				if ( $comment_post ) {
					if ( $comment->user_id === $comment_post->post_author ) {
						?>
                        <span>&bull;</span>
                        <span class="comment-byauthor"><?php _e( '作者' ); ?></span>
						<?php
					}
				}
				?>

            </div>
			<?php if ( $comment->comment_approved == '0' ) : ?>
                <div class="alert alert-info"><?php _e( '您的评论正在等待审核' ); ?></div>
			<?php endif; ?>

			<?php comment_text(); ?>
        </div>
    </li>
	<?php
}

function comment_add_at( $comment_text, $comment = '' ) {
	if ( $comment->comment_parent > 0 ) {
		$comment_text = '<a rel="nofollow" class="comment_at" href="#comment-' . $comment->comment_parent . '">@' . get_comment_author( $comment->comment_parent ) . '：</a> ' . $comment_text;
	}

	return $comment_text;
}

add_filter( 'comment_text', 'comment_add_at', 10, 2 );

function bananax6_js() {
	wp_enqueue_script( 'func-js', get_template_directory_uri() . '/js/func.js', false, '', true );
}

add_action( 'wp_enqueue_scripts', 'bananax6_js' );