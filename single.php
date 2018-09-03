<?php get_header(); ?>

<main>
    <div class="main-container">
		<?php if ( $_COOKIE['tocOpened'] == 'true' || ! $_COOKIE['tocOpened'] ) : ?>
        <div class="main-content" style="margin: 0; width: 72%; float: left;">
			<?php else: ?>
            <div class="main-content" style="margin: 0 auto; width: 100%; float: none;">
				<?php endif; ?>
                <article class="single-article">
					<?php if ( have_posts() ) :
						the_post();
						update_post_caches( $posts ); ?>
                        <h1 class="title"><?php the_title(); ?></h1>
                        <div class="info">
                            <span class="item">作者：<?php the_author() ?><span
                                    class="split"> • </span></span>
                            <span class="item">发布于：<?php the_time( 'Y-m-d' ) ?><span
                                    class="split"> • </span></span>
                            <span class="item">最后修改于：<?php the_modified_time( 'Y-m-d' ) ?></span>
                        </div>
						<?php the_content(); ?>
					<?php endif; ?>
                </article>

                <div class="article-meta">
                    <div>版权声明：自由转载-非商用-非衍生-保持署名（<a href="http://creativecommons.org/licenses/by-nc-nd/3.0/deed.zh">创意共享3.0许可证</a>）
                    </div>
                    <div>分类：<?php
						$cat      = get_the_category();
						$cat      = $cat[0];
						$cat_code = get_category_parents( $cat, true, '' );
						echo $cat_code ?>
                    </div>
                </div>

				<?php comments_template(); ?>
            </div>

            <aside class="main-sidebar table-of-content">
				<?php if ( $_COOKIE['tocOpened'] == 'true' || ! $_COOKIE['tocOpened'] ) : ?>
                <div class="toc-body" style="display: block;">
					<?php else: ?>
                    <div class="toc-body" style="display: none;">
						<?php endif; ?>
                        <h4 class="toc-title">目录</h4>
                    </div>
            </aside>
        </div>


</main>

<?php get_footer(); ?>
