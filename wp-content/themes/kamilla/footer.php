<?php
global $data;
?>

<?php /* ................................................................ */ ?>
<div class="side-bar-btn visible-xs">
     <a id="get-help-now-btn" href="#">GET HELP NOW</a>
</div>
<div class="inner-div visible-xs">
    <h4>Estate Planning</h4>
    <img class="book-img" src="<?php echo $data['book1_img'] ?>" alt="<?php echo $data['book_title_1'];?>" />
    <p><?php echo $data['book_title_1']; ?></p>
    <a  href="#book1" class="free-download-btn" data-toggle="modal"><?php echo $data['book_btn_text']; ?></a>
</div>
<?php /* ................................................................ */ ?>
    <div class="modal fade" id="book1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><?php echo str_replace('<br />', ' ', $data['book_title_1']); ?></h4>
                    </div>
                     <?php if ($data['book1_pdf'] != "") { ?>
                    <div class="modal-body">
                        <h6 class="sub-title"><?php echo $data['book_subtitle_1']; ?></h6>
                        <img src="<?php echo $data['book1_img']; ?>" class="model-book" />
                       
                        <form class="book form-horizontal" id="book" name="book" method="post" onsubmit="return false;" action="<?php echo get_template_directory_uri() ?>/ajax/book-request.php" >
                            <input type="hidden" name="book" value="Estate Planning" >
                            <input type="hidden" name="bookid" value="1" >
                            <input type="hidden" name="pdfurl"  value="<?php echo $data['book1_pdf']; ?>" >
                            <input type="hidden" name="email_sub" value="<?php echo $data['book_email_title_1']; ?>" >
                            <div class="book-download-form">
                                <p class="book-labels">Your Name *</p>
                            <input type="text" name="name1" id="name" placeholder="Full Name">
                            <p class="book-labels">Email *</p>
                            <input type="text" name="email1" id="email" placeholder="Valid Email">
                            <p class="book-labels">Phone *</p>
                            <input type="text" name="phone1" class="phone-formate" placeholder="10 Digit Number" >
                            </div>
                        </form>      
                        
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-success " type="submit"> Download Guide Now <i class="icon-download-alt"></i> </button>
                    </div>
                    <?php } else { ?>
                    <div class="modal-body">
                        <h6 class="sub-title"><?php echo $data['book_subtitle_1']; ?></h6>
                        <img src="<?php echo $data['book1_img']; ?>" class="model-book" />
                       <h2 class="inner-model-text">Download Coming Soon <br> Check Back Shortly</h2>
                             
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-danger" data-dismiss="modal">Close</button>
                    </div>
                     
                    <?php } ?>
                </div>
            </div>
        </div>
<div class="last-section">
            
    <div class="footer">
        <div class="footer_top">
            <div class="container">               
                <div class="col-lg-8" style="float: left;">
                    <div class="map_footer">
                        <div class="col-lg-4">
                            <p class="title_map">Office Location</p>
                            <p><?php echo $data['address_footer'];?></p>
                        </div>
                        <div class="col-lg-8">
                            <?php echo $data['ifram_footer'];?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"  style="float: right;">
                     <p class="title_map">Area We Serve</p>
                     <ul style="color: #ffa500; margin-left: -23px;">
                         <li style="font-family: open sans; font-size: 16px; font-weight: bold; margin: 3px 0px; color: #ffa500;"><span style=" color: #fff;">ILLINOIS</span></li> 
                         <span style="font-family: open sans; font-size: 14px;color: #fff; margin-bottom: 4px;"> Lake, McHenry, Cook Counties</span>
                         <li  style="font-family: open sans; font-size: 16px; font-weight: bold; margin: 14px 0 3px; color: #ffa500;"><span style=" color: #fff;">WISCONSIN</span></li> 
                        <span style="font-family: open sans; font-size: 14px;color: #fff; margin-bottom: 4px;">Kenosha County</span> 
                     </ul>
                           
                </div>
            </div>
        </div>
            <div class="container menu_footers">
<!--                <div class="col-lg-6">
                    <div class="copyright">
                        <p><?php echo $data['text_copyright']; ?></p>
                    </div>
                </div>       -->
                <div class="col-lg-12">
                    <div class="footer-link">
                        <?php
                        $defaults = array(
                            'theme_location' => 'secondary',
                            'menu' => '',
                            'container' => 'div',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => 'navbar-bottom',
                            'menu_id' => '',
                            'echo' => true,
                            'fallback_cb' => 'wp_page_menu',
                            'before' => '',
                            'after' => '',
                            'link_before' => '',
                            'link_after' => '',
                            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth' => 0,
                            'walker' => ''
                        );

                        wp_nav_menu($defaults);
                        ?>  
                    <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="col-lg-12">
                    <div class="copyright">
                        <p><?php echo $data['text_copyright']; ?></p>
                    </div>
                </div>       
                </div>
    </div>
    </div>
 <?php echo $data['style_head']; ?>
  <?php get_template_part('googlefonts'); ?>
<?php wp_footer(); ?>
</body>
</html>