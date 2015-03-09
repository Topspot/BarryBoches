<?php
global $data;
?>
<div class="sidebar-main-div hidden-xs">
    <div class="resent_post_div">
         <h2 class="title-box">Categories</h2>
          <ul>
    <?php 
       // echo dynamic_sidebar("sidebar-2");
    $args = array(
  'orderby' => 'name',
  'order' => 'ASC',
  'show_count' => 1,
  'exclude'=>array(3,4,1)
  );
$categories = get_categories($args);
  foreach($categories as $category) { ?>
              <li>
    <a href="<?php echo  get_category_link( $category->term_id ) ;?>" title="<?php echo $category->name?>" > 
        <?php echo $category->name.' ('.$category->category_count.')';?>
    </a>
                </li> 
   <?php } ?>
          </ul>
     </div>
    <?php
    $category = get_category_by_slug($data['bio_category_1']);
    $category->term_id;
    if (in_category($category->term_id)) {
        ?>
        <div class="bio-inner-div">
            <h2 class="title-box"><?php echo $data['bio_name']; ?></h2>
            <?php if ($data['bio_img']) { ?><span class="bio-img"><img src="<?php echo $data['bio_img']; ?>" alt="<?php echo $data['bio_name']; ?>" /></span><?php } ?>
            <ul>
                <?php echo $data['bio_list']; ?>
            </ul>
        </div>
    <?php } ?>
    <?php
    $category = get_category_by_slug($data['bio_category_2']);
    $category->term_id;
    if (in_category($category->term_id)) {
        ?>
        <div class="bio-inner-div margin-top15">
            <h2 class="title-box"><?php echo $data['bio_name_2']; ?></h2>
            <?php if ($data['bio_img_2']) { ?><span class="bio-img"><img src="<?php echo $data['bio_img_2']; ?>" alt="<?php echo $data['bio_name_2']; ?>" /></span><?php } ?>
            <ul>
                <?php echo $data['bio_list_2']; ?>
            </ul>
        </div>
    <?php } ?>
    <?php
    $category = get_category_by_slug($data['book_category_1']);
    $category->term_id;
    if (in_category($category->term_id)) {
        ?>
        <div class="margin-top15 book-inner-div">
            <h2 class="title-box"><?php echo str_replace('<br />', ' ', $data['book_title_1']); ?></h2>
            <span class="book-img-inner"><img src="<?php echo $data['book1_img']; ?>" /></span>
            <p><?php echo $data['book_subtitle_1']; ?></p>
            <a href="#book1" role="button" class="btn" data-toggle="modal"> 
               <?php echo $data['book_btn_text']; ?>
            </a>
        </div>
    <?php } ?>
    <?php
    $category = get_category_by_slug($data['book_category_2']);
    $category->term_id;
    if (in_category($category->term_id)) {
        ?>
        <div class="margin-top15 book-inner-div">
            <h2 class="title-box"><?php echo str_replace('<br />', ' ', $data['book_title_2']); ?></h2>
            <span class="book-img-inner"><img src="<?php echo $data['book2_img']; ?>" /></span>
            <p><?php echo $data['book_subtitle_2']; ?></p>
            <a href="#book2" role="button" class="btn" data-toggle="modal"> <?php echo $data['book_btn_text']; ?></a>
        </div>
    <?php } ?>
      
    <?php if ((!is_page(30))) { ?>
        <div class="contact-us-div margin-top15">
            <h2 class="title-box">Free Initial Consultation</h2>
            <?php echo do_shortcode('[cForm]'); ?>
        </div>
    <?php } ?>
</div>


<!--------------------------------For Mobile Code--------------------------------------------------------------->
<?php if (!is_page(30)) { ?>
    <div class="visible-xs mobile-contact-form-btn">
        <div><a href="<?php bloginfo('url') ?>/contact-us/" class="btn"><i class="fa fa-envelope"></i> GET HELP NOW </a></div>
    </div>
<?php } ?>
