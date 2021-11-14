<?php get_header(); ?>

<div class="site-center">

    <div class="content">
        <!--Top-banner-->
        <?php if (get_theme_mod('banner') == null) : ?>
            <div class="banner">
                <?php echo do_shortcode('[smartslider3 slider="2"]'); ?>
            </div>
        <?php else : ?>
            <div class="banner">
                <a href="<?php echo get_theme_mod('banner-url'); ?>"><img src="<?php echo get_theme_mod('banner'); ?>" /></a>
            </div>
        <?php endif; ?>
    </div>

    <?php get_sidebar(); ?>
    <!--get sidebar from sidebar.php-->
    <div class="content">
        <!--Guaranty Section-->
        <div class="guaranty-box">
            <div class="guaranty-items">
                <a href="<?php echo get_theme_mod('guaranty-url1'); ?>"><img src="<?php echo get_theme_mod('guaranty-image1'); ?>" />
                    <span><?php echo get_theme_mod('guaranty-text1'); ?></span>
                </a>
            </div>
            <div class="guaranty-items">
                <a href="<?php echo get_theme_mod('guaranty-url2'); ?>"><img src="<?php echo get_theme_mod('guaranty-image2'); ?>" />
                    <span><?php echo get_theme_mod('guaranty-text2'); ?></span>
                </a>
            </div>
            <div class="guaranty-items">
                <a href="<?php echo get_theme_mod('guaranty-url3'); ?>"><img src="<?php echo get_theme_mod('guaranty-image3'); ?>" />
                    <span><?php echo get_theme_mod('guaranty-text3'); ?></span>
                </a>
            </div>
            <div class="guaranty-items">
                <a href="<?php echo get_theme_mod('guaranty-url4'); ?>"><img src="<?php echo get_theme_mod('guaranty-image4'); ?>" />
                    <span><?php echo get_theme_mod('guaranty-text4'); ?></span>
                </a>
            </div>
        </div>
        <div class="clear"></div>
    </div>


    <div class="full-content">
        <!--fullcontent------------------------------------------->




        <!--product-sections-->


        <h3 class="product-title">
    <a class="product-title-a" href="https://toshak.online/product-tag/90/">تک نفره ۹۰x۲۰۰<span class="show-all-product">همه تشک‌ها</span></a>
</h3>
<div class="product-box">
    <?php $the_query = new WP_Query(array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_tag',
                'field' => 'tag_ID',
                'terms' => '888',
            ),
        ),
        'posts_per_page' => '5'
    )); ?>
    <!--show articles with category id and show only 5 last post-->
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="product-items">
                <?php if ($product->is_on_sale()) : ?>
                    <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale-home">' . esc_html__('فروش ویژه', 'woocommerce') . '</span>', $post, $product); ?>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mainpage-thumbnail'); ?>
                    <span><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></span>
                    <?php if ($product->is_on_sale()) : ?>
                        <?php echo bbloomer_show_sale_percentage_loop($max_percentage); ?>
                        <span class="cost-sale">
                            <span class="sale-percent-note">

                            </span>
                            <?php echo wc_price(wc_get_price_excluding_tax($product)); ?>
                        </span>
                </a>
            <?php else : ?>
                <span class="cost"><?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
            <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>متاسفانه هنوز پستی منتشر نکردید!</p>
    <?php endif; ?>
</div>





<h3 class="product-title">
    <a class="product-title-a" href="https://toshak.online/product-tag/160/">دونفره ۱۶۰x۲۰۰<span class="show-all-product">همه تشک‌ها</span></a>
</h3>
<div class="product-box">
    <?php $the_query = new WP_Query(array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_tag',
                'field' => 'tag_ID',
                'terms' => '892',
            ),
        ),
        'posts_per_page' => '5'
    )); ?>
    <!--show articles with category id and show only 5 last post-->
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="product-items">
                <?php if ($product->is_on_sale()) : ?>
                    <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale-home">' . esc_html__('فروش ویژه', 'woocommerce') . '</span>', $post, $product); ?>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mainpage-thumbnail'); ?>
                    <span><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></span>
                    <?php if ($product->is_on_sale()) : ?>
                        <?php echo bbloomer_show_sale_percentage_loop($max_percentage); ?>
                        <span class="cost-sale">
                            <span class="sale-percent-note">

                            </span>
                            <?php echo wc_price(wc_get_price_excluding_tax($product)); ?>
                        </span>
                </a>
            <?php else : ?>
                <span class="cost"><?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
            <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>متاسفانه هنوز پستی منتشر نکردید!</p>
    <?php endif; ?>
