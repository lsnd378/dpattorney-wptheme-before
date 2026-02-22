<?php
/**
 * The template for displaying the footer
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */
?>

    </main><!-- #primary -->
    
    <footer class="site-footer" id="site-footer">
        <div class="container">
            <div class="footer-grid">
                
                <!-- Brand Column -->
                <div class="footer-brand">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="footer-logo" rel="home">
                        <div class="footer-logo-icon">DP</div>
                        <span class="footer-logo-text">PONGKOR & PARTNERS</span>
                    </a>
                    
                    <p class="footer-description">
                        <?php _e('Menavigasi kompleksitas dengan presisi digital. Partner hukum terpercaya Anda di seluruh Asia.', 'dpattorney'); ?>
                    </p>
                    
                    <div class="footer-social">
                        <?php if ($linkedin = get_theme_mod('dpattorney_linkedin')) : ?>
                            <a href="<?php echo esc_url($linkedin); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php _e('LinkedIn', 'dpattorney'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($twitter = get_theme_mod('dpattorney_twitter')) : ?>
                            <a href="<?php echo esc_url($twitter); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php _e('Twitter', 'dpattorney'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z"/></svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($facebook = get_theme_mod('dpattorney_facebook')) : ?>
                            <a href="<?php echo esc_url($facebook); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php _e('Facebook', 'dpattorney'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </a>
                        <?php endif; ?>
                        
                        <?php if ($instagram = get_theme_mod('dpattorney_instagram')) : ?>
                            <a href="<?php echo esc_url($instagram); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php _e('Instagram', 'dpattorney'); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Locations Column -->
                <div class="footer-locations">
                    <h4 class="footer-title"><?php _e('Lokasi', 'dpattorney'); ?></h4>
                    <ul class="footer-links">
                        <li>
                            <div class="footer-contact-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                <div>
                                    <div style="color: #fff; font-size: 0.875rem; font-weight: 500;">Jakarta</div>
                                    <div style="color: rgba(255,255,255,0.4); font-size: 0.75rem;">Sudirman Central Business District</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="footer-contact-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                <div>
                                    <div style="color: #fff; font-size: 0.875rem; font-weight: 500;">Surabaya</div>
                                    <div style="color: rgba(255,255,255,0.4); font-size: 0.75rem;">Tunjungan Plaza Business Center</div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="footer-contact-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                                <div>
                                    <div style="color: #fff; font-size: 0.875rem; font-weight: 500;">Singapore</div>
                                    <div style="color: rgba(255,255,255,0.4); font-size: 0.75rem;">Marina Bay Financial Centre</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <!-- Quick Links Column -->
                <div class="footer-links-column">
                    <h4 class="footer-title"><?php _e('Tautan Cepat', 'dpattorney'); ?></h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_id' => 'footer-menu',
                        'menu_class' => 'footer-links',
                        'container' => false,
                        'fallback_cb' => false,
                        'depth' => 1,
                    ));
                    ?>
                </div>
                
                <!-- Contact Column -->
                <div class="footer-contact">
                    <h4 class="footer-title"><?php _e('Kontak', 'dpattorney'); ?></h4>
                    <ul class="footer-links">
                        <li>
                            <div class="footer-contact-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                <a href="mailto:<?php echo esc_attr(get_theme_mod('dpattorney_contact_email', 'contact@dpattorney.com')); ?>">
                                    <?php echo esc_html(get_theme_mod('dpattorney_contact_email', 'contact@dpattorney.com')); ?>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="footer-contact-item">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', get_theme_mod('dpattorney_contact_phone', '+65 6123 4567'))); ?>">
                                    <?php echo esc_html(get_theme_mod('dpattorney_contact_phone', '+65 6123 4567')); ?>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
                
            </div>
            
            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p class="footer-copyright">
                    <?php 
                    printf(
                        __('&copy; %s Dion Pongkor & Partners. %s', 'dpattorney'),
                        date('Y'),
                        __('All rights reserved.', 'dpattorney')
                    ); 
                    ?>
                </p>
                
                <div class="footer-legal">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'legal',
                        'menu_id' => 'legal-menu',
                        'menu_class' => '',
                        'container' => false,
                        'fallback_cb' => false,
                        'depth' => 1,
                    ));
                    ?>
                </div>
            </div>
        </div>
    </footer>
    
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
