<?php /* Template Name: custompanelpage */?> <!--need this code to make custom pages on wordpress-->


<?php get_header();?>

<?php
if ( function_exists('yoast_breadcrumb') && !is_home() ) {
    yoast_breadcrumb( '<div class="site-center"><p id="breadcrumbs">','</p></div>' );
  }
?>

  <div class="site-center">
         <?php if (have_posts()):while (have_posts()): the_post();?>
                 <?php the_content();?>
            <?php endwhile;?>
         <?php endif;?>
  </div>

<?php get_footer();?>
