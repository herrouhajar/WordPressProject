<?php
/**
 * Template part for displaying content-image posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package sungit-lite
 */

?>

<div  id="post-<?php the_ID(); ?>" class="blog-post-content <?php if (is_sticky()) {echo 'sticky';} ?>">
    <?php if(is_archive() || is_home()):
        $post_content = trim(get_the_content());
        $new_content =  preg_match_all("/\[[^\]]*\]/", $post_content, $matches);
        if( $new_content){
            echo do_shortcode( $matches[0][0]);
        }
        else{
            echo wp_kses_post(sungit_lite_the_featured_video($post_content));
        }
    endif;
    get_template_part( 'components/post/content-part/image', 'video' ); ?>
</div><!-- #post-## -->