</div>




<h3 class="product-title">
    <a class="product-title-a" href="https://toshak.online/product-tag/120/">۱۲۰x۲۰۰<span class="show-all-product">همه تشک‌ها</span></a>
</h3>
<div class="product-box">
    <?php $the_query = new WP_Query(array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_tag',
                'field' => 'tag_ID',
                'terms' => '890',
            ),
        ),
        'posts_per_page' => '5'
    )); ?>
    <!--show articles with category id and show only 5 last post-->
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="product-items">
                <?php if ($product->is_on_sale()) : ?>
                    <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale-home">' . esc_html__('فروش ویژه', 'woocommerce') . '</span>', $post, $product); ?>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mainpage-thumbnail'); ?>
                    <span><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></span>
                    <?php if ($product->is_on_sale()) : ?>
                        <?php echo bbloomer_show_sale_percentage_loop($max_percentage); ?>
                        <span class="cost-sale">
                            <span class="sale-percent-note">

                            </span>
                            <?php echo wc_price(wc_get_price_excluding_tax($product)); ?>
                        </span>
                </a>
            <?php else : ?>
                <span class="cost"><?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
            <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>متاسفانه هنوز پستی منتشر نکردید!</p>
    <?php endif; ?>
</div>





<div class="special-section">
        <div class="special-section-bg">
            <div class="right-section">
                <a href="https://toshak.online/product-category/royal-mattress/">
                    <img src="https://toshak.online/wp-content/uploads/2021/06/toshakOnline-AllProduct-new-RoyalMattress-animated-Home-Animated.gif" />
                </a>
            </div>

            <div class="left-section">
                <a href="https://toshak.online/product-category/irankhab-mattress/">
                    <img src="https://toshak.online/wp-content/uploads/2021/06/toshakOnline-AllProduct-new-IranKhabAnimated.gif" />
                </a>
            </div>
        </div>
    </div>

    <div class="clear"></div>






    <!---Big product Section-Customizable-------------------------->
<h3 class="product-title">
    <!--get title name from category id-->
    <?php
    $cattitle = get_theme_mod('custome_category2');
    $cattitleterm = get_term_by('id', $cattitle, 'product_cat');
    ?>
    <a class="product-title-a" href="product-category/<?php echo $cattitleterm->slug; ?>"><?php echo $cattitleterm->name; ?> <span class="show-all-product">همه سایزها</span></a>
    <!--show selected title with clickable link (permalink) -->
</h3>
<div class="product-box-big">
    <?php $the_query = new WP_Query(array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'tag_ID',
                'terms' => get_theme_mod('custome_category2'),
            ),
        ),
        'posts_per_page' => get_theme_mod('shownumber2')
    )); ?>
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="product-items-big">
                <?php if ($product->is_on_sale()) : ?>
                    <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale-home-big">' . esc_html__('فروش ویژه', 'woocommerce') . '</span>', $post, $product); ?>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mainpage-Big-thumbnail'); ?>
                    <div class="background-span-big">
                        <span><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></span>
                        <?php if ($product->is_on_sale()) : ?>
                            <?php echo bbloomer_show_sale_percentage_loop_big($max_percentage); ?>
                            <span class="cost-big-sale"> <?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
                </a>
            <?php else : ?>
                <span class="cost-big"><?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
            <?php endif; ?>
            </div>
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>متاسفانه هنوز پستی منتشر نکردید!</p>
<?php endif; ?>
</div>







<h3 class="product-title">
    <a class="product-title-a" href="https://toshak.online/product-category/royal-mattress/royal-aseman/">تشک طبی‌فنری آسمان <span class="show-all-product">همه سایزها</span></a>
