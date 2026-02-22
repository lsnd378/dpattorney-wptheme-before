<?php
/**
 * D Pongkor & Partners functions and definitions
 *
 * @package D_Pongkor_Partners
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme version
define('DPATTORNEY_VERSION', '1.0.0');
define('DPATTORNEY_DIR', get_template_directory());
define('DPATTORNEY_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function dpattorney_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style',
    ));
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    
    // Add image sizes
    add_image_size('team-thumbnail', 400, 500, true);
    add_image_size('team-large', 600, 800, true);
    add_image_size('practice-thumbnail', 600, 400, true);
    add_image_size('article-thumbnail', 800, 450, true);
    
    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'dpattorney'),
        'footer' => __('Footer Menu', 'dpattorney'),
        'legal' => __('Legal Menu', 'dpattorney'),
    ));
    
    // Load text domain
    load_theme_textdomain('dpattorney', DPATTORNEY_DIR . '/languages');
}
add_action('after_setup_theme', 'dpattorney_setup');

/**
 * Enqueue Scripts and Styles
 */
function dpattorney_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'dpattorney-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap',
        array(),
        null
    );
    
    // Main stylesheet
    wp_enqueue_style(
        'dpattorney-style',
        DPATTORNEY_URI . '/style.css',
        array(),
        DPATTORNEY_VERSION
    );
    
    // Custom CSS
    wp_enqueue_style(
        'dpattorney-custom',
        DPATTORNEY_URI . '/assets/css/custom.css',
        array('dpattorney-style'),
        DPATTORNEY_VERSION
    );
    
    // Main JavaScript
    wp_enqueue_script(
        'dpattorney-main',
        DPATTORNEY_URI . '/assets/js/main.js',
        array('jquery'),
        DPATTORNEY_VERSION,
        true
    );
    
    // Pass AJAX URL to JavaScript
    wp_localize_script('dpattorney-main', 'dpattorney_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('dpattorney_nonce'),
    ));
    
    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'dpattorney_scripts');

/**
 * Admin Scripts and Styles
 */
function dpattorney_admin_scripts($hook) {
    if ($hook === 'post.php' || $hook === 'post-new.php') {
        wp_enqueue_style(
            'dpattorney-admin',
            DPATTORNEY_URI . '/assets/css/admin.css',
            array(),
            DPATTORNEY_VERSION
        );
    }
}
add_action('admin_enqueue_scripts', 'dpattorney_admin_scripts');

/**
 * Register Custom Post Types
 */
