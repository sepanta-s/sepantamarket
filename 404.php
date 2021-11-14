<?php get_header(); ?>
<div class="site-center">

    <div class="right">
        <img width="350" height="500" src="<?php bloginfo('template_url') ?>/img/404.png" />
    </div>

    <div class="left">
        <span class="error">404</span>
        <span>متاسفانه صفحه ی مورد نظر یافت نشد!</span>
        <a href="<?php bloginfo('url'); ?>" class="archive-404">بازگشت به صفحه اصلی</a>
    </div>

</div>
<?php get_footer(); ?>