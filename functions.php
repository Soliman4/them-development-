<?php
// Theme setup
function my_theme_setup() {
    // Enable essential features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    
    // Register navigation menu
    register_nav_menu('primary', 'Primary Menu');
    
    // Register Projects post type with custom field support
    register_post_type('project', [
        'labels' => [
            'name' => 'Projects',
            'singular_name' => 'Project'
        ],
        'public' => true,
        'has_archive' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_icon' => 'dashicons-portfolio'
    ]);
}
add_action('after_setup_theme', 'my_theme_setup');

// Load styles and scripts
function my_theme_scripts() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    
    // Main CSS file
    wp_enqueue_style('theme-main-css', 
        get_template_directory_uri() . '/assets/css/main.css',
        array(), // No dependencies
        filemtime(get_template_directory() . '/assets/css/main.css') // Version based on file modification time
    );
    
    // Responsive CSS file
    wp_enqueue_style('theme-responsive-css', 
        get_template_directory_uri() . '/assets/css/responsive.css',
        array('theme-main-css'), // Depends on main.css
        filemtime(get_template_directory() . '/assets/css/responsive.css') // Version
    );
    wp_enqueue_script('theme-script', 
    get_template_directory_uri() . '/assets/js/script.js', 
    array('jquery'), 
    '1.0', 
    true
    );
}


add_action('wp_enqueue_scripts', 'my_theme_scripts');
// Add this to your functions.php to set links when creating projects
function add_project_links() {
    $projects = get_posts(['post_type' => 'project', 'numberposts' => -1]);
    
    foreach ($projects as $project) {
        // Set your custom links here based on project title/ID
        $link = '';
        
        switch ($project->post_title) {
            case 'E-Commerce Website':
                $link = 'https://karrello.com/';
                break;
            case 'OVEO Website':
                $link = 'https://www.oveo-perfume.com/';
                break;
            case 'Dmarly':
                $link = 'https://dmarly.com/';
                break;
            case 'Lex-Resolve Website':
                $link = 'https://lex-resolvo.com/';
                break;
            case 'Halo jewelry website':
                $link = 'https://halojewelry.net/';
                break;    
            case 'Halo jewelry website':
                $link = 'https://halojewelry.net/';
                break;    
            case 'Maroco4product Website':
                $link = 'https://maroc4products.com/';
                break; 
                
        }
        
        if (!empty($link)) {
            update_post_meta($project->ID, 'project_link', $link);
        }
    }
}
add_action('init', 'add_project_links');

function enqueue_footer_styles() {
    wp_enqueue_style('footer-css', get_template_directory_uri() . '/css/main.css');
}
function deregister_jquery_migrate($scripts) {
    if (!is_admin()) {
        $scripts->remove('jquery');
        $scripts->add('jquery', false, array('jquery-core'), '3.6.0');
    }
}
add_action('wp_default_scripts', 'deregister_jquery_migrate');