<?php
//making main top menu Section
function register_sepantamarket_top_menu()
{
    register_nav_menu('top-menu', 'منو اصلی');
}
add_action('init', 'register_sepantamarket_top_menu');
//-----------------------------------------------------------------------------------------------------------------------
//use this code for making megamenu
function register_sepantamarket_megamenu()
{
    register_nav_menu('megamenu', 'مگا منو');
}
//adding some action for made code running on initial faze
add_action('init', 'register_sepantamarket_megamenu');
//-----------------------------------------------------------------------------------------------------------------------
//make widget section in sidebar
function sepanta_widget()
{
    register_sidebar(
        array(
            'name' => 'سایدبار وبسایت',
            'id' => 'sepanta_sidebar_widgets',
            'before_widget' => '<div class="sidebox">',
            'after_widget' => '</div>',
            'before_title' => '<span class="box-title">',
            'after_title' => '</span>'
        )
    );
}
add_action('widgets_init', 'sepanta_widget');
//-----------------------------------------------------------------------------------------------------------------------
//make widget Section in footer
function sepanta_footer()
{
    register_sidebar(
        array(
            'name' => 'فوتر وبسایت',
            'id' => 'sepanta_footer_widgets',
            'before_widget' => '<div class="footer-box">',
            'after_widget' => '</div>',
            'before_title' => '<span class="footer-box-title">',
            'after_title' => '</span>'
        )
    );
}
add_action('widgets_init', 'sepanta_footer');
//-----------------------------------------------------------------------------------------------------------------------
//make resent form widget(google it: widgets API)
class sepantapostwidget extends WP_Widget
{
    function __construct()
    {
        parent::__construct(false, 'آخرین مقالات سایت با تصویر شاخص');
    }
    //widgets output write on this functions
    function widget($args, $instance)
    {
        //use close php sign for write HTML Code inside Methodes => last we oppen it up Again
?>
        <!---bring div and span that we lastly make for resent-post-form on HTML main Page-->
        <div class="sidebox">
            <span class="box-title"><?php echo $instance['rcposttitle']; ?></span>
            <!---loop query is starting(google it:wordpress query)-->
            <?php $the_query = new WP_Query(array('cat' => 24, 'post_per_page' => $instance['rcpostcount'])); ?>
            <!--show articles with category id=1 and show only 5 last post-->
            <?php if ($the_query->have_posts()) : ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <!---articles that we need to loop. Bring it from main HTML-->
                    <article>
                        <!--get article real link-->
                        <a href="<?php the_permalink(); ?>">
                            <!--show the article thumbnail -->
                            <?php the_post_thumbnail('sepanta-thunbnails'); ?>
                            <!--show article title-->
                            <span><?php the_title() ?></span>
                        </a>
                        <div class="clear"></div>
                    </article>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p>متاسفانه هنوز پستی منتشر نکردید!</p>
            <?php endif; ?>
        </div>

    <?php
        //open php sign again for work some other functions right.

    }
    function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['rcposttitle'] = $new_instance['rcposttitle'];
        $instance['rcpostcount'] = $new_instance['rcpostcount'];
        return $instance;
    }
    function form($instance)
    {
        $rcposttitle = $instance['rcposttitle'];
        $rcpostcount = $instance['rcpostcount'];
    ?>
        <p>
            <label>عنوان ابزارک</label>
            <input type="text" placeholder="عنوان ابزارک شما" id="<?php echo $this->get_field_id('rcposttitle'); ?>" name="<?php echo $this->get_field_name('rcposttitle'); ?>" value="<?php echo $rcposttitle; ?>" />
        </p>
        <p>
            <label>تعداد مطالب</label>
            <input type="number" id="<?php echo $this->get_field_id('rcpostcount'); ?>" name="<?php echo $this->get_field_name('rcpostcount'); ?>" value="<?php echo $rcpostcount; ?>" />
        </p>
    <?php
    }
}

function sepanta_register_widgets()
{
    register_widget('sepantapostwidget');
}
//add widget beside other widgets
add_action('widgets_init', 'sepanta_register_widgets');
//-----------------------------------------------------------------------------------------------------------------------
//support thumbnails(google it:theme thumbnails)
add_theme_support('post-thumbnails');
//make thumbnail with specific size
add_image_size('mainpage-thumbnail', 240, 172, true); // w,h,True or False //[true] means clip the photo
add_image_size('mainpage-Big-thumbnail', 400, 287, true);
//-----------------------------------------------------------------------------------------------------------------------
//make post type section in wp (google it: post type wordpress) section name is: نمونه کارها
function sepantaportfolio()
{
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => __('نمونه کارها'),
            'singular_name' => __('نمونه کار')
        ),
        'public' => true,
        'has_archive' => false
    ));
}
//make it run on init faze
add_filter('init', 'sepantaportfolio');

