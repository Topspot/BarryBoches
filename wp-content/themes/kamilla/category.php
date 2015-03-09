<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div class="extra-margin-top-inner"></div>
<div class="main-content-div-outer">
    <div class="container">
        <div class="main-content-div-inner border-none">
            <div class="col-sm-8">
                <div class="content-inner-div">

		<?php if ( have_posts() ) : ?>
			<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'spk_lawyer' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>
                        <?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			
                        <?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
                        ?>
                        <div class="blog-outer-div">
                            <h2><a href="<?php the_permalink(); ?>" title="<?php printf(esc_attr__('Permalink to %s', 'law-firm'), the_title_attribute('echo=0')); ?>" rel="bookmark"> <?php the_title(); ?></a></h2>
                            <?php the_excerpt(); ?>
                        </div><!-- #post -->
                        <?php
			endwhile;

			//spk_lawyer_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

                </div>
            </div>
            <div class="col-sm-4">
                <?php get_sidebar_blog(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>