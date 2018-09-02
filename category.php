<?php get_header();

$currentCtyList = get_the_category();
$currentCtyName = $currentCtyList[0]->name;

?>

<main>
    <div class="main-container">
        <div class="main-content">
			<?php if ( have_posts() ) : ?>
                <div class="search-header">
					<?php if ( ! ! $currentCtyName ) : ?>
                        <h2 class="search-title"><?php printf( '%s 分类下的结果：', '<span class="search-key">' . $currentCtyName . '</span>' ); ?></h2>
					<?php else: ?>
                        <h2 class="search-title"><?php printf( '所有结果：' ); ?></h2>
					<?php endif; ?>
                </div>
				<?php while ( have_posts() ) :
					the_post(); ?>
                    <article class="article-item">
                        <span class="article-time"><?php the_time( 'Y-n-j' ) ?></span>
                        <a class="article-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </article>
				<?php endwhile; ?>
			<?php else : ?>
                <h1>没有相关结果</h1>
			<?php endif; ?>
        </div>

        <aside class="main-sidebar func-menu">
			<?php get_sidebar(); ?>
        </aside>
    </div>
</main>

<?php get_footer(); ?>