//-----------------------------------------------------------------------------------------------------------------------
//show page numbers (copy this code from mihanwp page)
function sepanta_numeric_posts_nav()
{
    if (is_singular()) return;
    global $wp_query;
    /** Stop execution if there's only 1 page */
    if ($wp_query->max_num_pages <= 1) return;
    $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;
    $max = intval($wp_query->max_num_pages);
    /** Add current page to the array */
    if ($paged >= 1) $links[] = $paged;
    /** Add the pages around the current page to the array */
    if ($paged >= 3) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }

    if (($paged + 2) <= $max) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }

    echo '<div class="pagenavigation"><ul>' . "\n";
    /** Previous Post Link */
    if (get_previous_posts_link()) printf('<li>%s</li>' . "\n", get_previous_posts_link());
    /** Link to first page, plus ellipses if necessary */
    if (!in_array(1, $links)) {
        $class = 1 == $paged ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)), '1');
        if (!in_array(2, $links)) echo '<li>…</li>';
    }

    /** Link to current page, plus 2 pages in either direction if necessary */
    sort($links);
    foreach ((array)$links as $link) {
        $class = $paged == $link ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($link)), $link);
    }

    /** Link to last page, plus ellipses if necessary */
    if (!in_array($max, $links)) {
        if (!in_array($max - 1, $links)) echo '<li>…</li>' . "\n";
        $class = $paged == $max ? ' class="active"' : '';
        printf('<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link($max)), $max);
    }

    /** Next Post Link */
    if (get_next_posts_link()) printf('<li>%s</li>' . "\n", get_next_posts_link());
    echo '</ul></div>' . "\n";
}
//-----------------------------------------------------------------------------------------------------------------------
// Support WooCommerce
function sepantawoo()
{
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'sepantawoo');
//-----------------------------------------------------------------------------------------------------------------------
//move price lower than p
// To Move price underneath title use code
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
// remove action which show Price on their default location
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);
// add action with Priority just more than the woocommerce_template_single_title

// removed coupons from checkout page
remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);

/* Remove related products output on bottom of product page
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
*/

