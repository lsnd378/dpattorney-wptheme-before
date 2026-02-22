<?php
/**
 * The template for displaying team type taxonomy pages
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

get_header();

$current_term = get_queried_object();
$team_members = new WP_Query(array(
    'post_type' => 'team_member',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'team_type',
            'field' => 'slug',
            'terms' => $current_term->slug,
        ),
    ),
));

// Get all team types for tabs
$team_types = get_terms(array(
    'taxonomy' => 'team_type',
    'hide_empty' => false,
));
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
    
    <!-- Team Section -->
    <section class="team-section" style="padding-top: 3rem;">
        <div class="container">
            <div class="team-header reveal">
                <span class="team-label"><?php _e('Tim Kami', 'dpattorney'); ?></span>
                <h1 class="team-title"><?php echo esc_html($current_term->name); ?></h1>
                <?php if ($current_term->description) : ?>
                    <p class="team-description">
                        <?php echo esc_html($current_term->description); ?>
                    </p>
                <?php endif; ?>
            </div>
            
            <!-- Team Type Tabs -->
            <?php if (!empty($team_types) && !is_wp_error($team_types)) : ?>
                <div class="team-tabs reveal">
                    <?php foreach ($team_types as $type) : 
                        $is_active = $type->slug === $current_term->slug;
                    ?>
                        <a href="<?php echo esc_url(get_term_link($type)); ?>" class="team-tab <?php echo $is_active ? 'active' : ''; ?>">
                            <?php echo esc_html($type->name); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            <!-- Team Grid -->
            <?php if ($team_members->have_posts()) : ?>
                <div class="team-grid reveal-children" style="display: grid;">
                    <?php while ($team_members->have_posts()) : $team_members->the_post(); 
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
            <?php else : ?>
                <div class="no-results">
                    <p><?php _e('Tidak ada anggota tim ditemukan.', 'dpattorney'); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </section>
    
</main>

<?php
get_footer();
