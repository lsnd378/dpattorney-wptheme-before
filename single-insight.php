<?php
/**
 * The template for displaying single insight
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

while (have_posts()) : the_post();

// Get related insights
$related_insights = new WP_Query(array(
    'post_type' => 'insight',
    'posts_per_page' => 3,
    'post__not_in' => array(get_the_ID()),
    'orderby' => 'date',
    'order' => 'DESC',
));
?>

<main id="primary" class="main-content">
    
    <!-- Page Header -->
    <div class="team-detail-header">
        <div class="container">
            <a href="<?php echo esc_url(get_post_type_archive_link('insight')); ?>" class="team-detail-breadcrumb">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                <?php _e('Wawasan', 'dpattorney'); ?>
            </a>
        </div>
    </div>
    
    <!-- Article Content -->
    <article class="single-post">
        <header class="entry-header" style="text-align: center; padding: 4rem 0;">
            <div class="container" style="max-width: 900px;">
                <?php if (has_post_thumbnail()) : ?>
                    <div style="margin-bottom: 2rem; border-radius: 1rem; overflow: hidden;">
                        <?php the_post_thumbnail('article-thumbnail', array('style' => 'width: 100%; height: auto;')); ?>
                    </div>
                <?php endif; ?>
                
                <h1 class="entry-title" style="font-size: 2.5rem; margin-bottom: 1rem;"><?php the_title(); ?></h1>
                
                <div class="entry-meta" style="color: rgba(255,255,255,0.5);">
                    <span><?php echo get_the_date(); ?></span>
                    <span style="margin: 0 0.5rem;">•</span>
                    <span><?php the_author(); ?></span>
                </div>
            </div>
        </header>
        
        <div class="entry-content" style="max-width: 800px; margin: 0 auto; padding: 2rem 0;">
            <?php the_content(); ?>
        </div>
        
        <footer class="entry-footer" style="max-width: 800px; margin: 0 auto; padding: 2rem 0; border-top: 1px solid rgba(255,255,255,0.1);">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'insight_category');
                    if ($categories && !is_wp_error($categories)) :
                    ?>
                        <div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
                            <?php foreach ($categories as $cat) : ?>
                                <span style="padding: 0.25rem 0.75rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 9999px; font-size: 0.875rem; color: rgba(255,255,255,0.6);"><?php echo esc_html($cat->name); ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div>
                    <?php if (get_theme_mod('dpattorney_linkedin')) : ?>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer" style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.5rem 1rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 0.5rem; color: rgba(255,255,255,0.6); transition: all 0.3s ease;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/></svg>
                            <?php _e('Bagikan', 'dpattorney'); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </footer>
    </article>
    
    <!-- Related Articles -->
    <?php if ($related_insights->have_posts()) : ?>
        <section class="related-members" style="border-top: 1px solid rgba(255,255,255,0.05);">
            <div class="container">
                <h3 class="related-members-title"><?php _e('Artikel Terkait', 'dpattorney'); ?></h3>
                
                <div class="posts-grid">
                    <?php while ($related_insights->have_posts()) : $related_insights->the_post(); ?>
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
                            </div>
                        </article>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <!-- Comments -->
    <?php if (comments_open() || get_comments_number()) : ?>
        <div class="container" style="max-width: 800px;">
            <?php comments_template(); ?>
        </div>
    <?php endif; ?>
    
</main>

<?php
endwhile;
get_footer();
