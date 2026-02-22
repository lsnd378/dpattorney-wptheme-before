<?php
/**
 * The template for displaying comments
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

// If the current post is protected by a password and
// the visitor has not yet entered the password we will
// return early without loading the comments.
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            if ('1' === $comment_count) {
                printf(esc_html__('One thought on &ldquo;%1$s&rdquo;', 'dpattorney'), '<span>' . get_the_title() . '</span>');
            } else {
                printf(esc_html__('%1$s thoughts on &ldquo;%2$s&rdquo;', 'dpattorney'), number_format_i18n($comment_count), '<span>' . get_the_title() . '</span>');
            }
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style' => 'ol',
                'short_ping' => true,
                'avatar_size' => 48,
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

        <?php if (!comments_open()) : ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'dpattorney'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply' => __('Leave a Reply', 'dpattorney'),
        'title_reply_to' => __('Leave a Reply to %s', 'dpattorney'),
        'cancel_reply_link' => __('Cancel Reply', 'dpattorney'),
        'label_submit' => __('Post Comment', 'dpattorney'),
        'class_submit' => 'submit btn btn-primary',
    ));
    ?>

</div>
