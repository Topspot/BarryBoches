<?php get_header(); ?>
<div class="inner-page-section">
            <div class="container">
                <div class="col-sm-8 inner-page-left">
                <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', 'page'); ?>
                    <?php endwhile; // end of the loop. ?>
                    <?php if (function_exists('get_related_links')) : ?>
                        <?php if (get_related_links()) : ?>   
                           <div class="inner-related-articles">
                                <h4>Related Articles</h4>
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