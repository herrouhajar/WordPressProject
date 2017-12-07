<?php
/**
 * Template part for displaying content-gallery posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sungit-lite
 */

?>
<div id="post-<?php the_ID(); ?>" class="blog-post-content <?php if (is_sticky()) {echo 'sticky';} ?>">
    <?php

    if ( class_exists( 'Jetpack' ) && Jetpack::is_module_active( 'tiled-gallery' ) && is_single() ) {
        $gallery = get_post_gallery();
        if ($gallery) {

            echo '<div class="sungit-lite-jetpack-gallery">';
                echo wp_kses_post($gallery);
            echo '</div>';

        }
    }
    elseif (!is_single()) {

        $image_url = get_post_gallery_images($post);

            if(!empty($image_url)): ?>
                    <div class="sungit-gallery-carousel" <?php if(is_rtl()){?>data-slick='{"rtl":true}'<?php }?>>
                        <?php foreach( $image_url as $image ) { ?>
                        <div  style="background-image: url(<?php echo esc_url($image) ?>)">
                        </div>
                        <?php } ?>
                    </div>
                 <?php
            endif;
    }

    get_template_part( 'components/post/content-part/audio', 'gallery' ); ?>
</div><!-- #post-## -->