<?php
get_header();
global $data;
?>

<div class="inner-page-section">
            <div class="container">
                <div class="col-sm-8 inner-page-left">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <h1 class="blog-title-detail"><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                            <?php if ($data['check_sharebox'] == true) { ?>
                                <?php get_template_part('sharebox'); ?>
                            <?php } ?>
                            <?php if ($data['check_authorinfo'] == true) { ?>
                                <div id="author-info" class=" well clearfix">
                                    <div class="author-image">
                                        <a href="<?php echo $data['icon_google']; ?>" rel="nofollow" target="_blank">
                                            <?php echo get_avatar(get_the_author_meta('user_email'), '35', ''); ?>
                                        </a>
                                    </div>   
                                    <div class="author-bio">
                                        <h4><?php _e('About the Author', 'law-firm'); ?></h4>
                                        <?php the_author_meta('description'); ?>
                                    </div>
                                </div>
                            <?php } ?>

                        </article><!-- #post -->
                    <?php endwhile; ?>
            </div>
            <div class="col-sm-4">
                <?php get_sidebar_inner(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>