//-----------------------------------------------------------------------------------------------------------------------
//woocommerce gallery image slider
add_theme_support('wc-product-gallery-slider');
//woocommerce full screen gallery image slider
add_theme_support('wc-product-gallery-lightbox');
//show title of site
add_theme_support('title-tag');
//-----------------------------------------------------------------------------------------------------------------------
//WP Customizer Codes
function sepantacustomizer($wp_customize)
{
    //Make section for logo and cart style changer
    $wp_customize->add_section(
        'sepantamarketstyle',
        array(
            'title' => 'لوگو و پیشنهاد بالای سایت',
            'priority' => 1,
        )
    );
    //logo
    $wp_customize->add_setting('logo');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'logo', array(
            'label' => 'لوگوی سایت',
            'description' => 'لوگوی سایتتان را از اینجا تغییر دهید-سایز پیشنهادی ۱۳۳ در۹۵ ',
            'section' => 'sepantamarketstyle',
            'setting' => 'logo'
        ))
    );
    //cart Color Picker
    $wp_customize->add_setting('cartcolor');
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize, 'cartcolor', array(
            'label' => 'رنگ زمینه پخش آنلاین',
            'description' => 'میتوانید رنگ دکمه بالایی صفحه را تغییر دهید-پخش آنلاین',
            'section' => 'sepantamarketstyle',
            'setting' => 'cartcolor'
        ))
    );
    $wp_customize->add_setting('toplogantext');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'toplogantext', array(
            'label' => 'ورود متن تبلیغات',
            'description' => 'متن شعار بالای هدر سایت را از اینجا تغییر دهید',
            'section' => 'sepantamarketstyle',
            'setting' => 'toplogantext'
        ))
    );
    $wp_customize->add_setting('toploganurl');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'toploganurl', array(
            'label' => 'لینک تخفیف یا اعلان',
            'description' => ' به چه صفحه ای پیوند شود ؟فقط لینک مثل /yalda/',
            'section' => 'sepantamarketstyle',
            'setting' => 'toploganurl'
        ))
    );
    $wp_customize->add_setting('toploganbtn');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'toploganbtn', array(
            'label' => 'ورود متن دکمه',
            'description' => '(فعلا غیر فعال)متن دکمه بالای هدر سایت را از اینجا تغییر دهید',
            'section' => 'sepantamarketstyle',
            'setting' => 'toploganbtn'
        ))
    );
    //-----------------------------make homepage section customizable category and name---------
    $wp_customize->add_section(
        'homepage',
        array(
            'title' => ' دسته‌بندی محصولات در صفحه اصلی',
            'priority' => 2,
        )
    );
    //category name
    // $wp_customize-> add_control(
    // new WP_Customize_Control( $wp_customize,'custome_name', array(
    // 'label' => 'نام بخش محصولات را وارد کنید',
    //'section' =>'homepage',
    //'setting' =>'custome_name',
    //))
    //);

    //category ID
    $wp_customize->add_setting('custome_category');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'custome_category', array(
            'label' => '۱:شماره آی دی  دسته بندی محصولاتی که میخواهید نمایش داده شوند را وارد کنید',
            'section' => 'homepage',
            'setting' => 'custome_category',
            'type' => 'number'
        ))
    );
    //how many product to show
    $wp_customize->add_setting('shownumber');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'shownumber', array(
            'label' => 'چند محصول نمایش داده شود؟',
            'section' => 'homepage',
            'description' => 'تعداد پیشنهادی برای کارکرد صحیح قالب ۴ عدد میباشد',
            'setting' => 'shownumber',
            'type' => 'number'
        ))
    );
    //category Id 2
    $wp_customize->add_setting('custome_category2');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'custome_category2', array(
            'label' => '۲:شماره آی دی  دسته بندی محصولاتی که میخواهید نمایش داده شوند را وارد کنید',
            'section' => 'homepage',
            'setting' => 'custome_category2',
            'type' => 'number'
        ))
    );
    //how many product to show
    $wp_customize->add_setting('shownumber2');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'shownumber2', array(
            'label' => 'چند محصول نمایش داده شود؟',
            'section' => 'homepage',
            'description' => 'تعداد پیشنهادی برای کارکرد صحیح قالب ۵ عدد میباشد',
            'setting' => 'shownumber2',
            'type' => 'number'
        ))
    );

    //-----------------------------change banner----------------------------------------------
    $wp_customize->add_section(
        'homepage-banner',
        array(
            'title' => 'تغییر بنر صفحه اصلی',
            'priority' => 3,
        )
    );
    //category name
    $wp_customize->add_setting('banner');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'banner', array(
            'label' => 'بنر جدید را از اینجا انتخاب کنید - سایز مطلوب ۹۲۰ در ۳۹۰',
            'section' => 'homepage-banner',
            'setting' => 'banner',
        ))
    );
    $wp_customize->add_setting('banner-url');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'banner-url', array(
            'label' => 'لینک شود به:',
            'description' => 'آدرس url را وارد کنید',
            'section' => 'homepage-banner',
            'setting' => 'banner-url'
        ))
    );

    //------------------------category selection------------------------------------------------
    $wp_customize->add_section(
        'homepage-category-selection',
        array(
            'title' => 'کتگوری محصولات',
            'priority' => 4,
        )
    );
    $wp_customize->add_setting('homepage-category-image1');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'homepage-category-image1', array(
            'label' => 'تصویر را از فیلد زیر انتخاب کنید',
            'section' => 'homepage-category-selection',
            'setting' => 'homepage-category-image1',
        ))
    );
    $wp_customize->add_setting('homepage-category1');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'homepage-category1', array(
            'label' => 'آدرس url 1',
            'description' => 'آدرس url کتگوری را وارد کنید',
            'section' => 'homepage-category-selection',
            'setting' => 'homepage-category1'
        ))
    );
    $wp_customize->add_setting('homepage-category-text1');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'homepage-category-text1', array(
            'label' => 'نام دسته بندی ',
            'description' => 'نام کتگوری را بنویسید',
            'section' => 'homepage-category-selection',
            'setting' => 'homepage-category-text1'
        ))
    );
    //section2
    $wp_customize->add_setting('homepage-category-image2');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'homepage-category-image2', array(
            'label' => 'تصویر را از فیلد زیر انتخاب کنید',
            'section' => 'homepage-category-selection',
            'setting' => 'homepage-category-image2',
        ))
    );
    $wp_customize->add_setting('homepage-category2');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'homepage-category2', array(
            'label' => 'آدرس url 1',
            'description' => 'آدرس url کتگوری را وارد کنید',
            'section' => 'homepage-category-selection',
            'setting' => 'homepage-category2'
        ))
    );
    $wp_customize->add_setting('homepage-category-text2');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'homepage-category-text2', array(
            'label' => 'نام',
            'description' => 'نام کتگوری را بنویسید',
            'section' => 'homepage-category-selection',
            'setting' => 'homepage-category-text2'
        ))
    );
    //section3
    $wp_customize->add_setting('homepage-category-image3');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'homepage-category-image3', array(
            'label' => 'تصویر را از فیلد زیر انتخاب کنید',
            'section' => 'homepage-category-selection',
            'setting' => 'homepage-category-image3',
        ))
    );
    $wp_customize->add_setting('homepage-category3');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'homepage-category3', array(
            'label' => 'آدرس url 3',
            'description' => 'آدرس url کتگوری را وارد کنید',
            'section' => 'homepage-category-selection',
            'setting' => 'homepage-category3'
        ))
    );
    $wp_customize->add_setting('homepage-category-text3');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'homepage-category-text3', array(
            'label' => 'نام',
            'description' => 'نام کتگوری را بنویسید',
            'section' => 'homepage-category-selection',
            'setting' => 'homepage-category-text3'
        ))
    );

    //----------------------------------------main product category under banner------------------------------------------//
    $wp_customize->add_section(
        'main-category-selection',
        array(
            'title' => 'کتگوری محصولات به شکل بزرگ',
            'priority' => 5,
        )
    );
    $wp_customize->add_setting('main-category-image1');//-------------------------Section1
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'main-category-image1', array(
            'label' => 'تصویر را از فیلد زیر انتخاب کنید',
            'section' => 'main-category-selection',
            'setting' => 'main-category-image1',
        ))
    );
    $wp_customize->add_setting('main-category-url1'); 
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'main-category-url1', array(
            'label' => 'url',
            'description' => 'آدرس url کتگوری را وارد کنید',
            'section' => 'main-category-selection',
            'setting' => 'main-category-url1'
        ))
    );
    
    $wp_customize->add_setting('main-category-text1');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'main-category-text1', array(
            'label' => 'توضیح',
            'description' => 'توضیح دسته بندی را وارد کنید',
            'section' => 'main-category-selection',
            'setting' => 'main-category-text1'
        ))
    );

    $wp_customize->add_setting('main-category-image2');//------------------------Section2
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'main-category-image2', array(
            'label' => 'تصویر را از فیلد زیر انتخاب کنید',
            'section' => 'main-category-selection',
            'setting' => 'main-category-image2',
        ))
    );
    $wp_customize->add_setting('main-category-url2'); 
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'main-category-url2', array(
            'label' => 'url',
            'description' => 'آدرس url کتگوری را وارد کنید',
            'section' => 'main-category-selection',
            'setting' => 'main-category-url2'
        ))
    );

    $wp_customize->add_setting('main-category-text2');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'main-category-text2', array(
            'label' => 'توضیح',
            'description' => 'توضیح دسته بندی را وارد کنید',
            'section' => 'main-category-selection',
            'setting' => 'main-category-text2'
        ))
    );

    $wp_customize->add_setting('main-category-image3');//------------------------Section3
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'main-category-image3', array(
            'label' => 'تصویر را از فیلد زیر انتخاب کنید',
            'section' => 'main-category-selection',
            'setting' => 'main-category-image3',
        ))
    );
    $wp_customize->add_setting('main-category-url3'); 
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'main-category-url3', array(
            'label' => 'url',
            'description' => 'آدرس url کتگوری را وارد کنید',
            'section' => 'main-category-selection',
            'setting' => 'main-category-url3'
        ))
    );

    $wp_customize->add_setting('main-category-text3');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'main-category-text3', array(
            'label' => 'توضیح',
            'description' => 'توضیح دسته بندی را وارد کنید',
            'section' => 'main-category-selection',
            'setting' => 'main-category-text3'
        ))
    );


    //--------------------------------------guaranty section---------------------------------------------//
    $wp_customize->add_section(
        'guaranty-selection',
        array(
            'title' => 'دسته بندی زیر بنر ۴ عدد تایل',
            'priority' => 6,
        )
    );
    //Section1-------------------------//
    $wp_customize->add_setting('guaranty-image1');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'guaranty-image1', array(
            'label' => 'تصویر  یا آیکون را از فیلد زیر انتخاب کنید',
            'section' => 'guaranty-selection',
            'setting' => 'guaranty-image1',
        ))
    );
    $wp_customize->add_setting('guaranty-url1');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'guaranty-url1', array(
            'label' => 'url',
            'description' => 'آدرس url را وارد کنید',
            'section' => 'guaranty-selection',
            'setting' => 'guaranty-url1'
        ))
    );
    $wp_customize->add_setting('guaranty-text1');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'guaranty-text1', array(
            'label' => 'متن',
            'description' => 'متن بخش را بنویسید',
            'section' => 'guaranty-selection',
            'setting' => 'guranty-text1'
        ))
    );
    //Section2-------------------------//
    $wp_customize->add_setting('guaranty-image2');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'guaranty-image2', array(
            'label' => 'تصویر  یا آیکون را از فیلد زیر انتخاب کنید',
            'section' => 'guaranty-selection',
            'setting' => 'guaranty-image2',
        ))
    );
    $wp_customize->add_setting('guaranty-url2');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'guaranty-url2', array(
            'label' => 'url',
            'description' => 'آدرس url را وارد کنید',
            'section' => 'guaranty-selection',
            'setting' => 'guaranty-url2'
        ))
    );
    $wp_customize->add_setting('guaranty-text2');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'guaranty-text2', array(
            'label' => 'متن',
            'description' => 'متن بخش را بنویسید',
            'section' => 'guaranty-selection',
            'setting' => 'guranty-text2'
        ))
    );
    //Section3-------------------------//
    $wp_customize->add_setting('guaranty-image3');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'guaranty-image3', array(
            'label' => 'تصویر  یا آیکون را از فیلد زیر انتخاب کنید',
            'section' => 'guaranty-selection',
            'setting' => 'guaranty-image3',
        ))
    );
    $wp_customize->add_setting('guaranty-url3');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'guaranty-url3', array(
            'label' => 'url',
            'description' => 'آدرس url را وارد کنید',
            'section' => 'guaranty-selection',
            'setting' => 'guaranty-url3'
        ))
    );
    $wp_customize->add_setting('guaranty-text3');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'guaranty-text3', array(
            'label' => 'متن',
            'description' => 'متن بخش را بنویسید',
            'section' => 'guaranty-selection',
            'setting' => 'guranty-text3'
        ))
    );
    //Section4-------------------------//
    $wp_customize->add_setting('guaranty-image4');
    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, 'guaranty-image4', array(
            'label' => 'تصویر  یا آیکون را از فیلد زیر انتخاب کنید',
            'section' => 'guaranty-selection',
            'setting' => 'guaranty-image4',
        ))
    );
    $wp_customize->add_setting('guaranty-url4');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'guaranty-url4', array(
            'label' => 'url',
            'description' => 'آدرس url را وارد کنید',
            'section' => 'guaranty-selection',
            'setting' => 'guaranty-url4'
        ))
    );
    $wp_customize->add_setting('guaranty-text4');
    $wp_customize->add_control(
        new WP_Customize_Control($wp_customize, 'guaranty-text4', array(
            'description' => 'متن بخش را بنویسید',
            'label' => 'متن',
            'section' => 'guaranty-selection',
            'setting' => 'guranty-text4'
        ))
    );




 //----------------------------------------3 special offer in Home Page------------------------------------------//
 $wp_customize->add_section(
    'special-offer-section',
    array(
        'title' => '۳ پیشنهاد ویژه',
        'priority' => 7,
    )
);
$wp_customize->add_setting('offer1-image');//-------------------------Section1
$wp_customize->add_control(
    new WP_Customize_Image_Control($wp_customize, 'offer1-image', array(
        'label' => 'تصویر را انتخاب کنید',
        'section' => 'special-offer-section',
        'setting' => 'offer1-image',
    ))
);
$wp_customize->add_setting('offer1-url'); 
$wp_customize->add_control(
    new WP_Customize_Control($wp_customize, 'offer1-url', array(
        'label' => 'url',
        'description' => 'آدرس url را وارد کنید',
        'section' => 'special-offer-section',
        'setting' => 'offer1-url'
    ))
);