</h3>
<div class="product-box">
    <?php $the_query = new WP_Query(array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'tag_ID',
                'terms' => '1245',
            ),
        ),
        'posts_per_page' => '5'
    )); ?>
    <!--show articles with category id and show only 5 last post-->
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="product-items">
                <?php if ($product->is_on_sale()) : ?>
                    <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale-home">' . esc_html__('فروش ویژه', 'woocommerce') . '</span>', $post, $product); ?>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mainpage-thumbnail'); ?>
                    <span><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></span>
                    <?php if ($product->is_on_sale()) : ?>
                        <?php echo bbloomer_show_sale_percentage_loop($max_percentage); ?>
                        <span class="cost-sale">
                            <span class="sale-percent-note">

                            </span>
                            <?php echo wc_price(wc_get_price_excluding_tax($product)); ?>
                        </span>
                </a>
            <?php else : ?>
                <span class="cost"><?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
            <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>متاسفانه هنوز پستی منتشر نکردید!</p>
    <?php endif; ?>
</div>





<div class="offer-box-section">

        <div class="offer-box">
            <img src="<?php echo get_theme_mod('offer1-image'); ?>"/>
            <a class="offer-box-a" href="<?php echo get_theme_mod('offer1-url'); ?>"><?php echo get_theme_mod('offer1-text-button'); ?></a>
            <span class="offer-box-text"><?php echo get_theme_mod('offer1-text'); ?></span>

        </div>

        <div class="offer-box">
        <img src="<?php echo get_theme_mod('offer2-image'); ?>"/>
            <a class="offer-box-a" href="<?php echo get_theme_mod('offer2-url'); ?>"><?php echo get_theme_mod('offer2-text-button'); ?></a>
            <span class="offer-box-text"><?php echo get_theme_mod('offer2-text'); ?></span>

        </div>

        <div class="offer-box">
        <img src="<?php echo get_theme_mod('offer3-image'); ?>"/>
            <a class="offer-box-a" href="<?php echo get_theme_mod('offer3-url'); ?>"><?php echo get_theme_mod('offer3-text-button'); ?></a>
            <span class="offer-box-text"><?php echo get_theme_mod('offer3-text'); ?></span>

        </div>

    </div>






    <h3 class="product-title">
        <!--get title name from category id-->
        <a class="product-title-a" href="https://toshak.online/product-category/royal-mattress/royal-anahita-pad/">تشک طبی‌فنری آناهیتاپددار<span class="show-all-product">همه سایزها</span></a>
        <!--show selected title with clickable link (permalink) -->
    </h3>
    <div class="product-box-big">
        <?php $the_query = new WP_Query(array(
            'post_type' => 'product',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'tag_ID',
                    'terms' => '1197',
                ),
            ),
            'posts_per_page' => '4'
        )); ?>
        <?php if ($the_query->have_posts()) : ?>
            <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="product-items-big">
                    <?php if ($product->is_on_sale()) : ?>
                        <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale-home-big">' . esc_html__('فروش ویژه', 'woocommerce') . '</span>', $post, $product); ?>
                    <?php endif; ?>
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mainpage-Big-thumbnail'); ?>
                        <div class="background-span-big">
                            <span><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></span>
                            <?php if ($product->is_on_sale()) : ?>
                                <?php echo bbloomer_show_sale_percentage_loop_big($max_percentage); ?>
                                <span class="cost-big-sale"> <?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
                    </a>
                <?php else : ?>
                    <span class="cost-big"><?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
                <?php endif; ?>
                </div>
    </div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>متاسفانه هنوز پستی منتشر نکردید!</p>
<?php endif; ?>
</div>



<!---

<div class="last-offer">
    <div class="last-offer-text"><a class="offer-text-a" href="https://instagram.com/toshak.online.official" target="_blank">اینستاگرام تشک آنلاین را دنبال کنید</a></div>
</div>-->


<div class="last-offer-call">
    <div class="last-offer-call-text"><a class="offer-text-call-a" href="tel:+982128422729">نیاز به مشاوره رایگان دارید؟ ۰۲۱۲۸۴۲۲۷۲۹</a></div>
</div>




