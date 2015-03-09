<?php
/*
 * Template Name: Front Page
 */
global $data;
get_header();
?>
<div class="client_testmonial">
    <div class="container">
        <div class="testimonial-div">
            <blockquote class="bq3">
            <ul id="fade">
                        
                        <?php
                        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type' => 'testimonial',
                            'post_status' => 'publish',
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'posts_per_page' => 100,
                            'paged' => $paged
                        );
                        $wp_query = new WP_Query($args);
                        while ($wp_query->have_posts()) : $wp_query->the_post();
                            ?>
                            <li><?php the_content(); ?></li>
                        <?php endwhile;
                        ?>
                    </ul>
                    <a class="read-more" href="<?php echo $data['home_testimonial_link'];?>">Read More</a>
            </blockquote>
        </div>
    </div>
</div>
<!--Book Box -->
<div class="outter-div">
            <div class="container">
                <div class="col-sm-8">
                    <div class="col-sm-4 inner-section">
                    <a href="<?php echo $data['hf_link1']; ?>">
                        <div class="inner-link">
                        <?php echo $data['hf_text1']?>                                           
                    </div>
                    </a>
                    </div>
                    <div class="col-sm-4 inner-section">
                    <a href="<?php echo $data['hf_link2']; ?>">
                        <div class="inner-link">
                        <?php echo $data['hf_text2']?>                                           
                    </div>
                    </a>
                    </div>
                    <div class="col-sm-4 inner-section">
                    <a href="<?php echo $data['hf_link3']; ?>">
                        <div class="inner-link">
                        <?php echo $data['hf_text3']?>                                           
                    </div>
                    </a>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="col-sm-4 book-div hidden-xs">
                    <h6><?php echo $data['book_title_1']; ?></h6>
                    <img src="<?php echo $data['book1_img'] ?>" class="book-logo">
                    <div class="right-div">
                        
                        <p><?php echo $data['book_subtitle_1'] ?></p>
                        <a class="free-download-btn" href="#book1" data-toggle="modal">
                            <?php echo $data['book_btn_text']; ?>
                        </a>
                    </div>
                </div>
            </div> 
</div>

<div class="container">
        <div class="main-inner-div">
            <div class="col-sm-8 left-inner-div">
                <div class="content-inner-div">
                    <?php
                    wp_reset_query();
                    while (have_posts()) : the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </div>
            <div class="col-sm-4 right-inner-div">
                <?php get_sidebar(); ?>
            </div>
        
    </div>
</div>
<?php get_footer(); ?>
