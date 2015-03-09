<?php
/* template name: Client tesimonial
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php get_header(); ?>

<div class="border-top-inner-page"></div>
<div class="container page_inner_new">
  <div class="page-outer-div-main">
    <div class="padding_20">
      <div class="page-left-div" id="client-testimonial-div">
        <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', 'page'); ?>
        <?php endwhile; // end of the loop. ?>
        <?php if (function_exists('get_related_links')) : ?>
        <?php if (get_related_links()) : ?>
        <div class="box-inner-bg margin-top25 resent_post_div" id="related-articale-div">
          <h1 class="title-box" id="related-articale-title">Related Articles</h1>
          <div class="border-bottom-sidebar"></div>
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
      <?php get_sidebar_inner(); ?>
    </div>
  </div>
</div>
<?php get_footer(); ?>
