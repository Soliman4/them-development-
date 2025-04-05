<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <div class="site-logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-sadia.jpg" 
                        alt="<?php bloginfo('name'); ?>" 
                        class="custom-logo"
                        width="200" 
                        height="100">
                    </a>
                </div>
            </div>
            
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                    'container' => false
                ));
                ?>
            </nav>
            
            <button class="Primarybtn" aria-controls="primary-menu" aria-expanded="false">
               Try It
            </button>
            
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="hamburger"></span>
            </button>
        </div>
    </header>
    
    <main class="site-content">