$wp_customize->add_setting('offer1-text');
$wp_customize->add_control(
    new WP_Customize_Control($wp_customize, 'offer1-text', array(
        'label' => 'توضیح',
        'description' => 'متن تخفیف را بنویسید',
        'section' => 'special-offer-section',
        'setting' => 'offer1-text'
    ))
);
$wp_customize->add_setting('offer1-text-button');
$wp_customize->add_control(
    new WP_Customize_Control($wp_customize, 'offer1-text-button', array(
        'label' => 'دکمه',
        'description' => 'متن دکمه را بنویسید',
        'section' => 'special-offer-section',
        'setting' => 'offer1-text-button'
    ))
);
$wp_customize->add_setting('offer2-image');//-------------------------Section2
$wp_customize->add_control(
    new WP_Customize_Image_Control($wp_customize, 'offer2-image', array(
        'label' => 'تصویر را انتخاب کنید',
        'section' => 'special-offer-section',
        'setting' => 'offer2-image',
    ))
);
$wp_customize->add_setting('offer2-url'); 
$wp_customize->add_control(
    new WP_Customize_Control($wp_customize, 'offer2-url', array(
        'label' => 'url',
        'description' => 'آدرس url را وارد کنید',
        'section' => 'special-offer-section',
        'setting' => 'offer2-url'
    ))
);

