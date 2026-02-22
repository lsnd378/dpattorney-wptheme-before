<?php
/**
 * The template for displaying all pages
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();
?>

<main id="primary" class="main-content">
    <?php
    while (have_posts()) :
        the_post();
        ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            
            <?php if (!is_front_page()) : ?>
                <header class="page-header">
                    <div class="container">
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                </header>
            <?php endif; ?>
            
            <div class="entry-content">
                <div class="container">
                    <?php
                    the_content();
                    
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'dpattorney'),
                            'after' => '</div>',
                        )
                    );
                    ?>
                </div>
            </div>
            
            <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <div class="container">
                        <?php
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    /* translators: %s: Name of current post. Only visible to screen readers */
                                    __('Edit <span class="screen-reader-text">%s</span>', 'dpattorney'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                        ?>
                    </div>
                </footer>
            <?php endif; ?>
            
        </article>
        
        <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
        
    endwhile;
    ?>
</main>

<?php
get_footer();
