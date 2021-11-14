<aside>
    <!---use this php code to put widgets on sidebar if sidebar is activated by user-->
    <?php if (is_active_sidebar('sepanta_sidebar_widgets')) : ?>
        <?php dynamic_sidebar('sepanta_sidebar_widgets'); ?>
    <?php endif; ?>

    <div class="sidebar">

        <div class="side-box">
            <a href="tel:+982128422729"><img src="https://toshak.online/wp-content/uploads/2021/09/ToshakOnline-support-buy-mattress-office-tell2.png" /></a>
        </div>

        <div class="side-box">
            <div class="size-category-box">
                <!--size category-->
                <span> انتخاب بر اساس عرض تشک</span>
                <div class="size-items">
                    <a href="https://toshak.online/product-tag/90/">۹۰</a>
                </div>
                <div class="size-items">
                    <a href="https://toshak.online/product-tag/100/">۱۰۰</a>
                </div>
                <div class="size-items">
                    <a href="https://toshak.online/product-tag/120/">۱۲۰</a>
                </div>
                <div class="size-items">
                    <a href="https://toshak.online/product-tag/140/">۱۴۰</a>
                </div>
                <div class="size-items">
                    <a href="https://toshak.online/product-tag/160/">۱۶۰</a>
                </div>
                <div class="size-items">
                    <a href="https://toshak.online/product-tag/180/">۱۸۰</a>
                </div>
                <div class="size-items">
                    <a href="https://toshak.online/product-tag/200/">۲۰۰</a>
                </div>
            </div>
        </div>

        <div class="side-box-noshadow">
            <!--category Section-->
            <div class="product-box-category">
                <div class="product-items-category">
                    <a href="<?php echo get_theme_mod('homepage-category1'); ?>"><img src="<?php echo get_theme_mod('homepage-category-image1'); ?>" />
                        <span><?php echo get_theme_mod('homepage-category-text1'); ?></span>
                    </a>
                </div>
                <div class="product-items-category">
                    <a href="<?php echo get_theme_mod('homepage-category2'); ?>"><img src="<?php echo get_theme_mod('homepage-category-image2'); ?>" />
                        <span><?php echo get_theme_mod('homepage-category-text2'); ?></span>
                    </a>
                </div>
                <div class="product-items-category">
                    <a href="<?php echo get_theme_mod('homepage-category3'); ?>"><img src="<?php echo get_theme_mod('homepage-category-image3'); ?>" />
                        <span><?php echo get_theme_mod('homepage-category-text3'); ?></span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</aside>
