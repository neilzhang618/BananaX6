<?php get_header(); ?>

<main>
    <div class="main-container">
        <div class="main-content">
			<?php if ( have_posts() ) :
				while ( have_posts() ) :
					the_post(); ?>
                    <article class="article-item">
                        <span class="article-time"><?php the_time( 'Y-m-d' ) ?></span>
                        <a class="article-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </article>
				<?php endwhile; ?>
			<?php else : ?>
                <h1>没有文章</h1>
			<?php endif; ?>
        </div>

        <aside class="main-sidebar func-menu">
			<?php get_sidebar(); ?>
        </aside>
    </div>
</main>

<?php get_footer(); ?>
