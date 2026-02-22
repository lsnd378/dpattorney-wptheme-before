<?php
/**
 * Template Name: About Page
 *
 * The template for displaying the about page
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

$partners = dpattorney_get_team_members('partner', 4);
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
    
    <!-- About Section -->
    <section class="about-section" style="padding-top: 3rem;">
        <div class="container">
            <div class="about-grid">
                <div class="reveal-left">
                    <div class="about-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                        <?php _e('Tentang Kami', 'dpattorney'); ?>
                    </div>
                    
                    <h2 class="about-title">
                        <?php _e('Mendefinisikan Ulang', 'dpattorney'); ?><br>
                        <?php _e('Infrastruktur Hukum', 'dpattorney'); ?><br>
                        <span class="text-gradient"><?php _e('untuk Era Digital', 'dpattorney'); ?></span>
                    </h2>
                    
                    <?php while (have_posts()) : the_post(); ?>
                        <div style="color: rgba(255,255,255,0.7); line-height: 1.8; font-size: 1.125rem;">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
                
                <div class="about-image-wrapper reveal-right">
                    <div class="about-image-glow"></div>
                    <div class="about-image">
                        <img src="<?php echo esc_url(DPATTORNEY_URI . '/assets/images/about-office.jpg'); ?>" alt="<?php _e('Dion Pongkor Office', 'dpattorney'); ?>">
                        <div class="about-image-overlay"></div>
                    </div>
                    <div class="about-stat-card">
                        <div class="about-stat-value">98%</div>
                        <div class="about-stat-label"><?php _e('Kepuasan Klien', 'dpattorney'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid reveal-children">
                <div class="stat-item">
                    <div class="stat-value">
                        <span class="counter" data-target="25" data-suffix="+">0</span>
                    </div>
                    <p class="stat-label"><?php _e('Tahun Keunggulan', 'dpattorney'); ?></p>
                </div>
                <div class="stat-item">
                    <div class="stat-value">
                        <span class="counter" data-target="150" data-suffix="+">0</span>
                    </div>
                    <p class="stat-label"><?php _e('Profesional Hukum', 'dpattorney'); ?></p>
                </div>
                <div class="stat-item">
                    <div class="stat-value">
                        <span class="counter" data-target="20" data-suffix="+">0</span>
                    </div>
                    <p class="stat-label"><?php _e('Lokasi Kantor', 'dpattorney'); ?></p>
                </div>
                <div class="stat-item">
                    <div class="stat-value">
                        <span class="counter" data-target="500" data-suffix="+">0</span>
                    </div>
                    <p class="stat-label"><?php _e('Klien Korporat', 'dpattorney'); ?></p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Values Section -->
    <section class="section" style="background: #050505;">
        <div class="container">
            <div class="team-header reveal">
                <span class="team-label"><?php _e('Nilai-Nilai Kami', 'dpattorney'); ?></span>
                <h2 class="team-title"><?php _e('Apa yang Kami Junjung', 'dpattorney'); ?></h2>
            </div>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; margin-top: 4rem;" class="reveal-children">
                <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 1rem; padding: 2rem;">
                    <div style="width: 56px; height: 56px; background: rgba(249, 115, 22, 0.1); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #f97316;"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #fff; margin-bottom: 1rem;"><?php _e('Keunggulan', 'dpattorney'); ?></h3>
                    <p style="color: rgba(255,255,255,0.6); line-height: 1.6;"><?php _e('Kami berkomitmen untuk memberikan layanan hukum berkualitas tertinggi kepada setiap klien.', 'dpattorney'); ?></p>
                </div>
                
                <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 1rem; padding: 2rem;">
                    <div style="width: 56px; height: 56px; background: rgba(249, 115, 22, 0.1); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #f97316;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #fff; margin-bottom: 1rem;"><?php _e('Integritas', 'dpattorney'); ?></h3>
                    <p style="color: rgba(255,255,255,0.6); line-height: 1.6;"><?php _e('Kami menjunjung tinggi standar etika tertinggi dalam setiap aspek pekerjaan kami.', 'dpattorney'); ?></p>
                </div>
                
                <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 1rem; padding: 2rem;">
                    <div style="width: 56px; height: 56px; background: rgba(249, 115, 22, 0.1); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #f97316;"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #fff; margin-bottom: 1rem;"><?php _e('Kolaborasi', 'dpattorney'); ?></h3>
                    <p style="color: rgba(255,255,255,0.6); line-height: 1.6;"><?php _e('Kami bekerja sama sebagai tim untuk memberikan solusi terbaik bagi klien kami.', 'dpattorney'); ?></p>
                </div>
                
                <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 1rem; padding: 2rem;">
                    <div style="width: 56px; height: 56px; background: rgba(249, 115, 22, 0.1); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #f97316;"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                    </div>
                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #fff; margin-bottom: 1rem;"><?php _e('Inovasi', 'dpattorney'); ?></h3>
                    <p style="color: rgba(255,255,255,0.6); line-height: 1.6;"><?php _e('Kami terus berinovasi untuk memberikan solusi hukum yang modern dan efektif.', 'dpattorney'); ?></p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Leadership Section -->
    <?php if ($partners->have_posts()) : ?>
        <section class="team-section">
            <div class="container">
                <div class="team-header reveal">
                    <span class="team-label"><?php _e('Kepemimpinan', 'dpattorney'); ?></span>
                    <h2 class="team-title"><?php _e('Partner Kami', 'dpattorney'); ?></h2>
                </div>
                
                <div class="team-grid reveal-children" style="display: grid;">
                    <?php while ($partners->have_posts()) : $partners->the_post(); 
                        $role = get_post_meta(get_the_ID(), '_team_role', true);
                        $expertise = dpattorney_parse_comma_array(get_post_meta(get_the_ID(), '_team_expertise', true));
                    ?>
                        <a href="<?php the_permalink(); ?>" class="team-card">
                            <div class="team-card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('team-thumbnail', array('alt' => get_the_title())); ?>
                                <?php else : ?>
                                    <img src="<?php echo esc_url(DPATTORNEY_URI . '/assets/images/placeholder-person.jpg'); ?>" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <div class="team-card-overlay"></div>
                            </div>
                            <div class="team-card-info">
                                <h3 class="team-card-name"><?php the_title(); ?></h3>
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
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
</main>

<?php
get_footer();
