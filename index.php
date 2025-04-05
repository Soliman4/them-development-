<?php get_header(); ?>

<main class="site-main">
    <section class="projects-section">
        <div class="container">
            <h2 class="section-title">My Projects</h2>
            
            <div class="projects-grid">
                <?php
                $projects = new WP_Query([
                    'post_type' => 'project',
                    'posts_per_page' => 10
                ]);
                
                if ($projects->have_posts()) :
                    while ($projects->have_posts()) : $projects->the_post();
                        // Get custom project link
                        $project_link = get_post_meta(get_the_ID(), 'project_link', true);
                        // Default to post permalink if no custom link
                        $button_link = !empty($project_link) ? esc_url($project_link) : get_permalink();
                        ?>
                        <article class="project-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="project-image">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="project-title"><?php the_title(); ?></h3>
                            
                            <div class="project-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <a href="<?php echo $button_link; ?>" class="project-button" target="_blank">
                                View Project
                            </a>
                        </article>
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="no-projects">No projects found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>