<h3 class="product-title">
    <a class="product-title-a" href="https://toshak.online/product-category/royal-mattress/royal-anahita/">تشک طبی‌فنری آناهیتا<span class="show-all-product">همه سایزها</span></a>
</h3>
<div class="product-box">
    <?php $the_query = new WP_Query(array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'tag_ID',
                'terms' => '1187',
            ),
        ),
        'posts_per_page' => '5'
    )); ?>
    <!--show articles with category id and show only 5 last post-->
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="product-items">
                <?php if ($product->is_on_sale()) : ?>
                    <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale-home">' . esc_html__('فروش ویژه', 'woocommerce') . '</span>', $post, $product); ?>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mainpage-thumbnail'); ?>
                    <span><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></span>
                    <?php if ($product->is_on_sale()) : ?>
                        <?php echo bbloomer_show_sale_percentage_loop($max_percentage); ?>
                        <span class="cost-sale">
                            <span class="sale-percent-note">

                            </span>
                            <?php echo wc_price(wc_get_price_excluding_tax($product)); ?>
                        </span>
                </a>
            <?php else : ?>
                <span class="cost"><?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
            <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>متاسفانه هنوز پستی منتشر نکردید!</p>
    <?php endif; ?>
</div>









<!--intriduce Section-->
<div class="about-section">
    <img class="about-image" src="https://toshak.online/wp-content/uploads/2021/11/toshakOnline-why-us-just-Blockes.png" />
    <span class="about-text">
        بررسی دقیق محصولات و قیمت بر اساس لیست کارخانه ، همچنین ارسال فوری و رایگان در تهران و سایر شهرها همچنین ارسال مرسولات از مبدا نمایندگی مجاز و اصلی همان شهر از جمله مزایای تشک‌آنلاین بوده و افتخار ما این است که تنها با معتبر‌ترین برندها همکاری داریم. شرکت‌هایی که سایت نماینده آنها است از بهترین شرکت‌های تولید تشک در ایران هستند و ما افتخار همکاری در فروش با این برندهای معتبر را داریم، لذا خرید از تشک آنلاین به معنای خرید به قیمت تولیدکننده و بدون واسطه همچنین داشتن خدمات و ضمانت‌های اصلی شرکت تولید کننده است.</span>
</div>


<div class="clear"></div>











<!---
<div class="description-category-box">
    <span>ساختار تشک‌ها چه فرقی با هم دارند؟</span>
    <a href="<?php echo get_theme_mod('main-category-url1') ?>">
        <div class="description-category-items">
            <img src="<?php echo get_theme_mod('main-category-image1') ?>">
            <span>
                <?php echo get_theme_mod('main-category-text1') ?>
            </span>
        </div>
    </a>

    <a href="<?php echo get_theme_mod('main-category-url2') ?>">
        <div class="description-category-items">
            <img src="<?php echo get_theme_mod('main-category-image2') ?>">
            <span>
                <?php echo get_theme_mod('main-category-text2') ?>
            </span>
        </div>
    </a>

    <a href="<?php echo get_theme_mod('main-category-url3') ?>">
        <div class="description-category-items">
            <img src="<?php echo get_theme_mod('main-category-image3') ?>">
            <span>
                <?php echo get_theme_mod('main-category-text3') ?>
            </span>
        </div>
    </a>
</div>
--->



<div class="clear"></div>







<h3 class="product-title">
            <!--get title name from category id-->
            <a class="product-title-a" href="https://toshak.online/product-category/royal-mattress/royal-medical-memory/">☆تشک طبی مموری‌پد<span class="show-all-product">همه سایزها</span></a>
            <!--show selected title with clickable link (permalink) -->
        </h3>
        <div class="product-box-big">
            <?php $the_query = new WP_Query(array(
                'post_type' => 'product',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'tag_ID',
                        'terms' => '1258',
                    ),
                ),
                'posts_per_page' => '4'
            )); ?>
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="product-items-big">
                        <?php if ($product->is_on_sale()) : ?>
                            <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale-home-big">' . esc_html__('فروش ویژه', 'woocommerce') . '</span>', $post, $product); ?>
                        <?php endif; ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mainpage-Big-thumbnail'); ?>
                            <div class="background-span-big">
                                <span><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></span>
                                <?php if ($product->is_on_sale()) : ?>
                                    <?php echo bbloomer_show_sale_percentage_loop_big($max_percentage); ?>
                                    <span class="cost-big-sale"> <?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
                        </a>
                    <?php else : ?>
                        <span class="cost-big"><?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
                    <?php endif; ?>
                    </div>
                    <!--<a class="add-to-card-big" href="?add-to-cart=<?php echo get_the_id(); ?>">مشاهده گزینه‌ها</a>-->
                    <a class="add-to-card-big" href="<?php the_permalink(); ?>">مشاهده محصول</a>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p>متاسفانه هنوز پستی منتشر نکردید!</p>
