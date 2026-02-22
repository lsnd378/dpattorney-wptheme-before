<?php
/**
 * Template Name: Contact Page
 *
 * The template for displaying the contact page
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

$contact_email = get_theme_mod('dpattorney_contact_email', 'contact@dpattorney.com');
$contact_phone = get_theme_mod('dpattorney_contact_phone', '+62 21 1234 5678');
$contact_address = get_theme_mod('dpattorney_contact_address', __('Sudirman Central Business District, Jakarta', 'dpattorney'));
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
    
    <!-- Contact Section -->
    <section class="section" style="padding-top: 3rem;">
        <div class="container">
            <div class="team-header reveal">
                <span class="team-label"><?php _e('Kontak', 'dpattorney'); ?></span>
                <h1 class="team-title"><?php _e('Hubungi Kami', 'dpattorney'); ?></h1>
                <p class="team-description">
                    <?php _e('Silakan hubungi kami untuk konsultasi atau pertanyaan lebih lanjut.', 'dpattorney'); ?>
                </p>
            </div>
            
            <div style="display: grid; grid-template-columns: 1fr; gap: 3rem; margin-top: 4rem;">
                <?php if (class_exists('WPForms')) : ?>
                    <!-- Contact Form -->
                    <div class="reveal">
                        <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.1); border-radius: 1rem; padding: 2rem;">
                            <h3 style="font-size: 1.5rem; font-weight: 600; color: #fff; margin-bottom: 1.5rem;"><?php _e('Kirim Pesan', 'dpattorney'); ?></h3>
                            <?php 
                            // Check if there's a WPForms form
                            $forms = wpforms()->form->get();
                            if (!empty($forms)) {
                                echo do_shortcode('[wpforms id="' . $forms[0]->ID . '" title="false"]');
                            } else {
                                echo '<p>' . __('Silakan buat form kontak menggunakan WPForms.', 'dpattorney') . '</p>';
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Contact Info -->
                <div class="reveal" style="transition-delay: 0.2s;">
                    <div style="display: grid; gap: 2rem;">
                        <!-- Email -->
                        <div style="display: flex; align-items: flex-start; gap: 1rem;">
                            <div style="width: 48px; height: 48px; background: rgba(249, 115, 22, 0.1); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #f97316;"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            </div>
                            <div>
                                <h4 style="font-size: 1.125rem; font-weight: 600; color: #fff; margin-bottom: 0.5rem;"><?php _e('Email', 'dpattorney'); ?></h4>
                                <a href="mailto:<?php echo esc_attr($contact_email); ?>" style="color: rgba(255,255,255,0.6); transition: color 0.3s ease;"><?php echo esc_html($contact_email); ?></a>
                            </div>
                        </div>
                        
                        <!-- Phone -->
                        <div style="display: flex; align-items: flex-start; gap: 1rem;">
                            <div style="width: 48px; height: 48px; background: rgba(249, 115, 22, 0.1); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #f97316;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            </div>
                            <div>
                                <h4 style="font-size: 1.125rem; font-weight: 600; color: #fff; margin-bottom: 0.5rem;"><?php _e('Telepon', 'dpattorney'); ?></h4>
                                <a href="tel:<?php echo esc_attr(dpattorney_format_phone($contact_phone)); ?>" style="color: rgba(255,255,255,0.6); transition: color 0.3s ease;"><?php echo esc_html($contact_phone); ?></a>
                            </div>
                        </div>
                        
                        <!-- Address -->
                        <div style="display: flex; align-items: flex-start; gap: 1rem;">
                            <div style="width: 48px; height: 48px; background: rgba(249, 115, 22, 0.1); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #f97316;"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            </div>
                            <div>
                                <h4 style="font-size: 1.125rem; font-weight: 600; color: #fff; margin-bottom: 0.5rem;"><?php _e('Alamat', 'dpattorney'); ?></h4>
                                <p style="color: rgba(255,255,255,0.6);"><?php echo esc_html($contact_address); ?></p>
                            </div>
                        </div>
                        
                        <!-- Social Media -->
                        <div style="display: flex; align-items: flex-start; gap: 1rem;">
                            <div style="width: 48px; height: 48px; background: rgba(249, 115, 22, 0.1); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="color: #f97316;"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
                            </div>
                            <div>
                                <h4 style="font-size: 1.125rem; font-weight: 600; color: #fff; margin-bottom: 0.5rem;"><?php _e('Media Sosial', 'dpattorney'); ?></h4>
                                <div style="display: flex; gap: 0.75rem;">
                                    <?php if (get_theme_mod('dpattorney_linkedin')) : ?>
                                        <a href="<?php echo esc_url(get_theme_mod('dpattorney_linkedin')); ?>" target="_blank" rel="noopener noreferrer" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); transition: all 0.3s ease;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <?php if (get_theme_mod('dpattorney_twitter')) : ?>
                                        <a href="<?php echo esc_url(get_theme_mod('dpattorney_twitter')); ?>" target="_blank" rel="noopener noreferrer" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); transition: all 0.3s ease;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <?php if (get_theme_mod('dpattorney_facebook')) : ?>
                                        <a href="<?php echo esc_url(get_theme_mod('dpattorney_facebook')); ?>" target="_blank" rel="noopener noreferrer" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); transition: all 0.3s ease;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <?php if (get_theme_mod('dpattorney_instagram')) : ?>
                                        <a href="<?php echo esc_url(get_theme_mod('dpattorney_instagram')); ?>" target="_blank" rel="noopener noreferrer" style="width: 40px; height: 40px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.6); transition: all 0.3s ease;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
</main>

<?php
get_footer();