$wp_customize->add_setting('offer2-text');
$wp_customize->add_control(
    new WP_Customize_Control($wp_customize, 'offer2-text', array(
        'label' => 'توضیح',
        'description' => 'متن تخفیف را بنویسید',
        'section' => 'special-offer-section',
        'setting' => 'offer2-text'
    ))
);
$wp_customize->add_setting('offer2-text-button');
$wp_customize->add_control(
    new WP_Customize_Control($wp_customize, 'offer2-text-button', array(
        'label' => 'دکمه',
        'description' => 'متن دکمه را بنویسید',
        'section' => 'special-offer-section',
        'setting' => 'offer2-text-button'
    ))
);
$wp_customize->add_setting('offer3-image');//-------------------------Section3
$wp_customize->add_control(
    new WP_Customize_Image_Control($wp_customize, 'offer3-image', array(
        'label' => 'تصویر را انتخاب کنید',
        'section' => 'special-offer-section',
        'setting' => 'offer3-image',
    ))
);
$wp_customize->add_setting('offer3-url'); 
$wp_customize->add_control(
    new WP_Customize_Control($wp_customize, 'offer3-url', array(
        'label' => 'url',
        'description' => 'آدرس url را وارد کنید',
        'section' => 'special-offer-section',
        'setting' => 'offer3-url'
    ))
);

