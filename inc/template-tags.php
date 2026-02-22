<?php
/**
 * Custom template tags for this theme
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('dpattorney_posted_on')) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function dpattorney_posted_on() {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }
        
        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );
        
        printf(
            '<span class="posted-on">%1$s <a href="%2$s" rel="bookmark">%3$s</a></span>',
            __('Posted on', 'dpattorney'),
            esc_url(get_permalink()),
            $time_string
        );
    }
endif;

if (!function_exists('dpattorney_posted_by')) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function dpattorney_posted_by() {
        printf(
            '<span class="byline">%1$s <span class="author vcard"><a class="url fn n" href="%2$s">%3$s</a></span></span>',
            __('by', 'dpattorney'),
            esc_url(get_author_posts_url(get_the_author_meta('ID'))),
            esc_html(get_the_author())
        );
    }
endif;

if (!function_exists('dpattorney_entry_footer')) :
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function dpattorney_entry_footer() {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', 'dpattorney'));
            if ($categories_list) {
                printf('<span class="cat-links">%1$s %2$s</span>', __('Posted in', 'dpattorney'), $categories_list);
            }
            
            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'dpattorney'));
            if ($tags_list) {
                printf('<span class="tags-links">%1$s %2$s</span>', __('Tagged', 'dpattorney'), $tags_list);
            }
        }
        
        if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'dpattorney'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }
        
        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', 'dpattorney'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
endif;

if (!function_exists('dpattorney_post_thumbnail')) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function dpattorney_post_thumbnail($size = 'post-thumbnail') {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }
        
        if (is_singular()) :
            ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail($size); ?>
            </div>
        <?php else : ?>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    $size,
                    array(
                        'alt' => the_title_attribute(
                            array(
                                'echo' => false,
                            )
                        ),
                    )
                );
                ?>
            </a>
        <?php
        endif;
    }
endif;

if (!function_exists('dpattorney_get_team_card')) :
    /**
     * Get team member card HTML
     *
     * @param int $post_id Post ID
     * @return string
     */
    function dpattorney_get_team_card($post_id = null) {
        if (!$post_id) {
            $post_id = get_the_ID();
        }
        
        $role = get_post_meta($post_id, '_team_role', true);
        $expertise = dpattorney_parse_comma_array(get_post_meta($post_id, '_team_expertise', true));
        
        ob_start();
        ?>
        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="team-card">
            <div class="team-card-image">
                <?php if (has_post_thumbnail($post_id)) : ?>
                    <?php echo get_the_post_thumbnail($post_id, 'team-thumbnail', array('alt' => get_the_title($post_id))); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(DPATTORNEY_URI . '/assets/images/placeholder-person.jpg'); ?>" alt="<?php echo esc_attr(get_the_title($post_id)); ?>">
                <?php endif; ?>
                <div class="team-card-overlay"></div>
            </div>
            <div class="team-card-info">
                <h3 class="team-card-name"><?php echo esc_html(get_the_title($post_id)); ?></h3>
                <p class="team-card-role"><?php echo esc_html($role); ?></p>
                <?php if (!empty($expertise)) : ?>
                    <div class="team-card-expertise">
                        <?php foreach (array_slice($expertise, 0, 3) as $exp) : ?>
                            <span class="team-card-tag"><?php echo esc_html($exp); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </a>
        <?php
        return ob_get_clean();
    }
endif;

if (!function_exists('dpattorney_get_practice_card')) :
    /**
     * Get practice area card HTML
     *
     * @param int $post_id Post ID
     * @return string
     */
    function dpattorney_get_practice_card($post_id = null) {
        if (!$post_id) {
            $post_id = get_the_ID();
        }
        
        $icon = get_post_meta($post_id, '_practice_icon', true);
        $tags = dpattorney_parse_comma_array(get_post_meta($post_id, '_practice_tags', true));
        
        ob_start();
        ?>
        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="practice-card">
            <div class="practice-card-content">
                <div class="practice-icon">
                    <?php dpattorney_icon($icon ?: 'scale', 28, 28); ?>
                </div>
                
                <h3 class="practice-card-title">
                    <?php echo esc_html(get_the_title($post_id)); ?>
                    <?php dpattorney_icon('arrow-up-right', 20, 20); ?>
                </h3>
                
                <p class="practice-card-text">
                    <?php echo wp_trim_words(get_the_excerpt($post_id), 20); ?>
                </p>
                
                <?php if (!empty($tags)) : ?>
                    <div class="practice-tags">
                        <?php foreach (array_slice($tags, 0, 3) as $tag) : ?>
                            <span class="practice-tag"><?php echo esc_html($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </a>
        <?php
        return ob_get_clean();
    }
endif;

if (!function_exists('dpattorney_get_post_card')) :
    /**
     * Get post card HTML
     *
     * @param int $post_id Post ID
     * @return string
     */
    function dpattorney_get_post_card($post_id = null) {
        if (!$post_id) {
            $post_id = get_the_ID();
        }
        
        ob_start();
        ?>
        <article class="post-card">
            <?php if (has_post_thumbnail($post_id)) : ?>
                <div class="post-thumbnail">
                    <a href="<?php echo esc_url(get_permalink($post_id)); ?>">
                        <?php echo get_the_post_thumbnail($post_id, 'article-thumbnail'); ?>
                    </a>
                </div>
            <?php endif; ?>
            
            <div class="post-content">
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="<?php echo esc_url(get_permalink($post_id)); ?>" rel="bookmark">
                            <?php echo esc_html(get_the_title($post_id)); ?>
                        </a>
                    </h2>
                    <div class="entry-meta">
                        <span><?php echo get_the_date('', $post_id); ?></span>
                    </div>
                </header>
                
                <div class="entry-summary">
                    <?php echo get_the_excerpt($post_id); ?>
                </div>
                
                <footer class="entry-footer">
                    <a href="<?php echo esc_url(get_permalink($post_id)); ?>" class="read-more">
                        <?php _e('Baca Selengkapnya', 'dpattorney'); ?>
                        <?php dpattorney_icon('arrow-right', 16, 16); ?>
                    </a>
                </footer>
            </div>
        </article>
        <?php
        return ob_get_clean();
    }
endif;

if (!function_exists('dpattorney_pagination')) :
    /**
     * Display pagination
     *
     * @param WP_Query $query Custom query (optional)
     */
    function dpattorney_pagination($query = null) {
        if (!$query) {
            $query = $GLOBALS['wp_query'];
        }
        
        if ($query->max_num_pages <= 1) {
            return;
        }
        
        $big = 999999999;
        $paginate_links = paginate_links(
            array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $query->max_num_pages,
                'prev_text' => __('Previous', 'dpattorney'),
                'next_text' => __('Next', 'dpattorney'),
                'type' => 'list',
            )
        );
        
        if ($paginate_links) {
            echo '<nav class="pagination" aria-label="' . esc_attr__('Pagination', 'dpattorney') . '">';
            echo $paginate_links;
            echo '</nav>';
        }
    }
endif;
