<?php
/* template name: Contact us
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
get_header();
?>
<div class="inner-page-section">
            <div class="container">
                <div class="main-inner-page-div">
            <div class="col-sm-4">
                <div class="side-bar-div">
                   <div class="contact-us-div inner-page-contact">
                    <h6>Free Initial Consultation</h6>
                    <?php echo do_shortcode('[cForm]'); ?>
                </div>
                </div>
            </div>
            <div class="col-sm-8">
                    <div class="address-div">
                        <div class="address-left-div">
                        <?php if ($data['address1']) { ?>
                        <p style="text-align: left; padding-right: 13px;"><?php
                                $str = str_replace('<br />', ' ', $data['address1']);
                                echo $data['address1'];
                                ?></p>
                        <?php } if ($data['phone1']) { ?>
                            <p><span>Phone :</span> <?php echo $data['phone1'] ?></p>
                        <?php } if ($data['fax_number']) { ?>
                            <p><span>Fax &nbsp;&nbsp;&nbsp; :</span>&nbsp; <?php echo $data['fax_number'] ?></p>
                        <?php } ?>
                    </div>
                    <div class="google-map">
                            <div id="map_canvas" style="width: 100%; height: 200px;">
                            <?php echo $data['address1_iframe']; ?>
                        </div>
                    </div>
                </div>
                <?php if ($data['address2']) { ?>
                    <div class="address-div-outer">
                        <div class="address-div-left">
                            <div class="address-div-left-content">
                                <p><?php
                                    $str2 = str_replace('<br />', ' ', $data['address2']);
                                    echo $data['address2'];
                                    ?></p>
                                <?php if ($data['phone1']) { ?>
                                    <p><span>Phone :</span> <?php echo $data['phone1'] ?></p>
                                <?php } ?>
                                <?php if ($data['phone2']) { ?>
                                    <p><span>Phone :</span> <?php echo $data['phone2'] ?></p>
                                <?php } ?>
                                <?php if ($data['fax_number']) { ?>
                                    <p><span>Phone :</span> <?php echo $data['fax_number'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="address-div-right">
                            <div id="map_canvas2" style="width: 100%; height: 160px;" >
                                <?php echo $data['address2_iframe']; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div style="clear: both;"></div>
            <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" class="contact-us-content">
                    <?php the_content(); ?>
                </article><!-- #post -->
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