$wp_customize->add_setting('offer3-text');
$wp_customize->add_control(
    new WP_Customize_Control($wp_customize, 'offer3-text', array(
        'label' => 'توضیح',
        'description' => 'متن تخفیف را بنویسید',
        'section' => 'special-offer-section',
        'setting' => 'offer3-text'
    ))
);
$wp_customize->add_setting('offer3-text-button');
$wp_customize->add_control(
    new WP_Customize_Control($wp_customize, 'offer3-text-button', array(
        'label' => 'دکمه',
        'description' => 'متن دکمه را بنویسید',
        'section' => 'special-offer-section',
        'setting' => 'offer3-text-button'
    ))
);











}
add_action('customize_register', 'sepantacustomizer');
//--------------------------------------change login pictures and all login Css--------------------------------------------------

function wpb_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(https://toshak.online/wp-content/uploads/2020/03/toshakOnlineLogowithtext.png);
            height: 60px;
            width: 330px;
            background-size: 200px 75px;
            background-repeat: no-repeat;
            padding-bottom: 10px;
        }

        body.login {
            background-image: linear-gradient(4rad, #285496, #67a0cb);
        }

        .login form {
            border-radius: 10px;
            box-shadow: 8px 8px 10px rgba(0, 0, 0, 0.4) !important;
        }

        .login label {
            font-family: IRANSans;
            line-height: 3.5 !important;
            font-size: 15px !important;
            color: #2b2b2b;
        }

        #login form p {
            color: #2b2b2b;
        }

        .login #backtoblog a,
        .login #nav a {
            color: #fff !important;
            font-size: 15px !important;
        }

        .login * {
            color: #464444;
        }

        .login #login_error a {
            color: #7abbfb;
        }

        .login #login_error strong {
            color: #dc3232;
            margin: 0 4px;
        }

        .login #login_error,
        .login .message,
        .login .success {
            color: #2b2b2b;
            border-radius: 10px;
            font-family: IRANSans;
        }

        .wp-core-ui .button-group.button-large .button,
        .wp-core-ui .button.button-large {
            width: 137px;
            margin-top: 12px;
            box-shadow: 3px 3px 7px rgba(0, 0, 0, 0.5);
        }

        .login .forgetmenot label,
        .login .pw-weak label {
            font-size: 13px !important;
            margin-top: 5px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'wpb_login_logo');
