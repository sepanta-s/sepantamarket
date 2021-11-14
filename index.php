<?php get_header();?>
<div class="site-center">
    <h1 class="product-title-index"><?php single_cat_title();?></h1><!--use this code to get category titles-  google it: wp category title -->
      <div class="clear"></div>
      <?php if (have_posts()) : while(have_posts()) : the_post();?><!--loop for show all archive posts -google it: wordpress while loop-->
         <div class="post-archive">
            <a href="<?php the_permalink();?>"><?php the_post_thumbnail('mainpage-Big-thumbnail');?>
              <span class="archive-post-title"><?php the_title();?></span>
            </a>
      </div>
    <?php endwhile;?>
    <div class="clear"></div>
  <?php sepanta_numeric_posts_nav();?>
 <?php endif;?>
</div>
<?php get_footer();?>
