<div>
	<?php if ( ! function_exists( 'dynamic_sidebar' )
	           || ! dynamic_sidebar( 'First_sidebar' ) ) : ?>
        <div class="card">
            <h4>分类目录</h4>
            <ul>
				<?php wp_list_categories( 'depth=1&title_li=&orderby=id&show_count=0&hide_empty=1&child_of=0' ); ?>
            </ul>
        </div>

        <!--<div class="card">
            <h4>文章存档</h4>
            <ul>
				<?php /*wp_get_archives( 'limit=10' ); */?>
            </ul>
        </div>-->

        <div class="card">
            <h4>最新文章</h4>
            <ul>
				<?php
				$posts = get_posts( 'numberposts=6&orderby=post_date' );
				foreach ( $posts as $post ) {
					setup_postdata( $post );
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$post = $posts[0];
				?>
            </ul>
        </div>
	<?php endif; ?>
</div>