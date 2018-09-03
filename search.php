<?php get_header(); ?>

<main>
    <div class="main-container">
        <div class="main-content">
			<?php if ( have_posts() ) : ?>
                <div class="search-header">
					<?php if ( ! ! get_search_query() ) : ?>
                        <h2 class="search-title"><?php printf( '%s 的搜索结果：', '<span class="search-key">' . get_search_query() . '</span>' ); ?></h2>
					<?php else: ?>
                        <h2 class="search-title"><?php printf( '所有结果：' ); ?></h2>
					<?php endif; ?>
                </div>
				<?php while ( have_posts() ) :
					the_post(); ?>
                    <article class="article-item">
                        <span class="article-time"><?php the_time( 'Y-m-d' ) ?></span>
                        <a class="article-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </article>
				<?php endwhile; ?>
			<?php else : ?>
                <div class="search-header">
                    <h2 class="search-title">没有找到 <span class="search-key"><?php echo get_search_query() ?></span></h2>
                </div>
			<?php endif; ?>
        </div>

        <aside class="main-sidebar func-menu">
			<?php get_sidebar(); ?>
        </aside>
    </div>
</main>

<?php get_footer(); ?>
