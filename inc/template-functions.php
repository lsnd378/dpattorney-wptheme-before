<?php
/**
 * Custom template functions for this theme
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get page ID by slug
 *
 * @param string $slug Page slug
 * @return int|null Page ID or null if not found
 */
function dpattorney_get_page_id_by_slug($slug) {
    $page = get_page_by_path($slug);
    return $page ? $page->ID : null;
}

/**
 * Check if current page is a team member page
 *
 * @return bool
 */
function dpattorney_is_team_page() {
    return is_post_type_archive('team_member') || is_singular('team_member') || is_tax('team_type');
}

/**
 * Check if current page is a practice area page
 *
 * @return bool
 */
function dpattorney_is_practice_page() {
    return is_post_type_archive('practice_area') || is_singular('practice_area') || is_tax('practice_category');
}

/**
 * Get current team type
 *
 * @return string
 */
function dpattorney_get_current_team_type() {
    if (is_tax('team_type')) {
        $term = get_queried_object();
        return $term->slug;
    }
    
    if (is_singular('team_member')) {
        $terms = get_the_terms(get_the_ID(), 'team_type');
        if (!empty($terms) && !is_wp_error($terms)) {
            return $terms[0]->slug;
        }
    }
    
    return 'partner';
}

/**
 * Get team type name
 *
 * @param string $slug Team type slug
 * @return string
 */
function dpattorney_get_team_type_name($slug) {
    $term = get_term_by('slug', $slug, 'team_type');
    return $term ? $term->name : __('Partner', 'dpattorney');
}

/**
 * Format phone number for tel: link
 *
 * @param string $phone Phone number
 * @return string
 */
function dpattorney_format_phone($phone) {
    return preg_replace('/[^0-9+]/', '', $phone);
}

/**
 * Get social icon SVG
 *
 * @param string $platform Social platform name
 * @return string SVG markup
 */
function dpattorney_get_social_icon($platform) {
    $icons = array(
        'linkedin' => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/>',
        'twitter' => '<path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/>',
        'facebook' => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>',
        'instagram' => '<rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>',
    );
    
    return isset($icons[$platform]) ? $icons[$platform] : '';
}

/**
 * Get Lucide icon SVG
 *
 * @param string $icon Icon name
 * @return string SVG markup
 */
function dpattorney_get_lucide_icon($icon) {
    $icons = array(
        'building-2' => '<path d="M10 12h4"/><path d="M10 8h4"/><path d="M6 20V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v16"/><path d="M2 20h20"/>',
        'scale' => '<path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/>',
        'zap' => '<polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>',
        'bitcoin' => '<path d="M11.767 19.089c4.924.868 6.14-6.025 1.216-6.894m-1.216 6.894L9.13 19.38m2.637-7.048a2.5 2.5 0 1 1-3.182-3.829m3.182 3.829 1.414-1.414"/><path d="M11.25 4.25v-1.5"/><path d="M14.75 4.25v-1.5"/><circle cx="12" cy="12" r="10"/>',
        'landmark' => '<path d="M3 21h18"/><path d="M5 21V7l8-4 8 4v14"/><path d="M8 21v-5a2 2 0 0 1 4 0v5"/>',
        'trending-up' => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        'users' => '<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/>',
        'calculator' => '<rect width="16" height="20" x="4" y="2" rx="2"/><line x1="8" x2="16" y1="6" y2="6"/><line x1="16" x2="16" y1="14" y2="18"/><path d="M16 10h.01"/><path d="M12 10h.01"/><path d="M8 10h.01"/><path d="M12 14h.01"/><path d="M8 14h.01"/><path d="M12 18h.01"/><path d="M8 18h.01"/>',
        'cpu' => '<rect width="16" height="16" x="4" y="4" rx="2"/><rect width="6" height="6" x="9" y="9"/><path d="M15 2v2"/><path d="M15 20v2"/><path d="M2 15h2"/><path d="M2 9h2"/><path d="M20 15h2"/><path d="M20 9h2"/><path d="M9 2v2"/><path d="M9 20v2"/>',
        'lightbulb' => '<path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/>',
        'home' => '<path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8"/><path d="M3 10a2 2 0 0 1 .709-1.528l7-6a2 2 0 0 1 2.582 0l7 6A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>',
        'arrow-right' => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'arrow-left' => '<path d="m12 19-7-7 7-7"/><path d="M19 12H5"/>',
        'arrow-up-right' => '<path d="M7 7h10v10"/><path d="M7 17 17 7"/>',
        'mail' => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'phone' => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'map-pin' => '<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/>',
        'chevron-down' => '<path d="m6 9 6 6 6-6"/>',
        'sparkles' => '<path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>',
        'graduation-cap' => '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/>',
        'briefcase' => '<rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        'globe' => '<circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/>',
        'award' => '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/>',
    );
    
    return isset($icons[$icon]) ? $icons[$icon] : '';
}

