<?php
/**
 * The template for displaying practice category taxonomy pages
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

$current_term = get_queried_object();
$practice_areas = new WP_Query(array(
    'post_type' => 'practice_area',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'practice_category',
            'field' => 'slug',
            'terms' => $current_term->slug,
        ),
    ),
));
?>

<main id="primary" class="main-content">
    
    <!-- Page Header -->
    <div class="team-detail-header">
        <div class="container">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="team-detail-breadcrumb">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                <?php _e('Beranda', 'dpattorney'); ?>
            </a>
        </div>
    </div>
    
    <!-- Practice Areas Section -->
    <section class="practice-section" style="padding-top: 3rem;">
        <div class="practice-bg">
            <div class="practice-bg-glow"></div>
        </div>
        
        <div class="container">
            <div class="practice-header">
                <div class="reveal">
                    <span class="practice-label"><?php _e('Keahlian Kami', 'dpattorney'); ?></span>
                    <h1 class="practice-title"><?php echo esc_html($current_term->name); ?></h1>
                    <?php if ($current_term->description) : ?>
                        <p class="practice-description">
                            <?php echo esc_html($current_term->description); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
            
            <?php if ($practice_areas->have_posts()) : ?>
                <div class="practice-grid reveal-children">
                    <?php while ($practice_areas->have_posts()) : $practice_areas->the_post(); 
                        $icon = get_post_meta(get_the_ID(), '_practice_icon', true);
                        $tags = dpattorney_parse_comma_array(get_post_meta(get_the_ID(), '_practice_tags', true));
                    ?>
                        <a href="<?php the_permalink(); ?>" class="practice-card">
                            <div class="practice-card-content">
                                <div class="practice-icon">
                                    <?php if ($icon) : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <?php 
                                            $icon_paths = array(
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
                                            );
                                            echo $icon_paths[$icon] ?? $icon_paths['scale'];
                                            ?>
                                        </svg>
                                    <?php else : ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m16 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="m2 16 3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/><path d="M7 21h10"/><path d="M12 3v18"/><path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/></svg>
                                    <?php endif; ?>
                                </div>
                                
                                <h3 class="practice-card-title">
                                    <?php the_title(); ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 7h10v10"/><path d="M7 17 17 7"/></svg>
                                </h3>
                                
                                <p class="practice-card-text">
                                    <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
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
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <div class="no-results">
                    <p><?php _e('Tidak ada area praktik ditemukan.', 'dpattorney'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
</main>

<?php
get_footer();
