<!--copy content of page.php here and delete all if and while-->
<?php get_header();?>
  <div class="site-center">
    <div class="WooCommerce"><!--add Woocommerce Class beside Content-->
        <article class="content-box">
            <?php woocommerce_content();?><!---show Woocommerce Content On Page-->
        </article>
    </div>
  </div>
<?php get_footer();?>