/**
 * Render Lucide icon
 *
 * @param string $icon Icon name
 * @param int $width Icon width
 * @param int $height Icon height
 * @param string $class Additional CSS classes
 */
function dpattorney_icon($icon, $width = 24, $height = 24, $class = '') {
    $svg = dpattorney_get_lucide_icon($icon);
    
    if (empty($svg)) {
        return;
    }
    
    printf(
        '<svg xmlns="http://www.w3.org/2000/svg" width="%d" height="%d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="%s">%s</svg>',
        esc_attr($width),
        esc_attr($height),
        esc_attr($class),
        $svg
    );
}

/**
 * Get breadcrumb items
 *
 * @return array
 */
function dpattorney_get_breadcrumbs() {
    $breadcrumbs = array(
        array(
            'title' => __('Beranda', 'dpattorney'),
            'url' => home_url('/'),
        ),
    );
    
    if (is_home()) {
        $breadcrumbs[] = array(
            'title' => __('Blog', 'dpattorney'),
            'url' => '',
        );
    } elseif (is_single()) {
        $post_type = get_post_type();
        
        if ($post_type === 'post') {
            $breadcrumbs[] = array(
                'title' => __('Blog', 'dpattorney'),
                'url' => get_permalink(get_option('page_for_posts')),
            );
        } elseif ($post_type === 'team_member') {
            $breadcrumbs[] = array(
                'title' => __('Tim', 'dpattorney'),
                'url' => get_post_type_archive_link('team_member'),
            );
        } elseif ($post_type === 'practice_area') {
            $breadcrumbs[] = array(
                'title' => __('Area Praktik', 'dpattorney'),
                'url' => get_post_type_archive_link('practice_area'),
            );
        } elseif ($post_type === 'insight') {
            $breadcrumbs[] = array(
                'title' => __('Wawasan', 'dpattorney'),
                'url' => get_post_type_archive_link('insight'),
            );
        }
        
        $breadcrumbs[] = array(
            'title' => get_the_title(),
            'url' => '',
        );
    } elseif (is_page()) {
        $breadcrumbs[] = array(
            'title' => get_the_title(),
            'url' => '',
        );
    } elseif (is_archive()) {
        $breadcrumbs[] = array(
            'title' => get_the_archive_title(),
            'url' => '',
        );
    } elseif (is_search()) {
        $breadcrumbs[] = array(
            'title' => sprintf(__('Hasil Pencarian: %s', 'dpattorney'), get_search_query()),
            'url' => '',
        );
    } elseif (is_404()) {
        $breadcrumbs[] = array(
            'title' => __('Halaman Tidak Ditemukan', 'dpattorney'),
            'url' => '',
        );
    }
    
    return $breadcrumbs;
}

/**
 * Render breadcrumbs
 */
function dpattorney_breadcrumbs() {
    $breadcrumbs = dpattorney_get_breadcrumbs();
    
    if (count($breadcrumbs) <= 1) {
        return;
    }
    ?>
    <nav class="breadcrumbs" aria-label="<?php _e('Breadcrumb', 'dpattorney'); ?>">
        <?php foreach ($breadcrumbs as $index => $crumb) : ?>
            <?php if ($index > 0) : ?>
                <span class="breadcrumb-separator">/</span>
            <?php endif; ?>
            
            <?php if (!empty($crumb['url']) && $index < count($breadcrumbs) - 1) : ?>
                <a href="<?php echo esc_url($crumb['url']); ?>"><?php echo esc_html($crumb['title']); ?></a>
            <?php else : ?>
                <span class="current"><?php echo esc_html($crumb['title']); ?></span>
            <?php endif; ?>
        <?php endforeach; ?>
    </nav>
    <?php
}

/**
 * Add custom body classes
 *
 * @param array $classes Body classes
 * @return array
 */
function dpattorney_body_classes_filter($classes) {
    // Add post type class
    if (is_singular()) {
        $classes[] = 'single-' . get_post_type();
    }
    
    // Add archive class
    if (is_post_type_archive()) {
        $classes[] = 'archive-' . get_post_type();
    }
    
    // Add taxonomy class
    if (is_tax()) {
        $term = get_queried_object();
        $classes[] = 'tax-' . $term->taxonomy;
        $classes[] = 'term-' . $term->slug;
    }
    
    return $classes;
}
add_filter('body_class', 'dpattorney_body_classes_filter');

/**
 * Custom excerpt more
 *
 * @param string $more Default more string
 * @return string
 */
function dpattorney_excerpt_more_filter($more) {
    return '...';
}
add_filter('excerpt_more', 'dpattorney_excerpt_more_filter');

/**
 * Custom excerpt length
 *
 * @param int $length Default length
 * @return int
 */
function dpattorney_excerpt_length_filter($length) {
    return 30;
}
add_filter('excerpt_length', 'dpattorney_excerpt_length_filter', 999);