//--------------------------------------change login logo url --------------------------------------------------
function wpb_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'wpb_login_logo_url');

function wpb_login_logo_url_title()
{
    return 'تشک آنلاین';
}
add_filter('login_headertitle', 'wpb_login_logo_url_title');


//-----------------------------fix for cookie error while login.------------------------------------------------
function set_wp_test_cookie()
{
    setcookie(TEST_COOKIE, '
WP
Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN);
    if (SITECOOKIEPATH != COOKIEPATH)
        setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);
}
add_action('after_setup_theme', 'set_wp_test_cookie', 101);


//------------------------show percentage on sale products----------------------------------------------------------


//add_action( 'woocommerce_before_shop_loop_item_title', 'bbloomer_show_sale_percentage_loop', 25 ); //------if active : show percent on woo product page

function bbloomer_show_sale_percentage_loop()
{

    global $product;

    if ($product->is_on_sale()) {

        if (!$product->is_type('variable')) {

            $max_percentage = (($product->get_regular_price() - $product->get_sale_price()));
        } else {

            $max_percentage = 0;

            foreach ($product->get_children() as $child_id) {
                $variation = wc_get_product($child_id);
                $price = $variation->get_regular_price();
                $sale = $variation->get_sale_price();
                if ($price != 0 && !empty($sale)) $percentage = ($price - $sale);
                if ($percentage > $max_percentage) {
                    $max_percentage = $percentage;
                }
            }
        }

        echo "<div class='sale-perc'>" . fa_number(number_format(round($max_percentage))) . " -</div>"; // use echo fa_number($x); for make number persian


    }
}

//----------------------------------------------percentage big products--------------------------------

function bbloomer_show_sale_percentage_loop_big()
{

    global $product;

    if ($product->is_on_sale()) {

        if (!$product->is_type('variable')) {

            $max_percentage = (($product->get_regular_price() - $product->get_sale_price()));
        } else {

            $max_percentage = 0;

            foreach ($product->get_children() as $child_id) {
                $variation = wc_get_product($child_id);
                $price = $variation->get_regular_price();
                $sale = $variation->get_sale_price();
                if ($price != 0 && !empty($sale)) $percentage = ($price - $sale);
                if ($percentage > $max_percentage) {
                    $max_percentage = $percentage;
                }
            }
        }

        echo "<div class='sale-perc-big'>" . fa_number(number_format(round($max_percentage))) . " -</div>"; // use echo fa_number($x); for make number persian


    }
}

//-----------------------------------------persianNumbers-----------------------------------------
function fa_number($number)
{
    /*if(!is_numeric($number) || empty($number))
   return '۰';*/
    if (empty($number))
        return '۰';
    $en = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", ",");
    $fa = array("۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", ",");

    return str_replace($en, $fa, $number);
}
// use: echo fa_number($x);    for make number persian :)

//-------------------------------Enamad-Issue-solved-----------------------------------------------
//This code removes noreferrer from your new or updated posts
function sepanta_targeted_link_rel($rel_values)
{
    return '';
}
add_filter('wp_targeted_link_rel', 'sepanta_targeted_link_rel', 999);

//-------------------change Description and additinal-Information name and ReOrdere---------------
/**
 * --------------------------------------------------------Rename product data tabs---------------
 */
add_filter('woocommerce_product_tabs', 'woo_rename_tabs', 98);
function woo_rename_tabs($tabs)
{

    $tabs['description']['title'] = __('بررسی محصول');        // Rename the description tab
    $tabs['reviews']['title'] = __('نظرات');                // Rename the reviews tab
    $tabs['additional_information']['title'] = __('ویژگی‌ها');    // Rename the additional information tab

    return $tabs;
}



/*
 ----------------------------------------------------------* Reorder product data tabs-----------
 */
add_filter('woocommerce_product_tabs', 'woo_reorder_tabs', 98);
function woo_reorder_tabs($tabs)
{

    $tabs['reviews']['priority'] = 15;            // Reviews last
    $tabs['description']['priority'] = 10;            // Description second
    $tabs['additional_information']['priority'] = 5;    // Additional information first

    return $tabs;
}