function dpattorney_register_post_types() {
    // Team Members
    $team_labels = array(
        'name' => __('Team Members', 'dpattorney'),
        'singular_name' => __('Team Member', 'dpattorney'),
        'add_new' => __('Add New', 'dpattorney'),
        'add_new_item' => __('Add New Team Member', 'dpattorney'),
        'edit_item' => __('Edit Team Member', 'dpattorney'),
        'new_item' => __('New Team Member', 'dpattorney'),
        'view_item' => __('View Team Member', 'dpattorney'),
        'search_items' => __('Search Team Members', 'dpattorney'),
        'not_found' => __('No team members found', 'dpattorney'),
        'not_found_in_trash' => __('No team members found in trash', 'dpattorney'),
        'menu_name' => __('Team', 'dpattorney'),
    );
    
    $team_args = array(
        'labels' => $team_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-groups',
        'query_var' => true,
        'rewrite' => array('slug' => 'tim', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    );
    
    register_post_type('team_member', $team_args);
    
    // Practice Areas
    $practice_labels = array(
        'name' => __('Practice Areas', 'dpattorney'),
        'singular_name' => __('Practice Area', 'dpattorney'),
        'add_new' => __('Add New', 'dpattorney'),
        'add_new_item' => __('Add New Practice Area', 'dpattorney'),
        'edit_item' => __('Edit Practice Area', 'dpattorney'),
        'new_item' => __('New Practice Area', 'dpattorney'),
        'view_item' => __('View Practice Area', 'dpattorney'),
        'search_items' => __('Search Practice Areas', 'dpattorney'),
        'not_found' => __('No practice areas found', 'dpattorney'),
        'not_found_in_trash' => __('No practice areas found in trash', 'dpattorney'),
        'menu_name' => __('Practice Areas', 'dpattorney'),
    );
    
    $practice_args = array(
        'labels' => $practice_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-awards',
        'query_var' => true,
        'rewrite' => array('slug' => 'area-praktik', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    );
    
    register_post_type('practice_area', $practice_args);
    
    // Insights/Articles
    $insights_labels = array(
        'name' => __('Insights', 'dpattorney'),
        'singular_name' => __('Insight', 'dpattorney'),
        'add_new' => __('Add New', 'dpattorney'),
        'add_new_item' => __('Add New Insight', 'dpattorney'),
        'edit_item' => __('Edit Insight', 'dpattorney'),
        'new_item' => __('New Insight', 'dpattorney'),
        'view_item' => __('View Insight', 'dpattorney'),
        'search_items' => __('Search Insights', 'dpattorney'),
        'not_found' => __('No insights found', 'dpattorney'),
        'not_found_in_trash' => __('No insights found in trash', 'dpattorney'),
        'menu_name' => __('Insights', 'dpattorney'),
    );
    
    $insights_args = array(
        'labels' => $insights_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 7,
        'menu_icon' => 'dashicons-media-document',
        'query_var' => true,
        'rewrite' => array('slug' => 'wawasan', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
        'show_in_rest' => true,
    );
    
    register_post_type('insight', $insights_args);
    
    // Job Openings
    $job_labels = array(
        'name' => __('Job Openings', 'dpattorney'),
        'singular_name' => __('Job Opening', 'dpattorney'),
        'add_new' => __('Add New', 'dpattorney'),
        'add_new_item' => __('Add New Job Opening', 'dpattorney'),
        'edit_item' => __('Edit Job Opening', 'dpattorney'),
        'new_item' => __('New Job Opening', 'dpattorney'),
        'view_item' => __('View Job Opening', 'dpattorney'),
        'search_items' => __('Search Job Openings', 'dpattorney'),
        'not_found' => __('No job openings found', 'dpattorney'),
        'not_found_in_trash' => __('No job openings found in trash', 'dpattorney'),
        'menu_name' => __('Careers', 'dpattorney'),
    );
    
    $job_args = array(
        'labels' => $job_labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 8,
        'menu_icon' => 'dashicons-businessman',
        'query_var' => true,
        'rewrite' => array('slug' => 'karir', 'with_front' => false),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
    );
    
    register_post_type('job_opening', $job_args);
}
add_action('init', 'dpattorney_register_post_types');

/**
 * Register Custom Taxonomies
 */
function dpattorney_register_taxonomies() {
    // Team Type (Partner, Senior Associate, Associate)
    $team_type_labels = array(
        'name' => __('Team Types', 'dpattorney'),
        'singular_name' => __('Team Type', 'dpattorney'),
        'search_items' => __('Search Team Types', 'dpattorney'),
        'all_items' => __('All Team Types', 'dpattorney'),
        'parent_item' => __('Parent Team Type', 'dpattorney'),
        'parent_item_colon' => __('Parent Team Type:', 'dpattorney'),
        'edit_item' => __('Edit Team Type', 'dpattorney'),
        'update_item' => __('Update Team Type', 'dpattorney'),
        'add_new_item' => __('Add New Team Type', 'dpattorney'),
        'new_item_name' => __('New Team Type Name', 'dpattorney'),
        'menu_name' => __('Team Types', 'dpattorney'),
    );
    
    $team_type_args = array(
        'labels' => $team_type_labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tipe-tim'),
        'show_in_rest' => true,
    );
    
    register_taxonomy('team_type', 'team_member', $team_type_args);
    
    // Practice Area Categories
    $practice_cat_labels = array(
        'name' => __('Practice Categories', 'dpattorney'),
        'singular_name' => __('Practice Category', 'dpattorney'),
        'search_items' => __('Search Categories', 'dpattorney'),
        'all_items' => __('All Categories', 'dpattorney'),
        'parent_item' => __('Parent Category', 'dpattorney'),
        'parent_item_colon' => __('Parent Category:', 'dpattorney'),
        'edit_item' => __('Edit Category', 'dpattorney'),
        'update_item' => __('Update Category', 'dpattorney'),
        'add_new_item' => __('Add New Category', 'dpattorney'),
        'new_item_name' => __('New Category Name', 'dpattorney'),
        'menu_name' => __('Categories', 'dpattorney'),
    );
    
    $practice_cat_args = array(
        'labels' => $practice_cat_labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'kategori-praktik'),
        'show_in_rest' => true,
    );
    
    register_taxonomy('practice_category', 'practice_area', $practice_cat_args);
    
    // Insight Categories
    $insight_cat_labels = array(
        'name' => __('Insight Categories', 'dpattorney'),
        'singular_name' => __('Insight Category', 'dpattorney'),
        'search_items' => __('Search Categories', 'dpattorney'),
        'all_items' => __('All Categories', 'dpattorney'),
        'parent_item' => __('Parent Category', 'dpattorney'),
        'parent_item_colon' => __('Parent Category:', 'dpattorney'),
        'edit_item' => __('Edit Category', 'dpattorney'),
        'update_item' => __('Update Category', 'dpattorney'),
        'add_new_item' => __('Add New Category', 'dpattorney'),
        'new_item_name' => __('New Category Name', 'dpattorney'),
        'menu_name' => __('Categories', 'dpattorney'),
    );
    
    $insight_cat_args = array(
        'labels' => $insight_cat_labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'kategori-wawasan'),
        'show_in_rest' => true,
    );
    
    register_taxonomy('insight_category', 'insight', $insight_cat_args);
    
    // Job Categories
    $job_cat_labels = array(
        'name' => __('Job Categories', 'dpattorney'),
        'singular_name' => __('Job Category', 'dpattorney'),
        'search_items' => __('Search Categories', 'dpattorney'),
        'all_items' => __('All Categories', 'dpattorney'),
        'parent_item' => __('Parent Category', 'dpattorney'),
        'parent_item_colon' => __('Parent Category:', 'dpattorney'),
        'edit_item' => __('Edit Category', 'dpattorney'),
        'update_item' => __('Update Category', 'dpattorney'),
        'add_new_item' => __('Add New Category', 'dpattorney'),
        'new_item_name' => __('New Category Name', 'dpattorney'),
        'menu_name' => __('Categories', 'dpattorney'),
    );
    
    $job_cat_args = array(
        'labels' => $job_cat_labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'kategori-pekerjaan'),
        'show_in_rest' => true,
    );
    
    register_taxonomy('job_category', 'job_opening', $job_cat_args);
}
add_action('init', 'dpattorney_register_taxonomies');

