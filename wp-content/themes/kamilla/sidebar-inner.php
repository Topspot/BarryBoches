<?php
global $data;
?>
    <?php
    $category = get_category_by_slug($data['bio_category_1']);
    $category->term_id;
    if (in_category($category->term_id)) {
        ?>
         <div class="inner-page-side-div bio-inner-div hidden-xs">
            <h4><?php echo $data['bio_name']; ?></h4>
            <?php if ($data['bio_img']) { ?><span class="bio-img">
                <img src="<?php echo $data['bio_img']; ?>" alt="<?php echo $data['bio_name']; ?>" />
            </span><?php } ?>
            <ul>
                <?php echo $data['bio_list']; ?>
            </ul>
        </div>
    <?php } ?>
    <?php
    $category = get_category_by_slug($data['book_category_1']);
    $category->term_id;
    if (in_category($category->term_id)) {
        ?>
        <div class="inner-div">
            <h4><?php echo str_replace('<br />', ' ', $data['book_title_1']); ?></h4>
            <img src="<?php echo $data['book1_img']; ?>" class="book-img" alt="<?php echo $data['book_title_1'];?>" />
            <p><?php echo $data['book_subtitle_1']; ?></p>
            <div class="inner-text-right-sidebar">
                 <a id="free-download-btn" href="#book1" data-toggle="modal"><?php echo $data['book_btn_text']; ?></a>
            </div>
            <div class="clear"></div>
        </div>
    <?php } ?>
    <?php if ((!is_page(30))) { ?>
     <div class="side-bar-div hidden-xs">
        <div class="contact-us-div inner-page-contact">
            <h6>Free Initial Consultation</h6>
            <?php echo do_shortcode('[cForm]'); ?>
        </div>
        </div>
    <?php } ?>
