<?php global $data; ?>
<div class="side-bar-div hidden-xs">
    <div class="contact-us-div">
        <h6>Free Initial Consultation</h6>
        <?php echo do_shortcode('[cForm]'); ?>
    </div>
    
    <div class="recent-post-div">
        <h6>Recent Posts</h6>
        <ul>
            <?php
            query_posts('post_type=page&posts_per_page=3');
            while (have_posts()) : the_post();
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="Click to view details of '<?php the_title(); ?>'"><?php the_title(); ?></a>
                </li>
                <?php
            endwhile;
            wp_reset_query();
            ?>
            <?php
            query_posts(
                    array('post_type' => 'post', 'posts_per_page' => 3, 'post__not_in' => array())
            );
            while (have_posts()) : the_post();
                ?>
                <li><a href="<?php the_permalink(); ?>" title="Click to view details of '<?php the_title(); ?>'"><?php the_title(); ?></a></li>
                <?php
            endwhile;
            // Reset Query
            wp_reset_query();
            ?>
        </ul>
    </div>
    <div class="contact-us-div">
        <h6>Payment Plans </h6>
        <div style="margin: 10px 30px 20px;">
             <img src="<?php echo get_template_directory_uri(); ?>/images/card_1.png">
             <img src="<?php echo get_template_directory_uri(); ?>/images/card_2.png">
             <img src="<?php echo get_template_directory_uri(); ?>/images/card_3.png">
             <img src="<?php echo get_template_directory_uri(); ?>/images/card_4.png">
        </div>
    </div>
</div>
