<?php
/**
 * The template for displaying single job opening
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

while (have_posts()) : the_post();

$location = get_post_meta(get_the_ID(), '_job_location', true);
$type = get_post_meta(get_the_ID(), '_job_type', true);
$salary = get_post_meta(get_the_ID(), '_job_salary', true);
$requirements = dpattorney_parse_meta_array(get_post_meta(get_the_ID(), '_job_requirements', true));
$responsibilities = dpattorney_parse_meta_array(get_post_meta(get_the_ID(), '_job_responsibilities', true));
$benefits = dpattorney_parse_meta_array(get_post_meta(get_the_ID(), '_job_benefits', true));
?>

<main id="primary" class="main-content">
    
    <!-- Page Header -->
    <div class="team-detail-header">
        <div class="container">
            <a href="<?php echo esc_url(get_post_type_archive_link('job_opening')); ?>" class="team-detail-breadcrumb">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                <?php _e('Karir', 'dpattorney'); ?>
            </a>
        </div>
    </div>
    
    <!-- Job Content -->
    <section class="section" style="padding-top: 3rem;">
        <div class="container">
            <div style="max-width: 900px; margin: 0 auto;">
                <div class="reveal">
                    <h1 style="font-size: 2.5rem; font-weight: 700; color: #fff; margin-bottom: 1.5rem;"><?php the_title(); ?></h1>
                    
                    <div style="display: flex; gap: 1.5rem; flex-wrap: wrap; margin-bottom: 2rem;">
                        <?php if ($location) : ?>
                            <span style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.6);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                <?php echo esc_html($location); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($type) : ?>
                            <span style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.6);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                <?php echo esc_html($type); ?>
                            </span>
                        <?php endif; ?>
                        <?php if ($salary) : ?>
                            <span style="display: flex; align-items: center; gap: 0.5rem; color: rgba(255,255,255,0.6);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" x2="12" y1="2" y2="22"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                                <?php echo esc_html($salary); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div style="color: rgba(255,255,255,0.7); line-height: 1.8; font-size: 1.125rem; margin-bottom: 3rem;" class="reveal">
                    <?php the_content(); ?>
                </div>
                
                <div style="display: grid; gap: 2rem; margin-bottom: 3rem;" class="reveal-children">
                    <?php if (!empty($requirements)) : ?>
                        <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 1rem; padding: 2rem;">
                            <h3 style="font-size: 1.25rem; font-weight: 600; color: #fff; margin-bottom: 1rem;"><?php _e('Persyaratan', 'dpattorney'); ?></h3>
                            <ul style="list-style: disc; padding-left: 1.5rem; color: rgba(255,255,255,0.6);">
                                <?php foreach ($requirements as $req) : ?>
                                    <li style="margin-bottom: 0.5rem;"><?php echo esc_html($req); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($responsibilities)) : ?>
                        <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 1rem; padding: 2rem;">
                            <h3 style="font-size: 1.25rem; font-weight: 600; color: #fff; margin-bottom: 1rem;"><?php _e('Tanggung Jawab', 'dpattorney'); ?></h3>
                            <ul style="list-style: disc; padding-left: 1.5rem; color: rgba(255,255,255,0.6);">
                                <?php foreach ($responsibilities as $resp) : ?>
                                    <li style="margin-bottom: 0.5rem;"><?php echo esc_html($resp); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($benefits)) : ?>
                        <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 1rem; padding: 2rem;">
                            <h3 style="font-size: 1.25rem; font-weight: 600; color: #fff; margin-bottom: 1rem;"><?php _e('Benefit', 'dpattorney'); ?></h3>
                            <ul style="list-style: disc; padding-left: 1.5rem; color: rgba(255,255,255,0.6);">
                                <?php foreach ($benefits as $benefit) : ?>
                                    <li style="margin-bottom: 0.5rem;"><?php echo esc_html($benefit); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="reveal" style="text-align: center;">
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('dpattorney_contact_email', 'careers@dpattorney.com')); ?>?subject=<?php echo urlencode('Lamaran: ' . get_the_title()); ?>" class="btn btn-primary btn-lg">
                        <?php _e('Lamar Sekarang', 'dpattorney'); ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
</main>

<?php
endwhile;
get_footer();
