<?php
/**
 * Display the post content in "generic" or "standard" format.
 * This will be use in the loop and full page display.
 * 
 * @package bootstrap-basic4
 */

$featured_image = get_the_post_thumbnail_url($post->ID, 'medium');
$Bsb4Design = new \BootstrapBasic4\Bsb4Design();
?> 
<article id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?>>
<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="article-excerpt-image img-fit  d-block d-print-none mb-3" style="background-image:url(<?php echo $featured_image; ?>)">
        </div>
    </div>
    <div class="col-sm-6 col-md-8">
        <a href="<?php echo get_the_permalink(); ?>"><h1 class="entry-title"><?php the_title(); ?></h1></a>

        <div class="entry-summary">
            <div class="entry-meta-category-tag">
                <?php
                    /* translators: used between list items, there is a space after the comma */
                    $categories_list = get_the_category_list(__(', ', 'bootstrap-basic4'));
                    if (!empty($categories_list)) {
                ?> 
                <span class="cat-links">
                    <?php $Bsb4Design->categoriesList($categories_list); ?> 
                </span>
                <?php } // End if categories ?> 

                <?php
                    /* translators: used between list items, there is a space after the comma */
                    $tags_list = get_the_tag_list('', __(', ', 'bootstrap-basic4'));
                    if ($tags_list) {
                ?> 
                <span class="tags-links">
                    <?php $Bsb4Design->tagsList($tags_list); ?> 
                </span>
                <?php } // End if $tags_list ?> 
            </div><!--.entry-meta-category-tag-->
            <?php the_excerpt(); ?> 
            <div class="clearfix"></div>
        </div><!-- .entry-summary -->
    </div>
</div>
</article><!-- #post-## -->
<?php unset($Bsb4Design); ?> 
