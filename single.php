<?php get_header(); ?>
<div class="site-center">
    <div class="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="content-box">
                    <h1 class="page-title"><?php the_title() ?></h1>
                    <div class="post-meta">
                        <?php if (get_post_modified_time() != get_the_time()) { ?>
                            <span>بروزرسانی شده در: <?php echo get_post_modified_time('d F Y'); ?></span>
                        <?php } else { ?>
                            <span>تاریخ انتشار: <?php the_date('d F Y'); ?></span>
                        <?php } ?>
                        <span>منتشر شده در: <?php the_category('  - '); ?></span>
                    </div>
                    <?php the_content(); ?>
                    <!--show real content of post-->
                    <div class="tags"><?php the_tags(' #', ' #'); ?> </div>
                </article>
                <div class="sepanta-comments">
                    <?php comments_template(); ?>
                    <!--use it for activate comment section-->
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
    
</div>
<?php get_footer(); ?>