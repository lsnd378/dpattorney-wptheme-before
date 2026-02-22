<?php
/**
 * The template for displaying single practice area
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

while (have_posts()) : the_post();

$icon = get_post_meta(get_the_ID(), '_practice_icon', true);
$tags = dpattorney_parse_comma_array(get_post_meta(get_the_ID(), '_practice_tags', true));

// Get related team members
$related_lawyers = new WP_Query(array(
    'post_type' => 'team_member',
    'posts_per_page' => 4,
    'meta_query' => array(
        array(
            'key' => '_team_expertise',
            'value' => get_the_title(),
            'compare' => 'LIKE',
        ),
    ),
));
?>

<main id="primary" class="main-content">
    
    <!-- Page Header -->
    <div class="team-detail-header">
        <div class="container">
            <a href="<?php echo esc_url(get_post_type_archive_link('practice_area')); ?>" class="team-detail-breadcrumb">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                <?php _e('Area Praktik', 'dpattorney'); ?>
            </a>
        </div>
    </div>
    
    <!-- Practice Area Content -->
    <section class="section" style="padding-top: 3rem;">
        <div class="container">
            <div class="reveal" style="max-width: 900px; margin: 0 auto;">
                <!-- Icon -->
                <div class="practice-icon" style="margin-bottom: 2rem;">
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
                
                <h1 style="font-size: 3rem; font-weight: 700; color: #fff; margin-bottom: 1.5rem;"><?php the_title(); ?></h1>
                
                <?php if (!empty($tags)) : ?>
                    <div class="practice-tags" style="margin-bottom: 2rem;">
                        <?php foreach ($tags as $tag) : ?>
                            <span class="practice-tag"><?php echo esc_html($tag); ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                
                <div style="color: rgba(255,255,255,0.7); line-height: 1.8; font-size: 1.125rem;">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Related Lawyers -->
    <?php if ($related_lawyers->have_posts()) : ?>
        <section class="related-members" style="border-top: 1px solid rgba(255,255,255,0.05);">
            <div class="container">
                <h3 class="related-members-title"><?php _e('Pengacara Terkait', 'dpattorney'); ?></h3>
                
                <div class="related-members-grid reveal-children">
                    <?php while ($related_lawyers->have_posts()) : $related_lawyers->the_post(); 
                        $related_role = get_post_meta(get_the_ID(), '_team_role', true);
                    ?>
                        <a href="<?php the_permalink(); ?>" class="related-member-card">
                            <div class="related-member-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail(array(128, 128), array('alt' => get_the_title())); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(DPATTORNEY_URI . '/assets/images/placeholder-person.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="related-member-info">
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo esc_html($related_role); ?></p>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <!-- CTA Section -->
    <section class="section" style="position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; pointer-events: none;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 600px; height: 600px; background: rgba(249, 115, 22, 0.05); border-radius: 50%; filter: blur(150px);"></div>
        </div>
        
        <div class="container" style="position: relative; z-index: 1;">
            <div class="reveal" style="text-align: center; max-width: 700px; margin: 0 auto;">
                <h2 style="font-size: 2.5rem; font-weight: 700; color: #fff; margin-bottom: 1.5rem;">
                    <?php _e('Butuh Bantuan Hukum?', 'dpattorney'); ?><br>
                    <span class="text-gradient"><?php _e('Hubungi Kami Sekarang', 'dpattorney'); ?></span>
                </h2>
                <p style="color: rgba(255,255,255,0.6); font-size: 1.125rem; margin-bottom: 2.5rem;">
                    <?php _e('Tim ahli kami siap membantu Anda dengan kebutuhan hukum di area praktik ini.', 'dpattorney'); ?>
                </p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('kontak'))); ?>" class="btn btn-primary btn-lg">
                    <?php _e('Konsultasi Gratis', 'dpattorney'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </a>
            </div>
        </div>
    </section>
    
</main>

<?php
endwhile;
get_footer();
