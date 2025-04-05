<?php get_header(); ?>

<section class="projects-archive">
    <div class="container">
        <h1 class="page-title">Our Projects</h1>
        
        <?php if (have_posts()) : ?>
            <div class="projects-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="project">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="project-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <h2 class="project-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        
                        <div class="project-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="project-link">View Project</a>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination">
                <?php the_posts_pagination(); ?>
            </div>
        <?php else : ?>
            <p>No projects found.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>