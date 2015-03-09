<?php
/**
 * Template Name: Blog
 *
 */
get_header();
global $data;
?>
<div class="inner-page-section">
            <div class="container">
                <div class="col-sm-8 inner-page-left">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => $data['blog_post'],
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged' => $paged
                    );
                    $wp_query = new WP_Query($args);
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                        ?>
                        <div class="blog-div">
                            <h4><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'law-firm'), the_title_attribute('echo=0')); ?>" rel="bookmark"> <?php the_title(); ?></a></h4>
                            <p><?php the_excerpt(); ?></p>
                        </div><!-- #post -->
                    <?php endwhile; ?>
                    <?php
                    if (function_exists('wp_paginate')) {
                        wp_paginate();
                    }
                    wp_reset_query();
                    ?>
                
            </div>
           <div class="col-sm-4">
                <?php get_sidebar_inner(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>