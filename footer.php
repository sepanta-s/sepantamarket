<div class="clear"></div>
<div class="site-center">
    <footer class="website-footer">


        <div class="bottom-offer">
            <div class="bottom-offer-text"><a class="bottom-offer-text-a" href="https://toshak.online/toshakonline-rules-policy/">تضمین کیفیت + ارسال رایگان + پرداخت در محل</a></div>
        </div>

        <span class="footer-logan">تمامی‌ تشک‌ها دارای ضمانت بوده و از طرف تشک آنلاین تقدیم شما خواهد شد.</span>
        <span class="logan-logo">
            <a href="<?php bloginfo('url'); ?>">تضمین ۱۰۰ درصدی اصالت کالا</a>
            <img src="<?php bloginfo('template_url') ?>/img/toshakOnline-guarantee-original-product.png" />
        </span>

        <div class="clear"></div>
        <!--make a invisible line for align element better above each other-->

        <?php if (is_active_sidebar('sepanta_footer_widgets')) : ?>
            <!---use this php code to put widgets on footer if widgets is activated by user--->
            <?php dynamic_sidebar('sepanta_footer_widgets'); ?>
        <?php endif; ?>

        <div class="clear"></div>
        <!--make a invisible line for align element better above each other-->

        <p class="copyright">تمامی حقوق برای تشک آنلاین محفوظ است © ۱۴۰۰-۱۳۹۷</p>

    </footer>
    <?php wp_footer(); ?>
</div>
</body>

</html>