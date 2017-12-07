<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Sungit_Lite
 *
 */

?>

<div id="post-<?php the_ID(); ?>" class="blog-post-content <?php if (is_sticky()) {echo 'sticky';} ?>">
    <?php if ( '' != get_the_post_thumbnail() ) : ?>
        <div class="post-thumb">
            <?php the_post_thumbnail( 'full' ); ?>
        </div>
    <?php endif;
    get_template_part( 'components/post/content-part/image', 'video' ); ?>
</div><!-- #post-## -->