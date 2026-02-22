<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="main-content">
    <div class="error-404">
        <div class="container">
            <div class="error-code">404</div>
            <h1><?php _e('Halaman Tidak Ditemukan', 'dpattorney'); ?></h1>
            <p><?php _e('Maaf, halaman yang Anda cari tidak dapat ditemukan. Mungkin telah dipindahkan atau dihapus.', 'dpattorney'); ?></p>
            
            <div class="hero-buttons" style="margin-top: 2rem;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg">
                    <?php _e('Kembali ke Beranda', 'dpattorney'); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                </a>
            </div>
            
            <div style="margin-top: 3rem; max-width: 500px; margin-left: auto; margin-right: auto;">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
