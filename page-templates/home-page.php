<?php
/**
 * Template Name: Home Page
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

// Get theme mods
$hero_badge = get_theme_mod('dpattorney_hero_badge', __('Firma Hukum Terkemuka di Asia', 'dpattorney'));
$hero_title = get_theme_mod('dpattorney_hero_title', __('Pengacara yang mengerti Asia.', 'dpattorney'));
$hero_description = get_theme_mod('dpattorney_hero_description', __('Menavigasi kompleksitas dengan presisi digital. Kami menggabungkan keahlian regional yang mendalam dengan pendekatan futuristik terhadap nasihat hukum.', 'dpattorney'));

// Get team members
$partners = dpattorney_get_team_members('partner', 4);
$practice_areas = dpattorney_get_practice_areas(6);
$insights = dpattorney_get_insights(3);
?>

<main id="primary" class="main-content">
    
    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-bg">
            <div class="hero-orb hero-orb-1"></div>
            <div class="hero-orb hero-orb-2"></div>
            <div class="hero-grid"></div>
        </div>
        
        <div class="hero-content">
            <div class="hero-badge">
                <?php echo esc_html($hero_badge); ?>
            </div>
            
            <h1 class="hero-title">
                <?php 
                $title_parts = explode('.', $hero_title);
                echo esc_html($title_parts[0]); 
                if (count($title_parts) > 1) {
                    echo '<br><span class="text-gradient">' . esc_html($title_parts[1]) . '.</span>';
                }
                ?>
            </h1>
            
            <p class="hero-description">
                <?php echo esc_html($hero_description); ?>
            </p>
            
            <div class="hero-buttons">
                <a href="<?php echo esc_url(get_post_type_archive_link('practice_area')); ?>" class="btn btn-primary btn-lg">
                    <?php _e('Area Praktik Kami', 'dpattorney'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>
                <a href="<?php echo esc_url(get_post_type_archive_link('team_member')); ?>" class="btn btn-outline btn-lg">
                    <?php _e('Kenali Tim Kami', 'dpattorney'); ?>
                </a>
            </div>
        </div>
        
        <div class="hero-scroll">
            <span><?php _e('Gulir untuk menjelajah', 'dpattorney'); ?></span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section class="stats-section" id="stats">
        <div class="container">
            <div class="stats-grid">
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
    
    <!-- About Section -->
    <section class="about-section" id="about">
        <div class="container">
            <div class="about-grid">
                <div>
                    <div class="about-label">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/></svg>
                        <?php _e('Tentang Dion Pongkor & Partners', 'dpattorney'); ?>
                    </div>
                    
                    <h2 class="about-title">
                        <?php _e('Mendefinisikan Ulang', 'dpattorney'); ?><br>
                        <?php _e('Infrastruktur Hukum', 'dpattorney'); ?><br>
                        <span class="text-gradient"><?php _e('untuk Era Digital', 'dpattorney'); ?></span>
                    </h2>
                    
                    <p class="about-text">
                        <?php _e('Hukum tradisional sudah usang. Kami adalah pelopor. Di Dion Pongkor & Partners, kami melihat kerangka hukum bukan sebagai kendala, melainkan sebagai kode dasar bisnis modern.', 'dpattorney'); ?>
                    </p>
                    
                    <p class="about-text">
                        <?php _e('Dengan mengintegrasikan kecerdasan data dengan nasihat kelas atas, kami memberikan kejelasan dalam lanskap regulasi yang semakin kompleks di seluruh Asia dan beyond.', 'dpattorney'); ?>
                    </p>
                    
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('tentang-kami'))); ?>" class="btn btn-outline-orange btn-lg" style="margin-top: 2rem;">
                        <?php _e('Pelajari Lebih Lanjut', 'dpattorney'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
                
                <div class="about-image-wrapper">
                    <div class="about-image-glow"></div>
                    <div class="about-image">
                        <img src="<?php echo esc_url(DPATTORNEY_URI . '/assets/images/about-office.jpg'); ?>" alt="<?php _e('Dion Pongkor Office', 'dpattorney'); ?>">
                    </div>
                    <div class="about-stat-card">
                        <div class="about-stat-value">98%</div>
                        <div class="about-stat-label"><?php _e('Kepuasan Klien', 'dpattorney'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Practice Areas Section -->
    <section class="practice-section" id="expertise">
        <div class="practice-bg">
            <div class="practice-bg-glow"></div>
        </div>
        
        <div class="container">
            <div class="practice-header">
                <div>
                    <span class="practice-label"><?php _e('Keahlian Kami', 'dpattorney'); ?></span>
                    <h2 class="practice-title"><?php _e('Area Praktik', 'dpattorney'); ?></h2>
                </div>
                <p class="practice-description">
                    <?php _e('Layanan hukum yang disesuaikan dengan tantangan unik pasar Asia.', 'dpattorney'); ?>
                </p>
            </div>
            
            <?php if ($practice_areas->have_posts()) : ?>
                <div class="practice-grid">
                    <?php while ($practice_areas->have_posts()) : $practice_areas->the_post(); 
                        $icon = get_post_meta(get_the_ID(), '_practice_icon', true);
                        $tags = dpattorney_parse_comma_array(get_post_meta(get_the_ID(), '_practice_tags', true));
                    ?>
                        <a href="<?php the_permalink(); ?>" class="practice-card">
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
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Team Section -->
    <section class="team-section" id="people">
        <div class="container">
            <div class="team-header">
                <span class="team-label"><?php _e('Tim Kami', 'dpattorney'); ?></span>
                <h2 class="team-title"><?php _e('Partner Kami', 'dpattorney'); ?></h2>
                <p class="team-description">
                    <?php _e('Tim profesional hukum kami yang berpengalaman siap membantu Anda menavigasi kompleksitas hukum di Asia.', 'dpattorney'); ?>
                </p>
            </div>
            
            <?php if ($partners->have_posts()) : ?>
                <div class="team-grid">
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
                
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="<?php echo esc_url(get_post_type_archive_link('team_member')); ?>" class="btn btn-outline-orange btn-lg">
                        <?php _e('Lihat Semua Tim', 'dpattorney'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- Testimonials Section -->
    <section class="testimonial-section" id="testimonials">
        <div class="testimonial-bg">
            <div class="testimonial-bg-glow"></div>
        </div>
        
        <div class="container">
            <div class="testimonial-header">
                <span class="team-label"><?php _e('Testimoni', 'dpattorney'); ?></span>
                <h2 class="team-title"><?php _e('Apa Kata Klien Kami', 'dpattorney'); ?></h2>
            </div>
            
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-text">
                        <?php _e('Dion Pongkor & Partners memberikan layanan hukum yang luar biasa. Keahlian mereka dalam hukum bisnis internasional sangat membantu perusahaan kami berkembang di pasar Asia.', 'dpattorney'); ?>
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-author-image">
                            <img src="<?php echo esc_url(DPATTORNEY_URI . '/assets/images/testimonial-1.jpg'); ?>" alt="John Smith">
                        </div>
                        <div>
                            <div class="testimonial-author-name">John Smith</div>
                            <div class="testimonial-author-role">CEO, TechVentures Inc.</div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-text">
                        <?php _e('Tim yang sangat profesional dan responsif. Mereka memahami kebutuhan bisnis kami dan memberikan solusi hukum yang praktis dan efektif.', 'dpattorney'); ?>
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-author-image">
                            <img src="<?php echo esc_url(DPATTORNEY_URI . '/assets/images/testimonial-2.jpg'); ?>" alt="Sarah Chen">
                        </div>
                        <div>
                            <div class="testimonial-author-name">Sarah Chen</div>
                            <div class="testimonial-author-role">Director, Global Finance Ltd.</div>
                        </div>
                    </div>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-quote">"</div>
                    <p class="testimonial-text">
                        <?php _e('Kami sangat terkesan dengan kedalaman pengetahuan dan komitmen tim Dion Pongkor. Mereka adalah partner hukum yang dapat diandalkan.', 'dpattorney'); ?>
                    </p>
                    <div class="testimonial-author">
                        <div class="testimonial-author-image">
                            <img src="<?php echo esc_url(DPATTORNEY_URI . '/assets/images/testimonial-3.jpg'); ?>" alt="Michael Wong">
                        </div>
                        <div>
                            <div class="testimonial-author-name">Michael Wong</div>
                            <div class="testimonial-author-role">Founder, Asia Ventures</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Insights Section -->
    <section class="section" style="background: #050505;">
        <div class="container">
            <div class="team-header">
                <span class="team-label"><?php _e('Wawasan', 'dpattorney'); ?></span>
                <h2 class="team-title"><?php _e('Artikel Terbaru', 'dpattorney'); ?></h2>
            </div>
            
            <?php if ($insights->have_posts()) : ?>
                <div class="posts-grid">
                    <?php while ($insights->have_posts()) : $insights->the_post(); ?>
                        <article class="post-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('article-thumbnail'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    <div class="entry-meta">
                                        <span><?php echo get_the_date(); ?></span>
                                    </div>
                                </header>
                                
                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php _e('Baca Selengkapnya', 'dpattorney'); ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                                    </a>
                                </footer>
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                
                <div style="text-align: center; margin-top: 3rem;">
                    <a href="<?php echo esc_url(get_post_type_archive_link('insight')); ?>" class="btn btn-outline btn-lg">
                        <?php _e('Lihat Semua Artikel', 'dpattorney'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
    <!-- CTA Section -->
    <section class="section" style="position: relative; overflow: hidden;">
        <div style="position: absolute; inset: 0; pointer-events: none;">
            <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 600px; height: 600px; background: rgba(249, 115, 22, 0.05); border-radius: 50%; filter: blur(150px);"></div>
        </div>
        
        <div class="container" style="position: relative; z-index: 1;">
            <div style="text-align: center; max-width: 700px; margin: 0 auto;">
                <h2 style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 700; color: #fff; margin-bottom: 1.5rem;">
                    <?php _e('Siap Membantu', 'dpattorney'); ?><br>
                    <span class="text-gradient"><?php _e('Kebutuhan Hukum Anda?', 'dpattorney'); ?></span>
                </h2>
                <p style="color: rgba(255,255,255,0.6); font-size: 1.125rem; margin-bottom: 2.5rem;">
                    <?php _e('Hubungi kami hari ini untuk konsultasi gratis dan temukan bagaimana kami dapat membantu bisnis Anda.', 'dpattorney'); ?>
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center;">
                    <a href="<?php echo esc_url(get_permalink(get_page_by_path('kontak'))); ?>" class="btn btn-primary btn-lg">
                        <?php _e('Hubungi Kami', 'dpattorney'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </a>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('dpattorney_contact_email', 'contact@dpattorney.com')); ?>" class="btn btn-outline btn-lg">
                        <?php _e('Kirim Email', 'dpattorney'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
</main>

<?php
get_footer();