<?php endif; ?>
    </div>





<!--customizable section with theme mod-->
<h3 class="product-title">
    <!--get title name from category id-->
    <?php
    $cattitle = get_theme_mod('custome_category');
    $cattitleterm = get_term_by('id', $cattitle, 'product_cat');
    ?>
    <a class="product-title-a" href="product-category/<?php echo $cattitleterm->slug; ?>"><?php echo $cattitleterm->name; ?> <span class="show-all-product">همه سایزها</span></a>
    <!--show selected title with clickable link (permalink) -->
</h3>
<div class="product-box">
    <?php $the_query = new WP_Query(array(
        'post_type' => 'product',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'tag_ID',
                'terms' => get_theme_mod('custome_category'),
            ),
        ),
        'posts_per_page' => get_theme_mod('shownumber')
    )); ?>
    <!--show articles with category id and show only 5 last post-->
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="product-items">
                <?php if ($product->is_on_sale()) : ?>
                    <?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale-home">' . esc_html__('فروش ویژه', 'woocommerce') . '</span>', $post, $product); ?>
                <?php endif; ?>
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('mainpage-thumbnail'); ?>
                    <span><?php echo wp_trim_words(get_the_title(), 7, '...'); ?></span>

                    <?php if ($product->is_on_sale()) : ?>
                        <?php echo bbloomer_show_sale_percentage_loop($max_percentage); ?>
                        <span class="cost-sale">
                            <span class="sale-percent-note">

                            </span>
                            <?php echo wc_price(wc_get_price_excluding_tax($product)); ?>
                        </span>
                    <?php else : ?>
                        <span class="cost"><?php echo wc_price(wc_get_price_excluding_tax($product)); ?></span>
                    <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>متاسفانه هنوز پستی منتشر نکردید!</p>
    <?php endif; ?>
</div>









<!---
<div class="special-section">
    <div class="special-section-bg">
        <div class="right-section">
            <a href="https://toshak.online/product-category/roya-mattress/roya-ultra/ultraplus/">
                <img src="https://toshak.online/wp-content/uploads/2020/10/toshakOnline-Special-Products-ultraPlus-suggest.png" />
            </a>
        </div>

        <div class="left-section">
            <a href="https://toshak.online/product-category/roya-mattress/roya-medical/medicalplus/">
                <img src="https://toshak.online/wp-content/uploads/2020/10/toshakOnline-Special-Products-medicalPlus-suggest.png" />
            </a>
        </div>
    </div>
</div>--->





<!--show-blog-section-->
<div class="article-box">
    <?php $the_query = new WP_Query(array(
        'post_type' => 'post',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'tag_ID',
                'terms' => '24',
            ),
        ),
        'posts_per_page' => '8'
    )); ?>
    <!--show articles with category id and show only 5 last post-->
    <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>

            <div class="article-items">
                <a href="<?php the_permalink(); ?>"><?PHP the_post_thumbnail('mainpage-Big-thumbnail'); ?>
                    <span><?php echo wp_trim_words(get_the_title(), 6, '...'); ?></span>
                    <!--trim post title to 5 word-->
                    <!--  <a class="read-more" href="<?php the_permalink(); ?>">مطالعه</a> -->
                </a>
            </div>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p></p>
    <?php endif; ?>
</div>
<h3 class="article-title"><a class="product-title-a" href="https://toshak.online/category/blog/">مقالات بیشتر ></a></h3>


</div>
</div>
<?php get_footer(); ?>
<!--get footer from footer.php-->
