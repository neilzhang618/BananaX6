<?php get_header(); ?>

<main>
    <div class="main-container">
        <article>
			<?php if ( have_posts() ) :
				the_post();
				update_post_caches( $posts ); ?>
                <h1 class="title"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endif; ?>
        </article>
    </div>
</main>

<?php get_footer(); ?>
