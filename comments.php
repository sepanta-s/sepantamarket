<?php

/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if (post_password_required())
    return;
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <span class="comment-counter-text">
            <?php
            printf(
                _nx('یک دیدگاه برای "%2$s ارسال شده', '%1$s دیدگاه برای این پست %2" ارسال شده', get_comments_number(), 'comments title', 'twentythirteen'),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </span>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 74,
            ));
            ?>
        </ol><!-- .comment-list -->


        <nav class="navigation comment-navigation" role="navigation">

            <div class="nav-previous"><?php previous_comments_link(__('&amp;larr; Older Comments', 'twentythirteen')); ?></div>
            <div class="nav-next"><?php next_comments_link(__('Newer Comments &amp;rarr;', 'twentythirteen')); ?></div>
        </nav><!-- .comment-navigation -->


    <?php endif; // have_comments() 
    ?>

    <?php comment_form(); ?>

</div><!-- #comments -->