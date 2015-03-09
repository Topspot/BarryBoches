<?php
/* template name: Attorney Profile Template 2 */
get_header();
?>
</div>
<div class="extra-margin-top-inner"></div>
<div class="container">
    <div class="main-content-div-outer background-none">
        <div class="attorney-profile-outer-div">
            <div class="col-md-4 left visible-lg visible-md">
                <h2><?php echo $data['attorney_name_profile_page_2']; ?></h2>
                <div class="video-iframe">
                    <img src="<?php echo $data['video_profile_page_2']; ?>"/>
                </div>
                <h3><?php echo $data['review_profile_page_2']; ?> Reviews<span><img src="<?php echo get_template_directory_uri(); ?>/images/big_star.png"></span></h3>

                <div class="tabs-div">
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#why-client" data-toggle="tab"><?php echo $data['tab1_profile_page_2']; ?></a></li>
                        <li><a href="#other-attorney" data-toggle="tab"><?php echo $data['tab2_profile_page_2']; ?></a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="why-client">
                            <?php echo $data['tab1_text_profile_page_2']; ?>
                            <span class="more-link"><a href="<?php echo $data['more_link_profile_page_2']; ?>">(More)</a></span>
                            <div class="bio-bottom-area">
                                <div class="star-pic"><img src="<?php echo get_template_directory_uri(); ?>/images/small_stars.png"></div>
                                <h4><?php echo $data['review_profile_page_2']; ?> Reviews</h4>
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="other-attorney">
                            <?php echo $data['tab2_text_profile_page_2']; ?>
                            <span class="more-link"><a href="<?php echo $data['more_link_profile_page2_2']; ?>">(More)</a></span>
                            <div class="bio-bottom-area">
                                <div class="star-pic"><img src="<?php echo get_template_directory_uri(); ?>/images/small_stars.png"></div>
                                <h4><?php echo $data['review_profile_page2_2']; ?>  Reviews</h4>
                            </div> 
                        </div>
                    </div>
                    <script>
                        $(function() {
                            $('#myTab a:first').tab('show')
                        })
                    </script>
                </div>
            </div>
            <div class="col-md-4 left visible-sm visible-xs">
                <h2><?php echo $data['attorney_name_profile_page_2']; ?></h2>
                <div class="video-iframe">
                    <img src="<?php echo $data['video_profile_page_2']; ?>"/>
                </div>
                <h3><?php echo $data['review_profile_page_2']; ?> Reviews<span><img src="<?php echo get_template_directory_uri(); ?>/images/big_star.png"></span></h3>
            </div>
            <div class="col-md-8 right">
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            </div>
            <div class="col-md-4 left visible-sm visible-xs">
                <div class="tabs-div">
                    <ul class="nav nav-tabs" id="myTabs">
                        <li class="active"><a href="#why-clients" data-toggle="tab"><?php echo $data['tab1_profile_page_2']; ?></a></li>
                        <li><a href="#other-attorneys" data-toggle="tab"><?php echo $data['tab2_profile_page_2']; ?></a></li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="why-clients">
                            <?php echo $data['tab1_text_profile_page_2']; ?>
                            <span class="more-link"><a href="<?php echo $data['more_link_profile_page_2']; ?>">(More)</a></span>
                            <div class="bio-bottom-area">
                                <div class="star-pic"><img src="<?php echo get_template_directory_uri(); ?>/images/small_stars.png"></div>
                                <h4><?php echo $data['review_profile_page_2']; ?> Reviews</h4>
                            </div> 
                        </div>
                        <div class="tab-pane fade" id="other-attorneys">
                            <?php echo $data['tab2_text_profile_page_2']; ?>
                            <span class="more-link"><a href="<?php echo $data['more_link_profile_page_2']; ?>">(More)</a></span>
                            <div class="bio-bottom-area">
                                <div class="star-pic"><img src="<?php echo get_template_directory_uri(); ?>/images/small_stars.png"></div>
                                <h4><?php echo $data['review_profile_page_2']; ?>  Reviews</h4>
                            </div> 
                        </div>
                    </div>
                  <script>
                        $(function() {
                            $('#myTabs a:first').tab('show')
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