//---------------------------------------------------Edit Checkout field ----------------------
/*
 Remove billing company and postCode fields
 */
function wc_remove_checkout_fields($fields)
{

    unset($fields['billing']['billing_company']);
    // Billing fields
    unset($fields['billing']['billing_postcode']);
    // Shipping fields
    unset($fields['shipping']['shipping_postcode']);

    return $fields;
}
add_filter('woocommerce_checkout_fields', 'wc_remove_checkout_fields');



//-------------------------------------------------------solve Error: An account is already registered with your email address Error-----



function sepanta_remove_register_alert($data)
{
    $email = $data['billing_email'];
    if (email_exists($email)) {
        $data['createaccount'] = 0;
    }
    return $data;
}
add_action('woocommerce_checkout_posted_data', 'sepanta_remove_register_alert');

//------------------------------------------------------solve: purchase like guest with registered email-----------------------------------

function sepanta_set_customer_email($order, $data)
{
    $email = $data['billing_email'];
    if (email_exists($email)) {
        $user = get_user_by('email', $email);
        $order->set_customer_id($user->ID);
    }
}
add_action('woocommerce_checkout_create_order', 'sepanta_set_customer_email', 10, 2);



//---------------------------------------------------------------changeDefaultEmail from wordpress to toshak.online-------------------------



// Function to change email address
function wpb_sender_email($original_email_address)
{
    return 'info@toshak.online';
}

// Function to change sender name
function wpb_sender_name($original_email_from)
{
    return 'toshak.online';
}

// Hooking up our functions to WordPress filters
add_filter('wp_mail_from', 'wpb_sender_email');
add_filter('wp_mail_from_name', 'wpb_sender_name');


//---------------------------------------------------------------------Show Dome notes no checkOut Page----------------------------------------
add_action('woocommerce_after_order_notes', 'woocommerceir_notice_shipping');

function woocommerceir_notice_shipping()
{
    echo '<p class="allow-shipping">ارسال سفارشات موجود در انبار تهران توسط وانت‌بار رایگان بوده و تحویل ۳ تا ۶ ساعته می‌باشد</p>';
    echo '<p class="allow-shipping">ارسال سفارشات موجود در انبار به سایر ‌شهرها از طریق باربری (پس‌کرایه) تا ۲۴ ساعت پس از واریز انجام خواهد شد</p>';
    echo '<p class="allow">در صورت نیاز به حمل تشک در طبقات لطفا در بخش توضیحات محصول برای ما بنویسید (فقط در تهران)</p>';
}


/**
 * --------------------------------------------------------------------Show sale prices in the cart.-------------------------------------------
 */
function my_custom_show_sale_price_at_cart( $old_display, $cart_item, $cart_item_key ) {

	/** @var WC_Product $product */
	$product = $cart_item['data'];

	if ( $product ) {
		return $product->get_price_html();
	}

	return $old_display;

}
add_filter( 'woocommerce_cart_item_price', 'my_custom_show_sale_price_at_cart', 10, 3 );




/**
 * ----------------------------------------------------------------Show savings at the cart------------------------------------.
 */
function my_custom_buy_now_save_x_cart() {

	$savings = 0;

	foreach ( WC()->cart->get_cart() as $key => $cart_item ) {
		/** @var WC_Product $product */
		$product = $cart_item['data'];

		if ( $product->is_on_sale() ) {
			$savings += ( $product->get_regular_price() - $product->get_sale_price() ) * $cart_item['quantity'];
		}
	}

	if ( ! empty( $savings ) ) {
		?><tr class="order-savings">
			<th><?php _e( 'سود شما از این خرید' ); ?></th>
			<td data-title="<?php _e( 'Your savings' ); ?>"><?php echo sprintf( __( ' %s' ), wc_price( $savings ) ); ?></td>
		</tr><?php
	}

}
add_action( 'woocommerce_cart_totals_before_order_total', 'my_custom_buy_now_save_x_cart' );



/** ---------------------------------------------Disable Ajax Call from WooCommerce------------------------------------ */




/** ---------------------------------Disable Ajax Call from WooCommerce on front page and posts--------------------------*/

add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_cart_fragments', 12);

function dequeue_woocommerce_cart_fragments() {

if (is_front_page() || is_single() ) wp_dequeue_script('wc-cart-fragments');

}






?>