</main>
        
        <footer class="site-footer">
            <div class="container">
                <div class="footer-widgets">
                    <div class="widget">
                        <?php dynamic_sidebar('footer-1'); ?>
                    </div>
                    <div class="widget">
                        <?php dynamic_sidebar('footer-2'); ?>
                    </div>
                </div>
                
                <nav class="footer-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => false
                    ));
                    ?>
                </nav>
                
                <div class="site-info">
                    <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
                </div>
            </div>
        </footer>
        
        <?php wp_footer(); ?>
    </body>
</html>