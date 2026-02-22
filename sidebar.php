<?php
/**
 * The sidebar containing the main widget area
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

if (!is_active_sidebar('blog-sidebar')) {
    return;
}
?>

<aside id="secondary" class="sidebar">
    <?php dynamic_sidebar('blog-sidebar'); ?>
</aside>
