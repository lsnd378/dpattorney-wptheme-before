<?php
/**
 * The template for displaying insight archive pages
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

$insights = dpattorney_get_insights(-1);
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
    
    <!-- Insights Section -->
    <section class="section" style="padding-top: 3rem;">
        <div class="container">
            <div class="team-header reveal">
                <span class="team-label"><?php _e('Wawasan', 'dpattorney'); ?></span>
                <h1 class="team-title"><?php _e('Artikel & Publikasi', 'dpattorney'); ?></h1>
                <p class="team-description">
                    <?php _e('Wawasan dan analisis terkini dari tim ahli hukum kami.', 'dpattorney'); ?>
                </p>
            </div>
            
            <?php if ($insights->have_posts()) : ?>
                <div class="posts-grid reveal-children">
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
            <?php else : ?>
                <div class="no-results">
                    <p><?php _e('Tidak ada artikel ditemukan.', 'dpattorney'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
</main>

<?php
get_footer();
