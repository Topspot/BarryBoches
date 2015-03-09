<?php
/* template name: Case Eveluation Form */
get_header();
?>
</div>
<div class="extra-margin-top-inner"></div>
<div class="main-content-div-outer">
    <div class="container">
        <div class="main-content-div-inner border-none">
            <div class="col-sm-8">
                <div class="content-inner-div">
                     <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', 'page'); ?>
                    <?php endwhile; // end of the loop. ?>
                    <?php echo do_shortcode('[caseForm]')?>
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
            </div>
            <div class="col-sm-4">
                <?php get_sidebar_inner(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>