/**
 * Add Meta Boxes
 */
function dpattorney_add_meta_boxes() {
    // Team Member Meta Box
    add_meta_box(
        'team_member_details',
        __('Team Member Details', 'dpattorney'),
        'dpattorney_team_member_meta_box',
        'team_member',
        'normal',
        'high'
    );
    
    // Practice Area Meta Box
    add_meta_box(
        'practice_area_details',
        __('Practice Area Details', 'dpattorney'),
        'dpattorney_practice_area_meta_box',
        'practice_area',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'dpattorney_add_meta_boxes');

/**
 * Team Member Meta Box Callback
 */
function dpattorney_team_member_meta_box($post) {
    wp_nonce_field('dpattorney_team_member_meta', 'dpattorney_team_member_nonce');
    
    $role = get_post_meta($post->ID, '_team_role', true);
    $email = get_post_meta($post->ID, '_team_email', true);
    $phone = get_post_meta($post->ID, '_team_phone', true);
    $linkedin = get_post_meta($post->ID, '_team_linkedin', true);
    $education = get_post_meta($post->ID, '_team_education', true);
    $experience = get_post_meta($post->ID, '_team_experience', true);
    $languages = get_post_meta($post->ID, '_team_languages', true);
    $awards = get_post_meta($post->ID, '_team_awards', true);
    $expertise = get_post_meta($post->ID, '_team_expertise', true);
    ?>
    <div class="dpattorney-meta-box">
        <p>
            <label for="team_role"><?php _e('Role/Position:', 'dpattorney'); ?></label>
            <input type="text" id="team_role" name="team_role" value="<?php echo esc_attr($role); ?>" class="widefat">
        </p>
        <p>
            <label for="team_email"><?php _e('Email:', 'dpattorney'); ?></label>
            <input type="email" id="team_email" name="team_email" value="<?php echo esc_attr($email); ?>" class="widefat">
        </p>
        <p>
            <label for="team_phone"><?php _e('Phone:', 'dpattorney'); ?></label>
            <input type="text" id="team_phone" name="team_phone" value="<?php echo esc_attr($phone); ?>" class="widefat">
        </p>
        <p>
            <label for="team_linkedin"><?php _e('LinkedIn URL:', 'dpattorney'); ?></label>
            <input type="url" id="team_linkedin" name="team_linkedin" value="<?php echo esc_attr($linkedin); ?>" class="widefat">
        </p>
        <p>
            <label for="team_education"><?php _e('Education (one per line):', 'dpattorney'); ?></label>
            <textarea id="team_education" name="team_education" rows="4" class="widefat"><?php echo esc_textarea($education); ?></textarea>
        </p>
        <p>
            <label for="team_experience"><?php _e('Experience (one per line):', 'dpattorney'); ?></label>
            <textarea id="team_experience" name="team_experience" rows="4" class="widefat"><?php echo esc_textarea($experience); ?></textarea>
        </p>
        <p>
            <label for="team_languages"><?php _e('Languages (comma separated):', 'dpattorney'); ?></label>
            <input type="text" id="team_languages" name="team_languages" value="<?php echo esc_attr($languages); ?>" class="widefat">
        </p>
        <p>
            <label for="team_awards"><?php _e('Awards (one per line):', 'dpattorney'); ?></label>
            <textarea id="team_awards" name="team_awards" rows="4" class="widefat"><?php echo esc_textarea($awards); ?></textarea>
        </p>
        <p>
            <label for="team_expertise"><?php _e('Expertise (comma separated):', 'dpattorney'); ?></label>
            <input type="text" id="team_expertise" name="team_expertise" value="<?php echo esc_attr($expertise); ?>" class="widefat">
        </p>
    </div>
    <?php
}

/**
 * Practice Area Meta Box Callback
 */
function dpattorney_practice_area_meta_box($post) {
    wp_nonce_field('dpattorney_practice_area_meta', 'dpattorney_practice_area_nonce');
    
    $icon = get_post_meta($post->ID, '_practice_icon', true);
    $tags = get_post_meta($post->ID, '_practice_tags', true);
    ?>
    <div class="dpattorney-meta-box">
        <p>
            <label for="practice_icon"><?php _e('Icon Class (Lucide icon name):', 'dpattorney'); ?></label>
            <input type="text" id="practice_icon" name="practice_icon" value="<?php echo esc_attr($icon); ?>" class="widefat" placeholder="e.g., building-2, scale, zap">
        </p>
        <p>
            <label for="practice_tags"><?php _e('Tags (comma separated):', 'dpattorney'); ?></label>
            <input type="text" id="practice_tags" name="practice_tags" value="<?php echo esc_attr($tags); ?>" class="widefat" placeholder="e.g., Blockchain, DeFi, NFTs">
        </p>
    </div>
    <?php
}

/**
 * Save Meta Box Data
 */
function dpattorney_save_meta_boxes($post_id) {
    // Check if our nonce is set
    if (!isset($_POST['dpattorney_team_member_nonce']) && !isset($_POST['dpattorney_practice_area_nonce'])) {
        return;
    }
    
    // Verify that the nonce is valid
    if (isset($_POST['dpattorney_team_member_nonce']) && !wp_verify_nonce($_POST['dpattorney_team_member_nonce'], 'dpattorney_team_member_meta')) {
        return;
    }
    
    if (isset($_POST['dpattorney_practice_area_nonce']) && !wp_verify_nonce($_POST['dpattorney_practice_area_nonce'], 'dpattorney_practice_area_meta')) {
        return;
    }
    
    // If this is an autosave, our form has not been submitted, so we don't want to do anything
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    // Check the user's permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    // Save Team Member Meta
    if (isset($_POST['team_role'])) {
        update_post_meta($post_id, '_team_role', sanitize_text_field($_POST['team_role']));
    }
    if (isset($_POST['team_email'])) {
        update_post_meta($post_id, '_team_email', sanitize_email($_POST['team_email']));
    }
    if (isset($_POST['team_phone'])) {
        update_post_meta($post_id, '_team_phone', sanitize_text_field($_POST['team_phone']));
    }
    if (isset($_POST['team_linkedin'])) {
        update_post_meta($post_id, '_team_linkedin', esc_url_raw($_POST['team_linkedin']));
    }
    if (isset($_POST['team_education'])) {
        update_post_meta($post_id, '_team_education', sanitize_textarea_field($_POST['team_education']));
    }
    if (isset($_POST['team_experience'])) {
        update_post_meta($post_id, '_team_experience', sanitize_textarea_field($_POST['team_experience']));
    }
    if (isset($_POST['team_languages'])) {
        update_post_meta($post_id, '_team_languages', sanitize_text_field($_POST['team_languages']));
    }
    if (isset($_POST['team_awards'])) {
        update_post_meta($post_id, '_team_awards', sanitize_textarea_field($_POST['team_awards']));
    }
    if (isset($_POST['team_expertise'])) {
        update_post_meta($post_id, '_team_expertise', sanitize_text_field($_POST['team_expertise']));
    }
    
    // Save Practice Area Meta
    if (isset($_POST['practice_icon'])) {
        update_post_meta($post_id, '_practice_icon', sanitize_text_field($_POST['practice_icon']));
    }
    if (isset($_POST['practice_tags'])) {
        update_post_meta($post_id, '_practice_tags', sanitize_text_field($_POST['practice_tags']));
    }
}
add_action('save_post', 'dpattorney_save_meta_boxes');

/**
 * Customizer Settings
 */
function dpattorney_customize_register($wp_customize) {
    // Theme Options Section
    $wp_customize->add_section('dpattorney_theme_options', array(
        'title' => __('Theme Options', 'dpattorney'),
        'priority' => 30,
    ));
    
    // Hero Badge Text
    $wp_customize->add_setting('dpattorney_hero_badge', array(
        'default' => __('Firma Hukum Terkemuka di Asia', 'dpattorney'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('dpattorney_hero_badge', array(
        'label' => __('Hero Badge Text', 'dpattorney'),
        'section' => 'dpattorney_theme_options',
        'type' => 'text',
    ));
    
    // Hero Title
    $wp_customize->add_setting('dpattorney_hero_title', array(
        'default' => __('Pengacara yang mengerti Asia.', 'dpattorney'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('dpattorney_hero_title', array(
        'label' => __('Hero Title', 'dpattorney'),
        'section' => 'dpattorney_theme_options',
        'type' => 'text',
    ));
    
    // Hero Description
    $wp_customize->add_setting('dpattorney_hero_description', array(
        'default' => __('Menavigasi kompleksitas dengan presisi digital. Kami menggabungkan keahlian regional yang mendalam dengan pendekatan futuristik terhadap nasihat hukum.', 'dpattorney'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('dpattorney_hero_description', array(
        'label' => __('Hero Description', 'dpattorney'),
        'section' => 'dpattorney_theme_options',
        'type' => 'textarea',
    ));
    
    // Contact Email
    $wp_customize->add_setting('dpattorney_contact_email', array(
        'default' => 'contact@dpattorney.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('dpattorney_contact_email', array(
        'label' => __('Contact Email', 'dpattorney'),
        'section' => 'dpattorney_theme_options',
        'type' => 'email',
    ));
    
    // Contact Phone
    $wp_customize->add_setting('dpattorney_contact_phone', array(
        'default' => '+65 6123 4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('dpattorney_contact_phone', array(
        'label' => __('Contact Phone', 'dpattorney'),
        'section' => 'dpattorney_theme_options',
        'type' => 'text',
    ));
    
    // Social Links
    $wp_customize->add_setting('dpattorney_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('dpattorney_linkedin', array(
        'label' => __('LinkedIn URL', 'dpattorney'),
        'section' => 'dpattorney_theme_options',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('dpattorney_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('dpattorney_twitter', array(
        'label' => __('Twitter URL', 'dpattorney'),
        'section' => 'dpattorney_theme_options',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('dpattorney_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('dpattorney_facebook', array(
        'label' => __('Facebook URL', 'dpattorney'),
        'section' => 'dpattorney_theme_options',
        'type' => 'url',
    ));
    
    $wp_customize->add_setting('dpattorney_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('dpattorney_instagram', array(
        'label' => __('Instagram URL', 'dpattorney'),
        'section' => 'dpattorney_theme_options',
        'type' => 'url',
    ));
}
add_action('customize_register', 'dpattorney_customize_register');

/**
 * Widget Areas
 */
function dpattorney_widgets_init() {
    register_sidebar(array(
        'name' => __('Footer Widget Area 1', 'dpattorney'),
        'id' => 'footer-1',
        'description' => __('Widgets in this area will be shown in the footer.', 'dpattorney'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-title">',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Widget Area 2', 'dpattorney'),
        'id' => 'footer-2',
        'description' => __('Widgets in this area will be shown in the footer.', 'dpattorney'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-title">',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => __('Blog Sidebar', 'dpattorney'),
        'id' => 'blog-sidebar',
        'description' => __('Widgets in this area will be shown on blog pages.', 'dpattorney'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'dpattorney_widgets_init');

/**
 * Helper Functions
 */

// Get team members by type
function dpattorney_get_team_members($type = '', $limit = -1) {
    $args = array(
        'post_type' => 'team_member',
        'posts_per_page' => $limit,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );
    
    if (!empty($type)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'team_type',
                'field' => 'slug',
                'terms' => $type,
            ),
        );
    }
    
    return new WP_Query($args);
}

// Get practice areas
function dpattorney_get_practice_areas($limit = -1) {
    $args = array(
        'post_type' => 'practice_area',
        'posts_per_page' => $limit,
        'orderby' => 'menu_order',
        'order' => 'ASC',
    );
    
    return new WP_Query($args);
}

// Get insights
function dpattorney_get_insights($limit = -1) {
    $args = array(
        'post_type' => 'insight',
        'posts_per_page' => $limit,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    return new WP_Query($args);
}

// Get job openings
function dpattorney_get_job_openings($limit = -1) {
    $args = array(
        'post_type' => 'job_opening',
        'posts_per_page' => $limit,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    
    return new WP_Query($args);
}

// Parse meta field to array
function dpattorney_parse_meta_array($meta_value) {
    if (empty($meta_value)) {
        return array();
    }
    return array_filter(array_map('trim', explode("\n", $meta_value)));
}

// Parse comma separated to array
function dpattorney_parse_comma_array($meta_value) {
    if (empty($meta_value)) {
        return array();
    }
    return array_filter(array_map('trim', explode(',', $meta_value)));
}

/**
 * SiteOrigin Page Builder Support
 */
function dpattorney_siteorigin_support() {
    // Add theme support for SiteOrigin Page Builder
    add_theme_support('siteorigin-panels', array(
        'home-page' => true,
        'home-page-default' => false,
        'home-template' => 'page-templates/home-page.php',
        'responsive' => true,
    ));
}
add_action('after_setup_theme', 'dpattorney_siteorigin_support');

/**
 * Disable Gutenberg for specific post types (optional)
 */
function dpattorney_disable_gutenberg($can_edit, $post_type) {
    // You can disable Gutenberg for specific post types if needed
    // return false;
    return $can_edit;
}
add_filter('use_block_editor_for_post_type', 'dpattorney_disable_gutenberg', 10, 2);

/**
 * Excerpt Length
 */
function dpattorney_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'dpattorney_excerpt_length', 999);

/**
 * Excerpt More
 */
function dpattorney_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'dpattorney_excerpt_more');

/**
 * Body Classes
 */
function dpattorney_body_classes($classes) {
    // Add class if homepage
    if (is_front_page()) {
        $classes[] = 'is-homepage';
    }
    
    // Add class for dark theme
    $classes[] = 'theme-dark';
    
    return $classes;
}
add_filter('body_class', 'dpattorney_body_classes');

/**
 * Required Plugins Notice
 */
function dpattorney_admin_notice() {
    $screen = get_current_screen();
    
    if ($screen->id !== 'themes' && $screen->id !== 'dashboard') {
        return;
    }
    
    if (!class_exists('SiteOrigin_Panels')) {
        ?>
        <div class="notice notice-info is-dismissible">
            <p>
                <?php 
                printf(
                    __('D Pongkor & Partners theme recommends installing %sSiteOrigin Page Builder%s for the best experience.', 'dpattorney'),
                    '<a href="' . admin_url('plugin-install.php?s=SiteOrigin+Panels&tab=search&type=term') . '">',
                    '</a>'
                ); 
                ?>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'dpattorney_admin_notice');

/**
 * Include required files
 */
require_once DPATTORNEY_DIR . '/inc/template-functions.php';
require_once DPATTORNEY_DIR . '/inc/template-tags.php';
