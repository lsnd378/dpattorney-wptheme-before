<?php
/**
 * The template for displaying single team member
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

while (have_posts()) : the_post();

// Get team member meta
$role = get_post_meta(get_the_ID(), '_team_role', true);
$email = get_post_meta(get_the_ID(), '_team_email', true);
$phone = get_post_meta(get_the_ID(), '_team_phone', true);
$linkedin = get_post_meta(get_the_ID(), '_team_linkedin', true);
$education = dpattorney_parse_meta_array(get_post_meta(get_the_ID(), '_team_education', true));
$experience = dpattorney_parse_meta_array(get_post_meta(get_the_ID(), '_team_experience', true));
$languages = dpattorney_parse_comma_array(get_post_meta(get_the_ID(), '_team_languages', true));
$awards = dpattorney_parse_meta_array(get_post_meta(get_the_ID(), '_team_awards', true));
$expertise = dpattorney_parse_comma_array(get_post_meta(get_the_ID(), '_team_expertise', true));

// Get team type
$team_types = get_the_terms(get_the_ID(), 'team_type');
$team_type = !empty($team_types) && !is_wp_error($team_types) ? $team_types[0] : null;
$team_type_slug = $team_type ? $team_type->slug : 'partner';
$team_type_name = $team_type ? $team_type->name : __('Partner', 'dpattorney');

// Get related team members
$related_members = new WP_Query(array(
    'post_type' => 'team_member',
    'posts_per_page' => 3,
    'post__not_in' => array(get_the_ID()),
    'tax_query' => array(
        array(
            'taxonomy' => 'team_type',
            'field' => 'slug',
            'terms' => $team_type_slug,
        ),
    ),
));
?>

<main id="primary" class="main-content">
    
    <!-- Breadcrumb -->
    <div class="team-detail-header">
        <div class="container">
            <a href="<?php echo esc_url(get_post_type_archive_link('team_member')); ?>" class="team-detail-breadcrumb">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                <?php 
                printf(
                    __('Kembali ke %s', 'dpattorney'),
                    esc_html($team_type_name)
                ); 
                ?>
            </a>
        </div>
    </div>
    
    <!-- Profile Header -->
    <section class="team-detail-profile">
        <div class="container">
            <div class="team-detail-grid">
                <!-- Image -->
                <div class="reveal-left">
                    <div class="team-detail-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('team-large', array('alt' => get_the_title())); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(DPATTORNEY_URI . '/assets/images/placeholder-person.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Info -->
                <div class="reveal-right">
                    <div style="margin-bottom: 2rem;">
                        <h1 class="team-detail-name"><?php the_title(); ?></h1>
                        <p class="team-detail-role"><?php echo esc_html($role); ?></p>
                        
                        <?php if (!empty($expertise)) : ?>
                            <div class="team-detail-expertise">
                                <?php foreach ($expertise as $exp) : ?>
                                    <span class="team-detail-tag"><?php echo esc_html($exp); ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div class="team-detail-actions">
                        <?php if ($linkedin) : ?>
                            <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                                LinkedIn
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($email) : ?>
                            <a href="mailto:<?php echo esc_attr($email); ?>" class="btn btn-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                <?php _e('Email', 'dpattorney'); ?>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($phone) : ?>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="btn btn-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <?php _e('Telepon', 'dpattorney'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    
                    <div class="prose prose-invert" style="max-width: none;">
                        <h3 style="font-size: 1.25rem; font-weight: 600; color: #fff; margin-bottom: 1rem;"><?php _e('Tentang', 'dpattorney'); ?></h3>
                        <div style="color: rgba(255,255,255,0.6); line-height: 1.7; font-size: 1.125rem;">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Details Section -->
    <section class="team-detail-section">
        <div class="container">
            <div class="team-detail-grid-3">
                <!-- Education -->
                <?php if (!empty($education)) : ?>
                    <div class="reveal" style="transition-delay: 0.1s;">
                        <div class="team-detail-block-title">
                            <div class="team-detail-block-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                            </div>
                            <h3><?php _e('Pendidikan', 'dpattorney'); ?></h3>
                        </div>
                        <ul class="team-detail-list">
                            <?php foreach ($education as $edu) : ?>
                                <li><?php echo esc_html($edu); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Experience -->
                <?php if (!empty($experience)) : ?>
                    <div class="reveal" style="transition-delay: 0.2s;">
                        <div class="team-detail-block-title">
                            <div class="team-detail-block-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                            </div>
                            <h3><?php _e('Pengalaman', 'dpattorney'); ?></h3>
                        </div>
                        <ul class="team-detail-list">
                            <?php foreach ($experience as $exp) : ?>
                                <li><?php echo esc_html($exp); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Languages & Awards -->
                <div class="reveal" style="transition-delay: 0.3s;">
                    <?php if (!empty($languages)) : ?>
                        <div style="margin-bottom: 2.5rem;">
                            <div class="team-detail-block-title">
                                <div class="team-detail-block-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>
                                </div>
                                <h3><?php _e('Bahasa', 'dpattorney'); ?></h3>
                            </div>
                            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
                                <?php foreach ($languages as $lang) : ?>
                                    <span style="padding: 0.25rem 0.75rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 9999px; font-size: 0.875rem; color: rgba(255,255,255,0.6);"><?php echo esc_html($lang); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($awards)) : ?>
                        <div>
                            <div class="team-detail-block-title">
                                <div class="team-detail-block-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
                                </div>
                                <h3><?php _e('Penghargaan', 'dpattorney'); ?></h3>
                            </div>
                            <ul class="team-detail-list">
                                <?php foreach ($awards as $award) : ?>
                                    <li style="font-size: 0.875rem;"><?php echo esc_html($award); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Related Members -->
    <?php if ($related_members->have_posts()) : ?>
        <section class="related-members">
            <div class="container">
                <h3 class="related-members-title">
                    <?php 
                    printf(
                        __('%s Lainnya', 'dpattorney'),
                        esc_html($team_type_name)
                    ); 
                    ?>
                </h3>
                
                <div class="related-members-grid reveal-children">
                    <?php while ($related_members->have_posts()) : $related_members->the_post(); 
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
    
</main>

<?php
endwhile;
get_footer();
