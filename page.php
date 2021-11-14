<?php get_header(); ?>
<div class="site-center">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="content-box">
                <h1 class="page-title"><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>