<?php
/**
 * The template for displaying job opening archive pages
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

$jobs = dpattorney_get_job_openings(-1);
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
    
    <!-- Jobs Section -->
    <section class="section" style="padding-top: 3rem;">
        <div class="container">
            <div class="team-header reveal">
                <span class="team-label"><?php _e('Karir', 'dpattorney'); ?></span>
                <h1 class="team-title"><?php _e('Bergabung dengan Kami', 'dpattorney'); ?></h1>
                <p class="team-description">
                    <?php _e('Jadilah bagian dari tim profesional hukum terkemuka di Asia.', 'dpattorney'); ?>
                </p>
            </div>
            
            <?php if ($jobs->have_posts()) : ?>
                <div style="display: grid; gap: 1.5rem; margin-top: 4rem;" class="reveal-children">
                    <?php while ($jobs->have_posts()) : $jobs->the_post(); 
                        $location = get_post_meta(get_the_ID(), '_job_location', true);
                        $type = get_post_meta(get_the_ID(), '_job_type', true);
                    ?>
                        <a href="<?php the_permalink(); ?>" style="display: block; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 1rem; padding: 2rem; transition: all 0.3s ease;">
                            <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 1rem;">
                                <div>
                                    <h3 style="font-size: 1.25rem; font-weight: 600; color: #fff; margin-bottom: 0.5rem;"><?php the_title(); ?></h3>
                                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                                        <?php if ($location) : ?>
                                            <span style="display: flex; align-items: center; gap: 0.25rem; font-size: 0.875rem; color: rgba(255,255,255,0.5);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                                <?php echo esc_html($location); ?>
                                            </span>
                                        <?php endif; ?>
                                        <?php if ($type) : ?>
                                            <span style="display: flex; align-items: center; gap: 0.25rem; font-size: 0.875rem; color: rgba(255,255,255,0.5);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                                <?php echo esc_html($type); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #f97316; flex-shrink: 0;"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </div>
                        </a>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <div class="no-results">
                    <p><?php _e('Saat ini tidak ada lowongan pekerjaan.', 'dpattorney'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
</main>

<?php
get_footer();
