<?php
/* template name: No Title */
get_header();
?>
<div class="inner-page-section">
            <div class="container">
                <div class="col-sm-8 inner-page-left">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; // end of the loop. ?>
                    <?php if (function_exists('get_related_links')) : ?>
                        <?php if (get_related_links()) : ?>   
                            <div class="margin-top25 related-articals">
                                <h2 class="title-box">Related Articles</h2>
                                <ul>
                                    <?php $related_links = get_related_links(); ?>
                                    <?php foreach ($related_links as $link): ?>
                                        <li><a href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
                                    <?php endforeach; ?>	
                                </ul>
                            </div> 
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <div class="col-sm-4 inner-page-right">
                <?php get_sidebar_inner(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
