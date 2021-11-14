<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
    <!---Responsive-Support-->
    <link href="<?php bloginfo('template_url'); ?>/style.css" rel="stylesheet" />
    <script src="<?php bloginfo('template_url'); ?>/js/responsive.js"></script>
    <meta charset="utf-8" />

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N4R6JRR');
    </script>
    <!-- End Google Tag Manager -->
    <!--enamad-->
    <meta name="enamad" content="865523" />
    <?php wp_head(); ?>
    <!--known as head section for other addons-->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N4R6JRR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    
    
    <div class="top-offer">
        <a class="offer-text-a" href="<?php echo get_theme_mod('toploganurl'); ?>">
            <div class="top-offer-text"><?php echo get_theme_mod('toplogantext'); ?>
        </div>
        </a>
    </div>


    <div class="site-center">
        <header class="main-header">
            <!--logo-->
            <?php if (get_theme_mod('logo') == null) : ?>
                <a href="<?php bloginfo('url'); ?>" class="logo"><img src="<?php bloginfo('template_url'); ?>/img/main-logo-mini.png" /></a>
            <?php else : ?>
                <a href="<?php bloginfo('url'); ?>" class="logo"><img src="<?php echo get_theme_mod('logo'); ?>" /></a>
            <?php endif; ?>
            <!---mobile menu responsive-->
            <a class="menuicon" id="menuicon" href="javascript:void(0);" onclick="menuclick()"></a>
            <!---script for menu on Responsivable mode-->
            <div class="mobilemenu" id="mobilemenu">
                <!--search and login on mobile view-->
                <div class="menu-container">
                    <form action="<?php bloginfo('url'); ?>" class="header-search-mobile-menu">
                        <input type="text" placeholder="جستجو در محصولات" name="s" />
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>

                    <?php if (is_user_logged_in()) { ?>
                        <div class="mini-cart-logout-menu">
                            <a href="<?php bloginfo('url'); ?>/myaccount/">
                                <?php $user = wp_get_current_user(); ?>
                                <img src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" />
                                پنل‌کاربری
                            </a>
                        </div>
                    <?php } else { ?>
                        <a href="<?php bloginfo('url'); ?>/login/">
                            <div class="mini-cart-signin-menu">ورود</div>
                        </a>
                        <a href="<?php bloginfo('url'); ?>/login/?action=register">
                            <div class="mini-cart-signin-menu">ثبت‌نام</div>
                        </a>
                    <?php } ?>
                </div>
                <?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
            </div>
            <div class="header-contain">
                <!--Search Form ON DesktopView-->
                <form action="<?php bloginfo('url'); ?>" class="header-search">
                    <input type="text" placeholder="جستجو در محصولات" name="s">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>

                <!--mini-cart-->
                    <a class="mini-cart" href="<?php bloginfo('url'); ?>/cart">سبد‌خرید</a>
            

                <!--login button-->
                <?php if (is_user_logged_in()) { ?>
                    <div class="mini-cart-logout">
                        <a href="<?php bloginfo('url'); ?>/myaccount/">
                            <?php $user = wp_get_current_user(); ?>
                            <img src="<?php echo esc_url(get_avatar_url($user->ID)); ?>" />
                            پنل‌کاربری
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="mini-cart-signin"><a href="<?php bloginfo('url'); ?>/login/">ورود</a> | <a href="<?php bloginfo('url'); ?>/login/?action=register">ثبت‌نام</a></div>
                <?php } ?>

                <!--main top menu-->
                <div class="top-menu">
                    <?php wp_nav_menu(array('theme_location' => 'top-menu')); ?>
                </div>
            </div>
        </header>
    </div>

    <?php
    if (function_exists('yoast_breadcrumb') && !is_home()) {
        yoast_breadcrumb('<div class="site-center"><p id="breadcrumbs">', '</p></div>');
    }
    ?>